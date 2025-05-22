<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\UserAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        // Get students with their user account information using eager loading
        $students = Student::with('userAccount')->paginate(3);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:user_accounts,username',
            'address' => 'required',
            'contact' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $year = Carbon::now()->year;
        $yy = substr($year, -2);

        // Fix for studentid generation - get the highest existing ID and increment
        $highestId = 0;
        $latestStudent = Student::where('studentid', 'like', "S-{$yy}-%")
            ->orderByRaw('CAST(SUBSTRING_INDEX(studentid, "-", -1) AS UNSIGNED) DESC')
            ->first();
            
        if ($latestStudent) {
            // Extract the number part from the ID (e.g., get "3" from "S-25-3")
            $parts = explode('-', $latestStudent->studentid);
            $highestId = (int)end($parts);
        }
        
        // Increment to get the next ID
        $nextId = $highestId + 1;
        $studentId = "S-{$yy}-{$nextId}";

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create the student record
        $student = Student::create([
            'studentid' => $studentId,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'address' => $request->address,
            'contact' => $request->contact,
            'image_path' => $imagePath,
        ]);

        // Generate default password (Studentid + first_name)
        $defaultPassword = $studentId . $request->fname;
        
        // Create the user account
        UserAccount::create([
            'useraccount_id' => $student->id,
            'username' => $request->email,
            'password' => Hash::make($defaultPassword),
            'defaultpassword' => $defaultPassword,
            'status' => 'active',
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validationRules = [
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        // If the student has a user account, exclude it from the unique check
        if ($student->userAccount) {
            $validationRules['email'] = 'required|email|unique:user_accounts,username,' . $student->userAccount->id;
        } else {
            $validationRules['email'] = 'required|email|unique:user_accounts,username';
        }

        $request->validate($validationRules);

        $data = $request->only(['fname', 'mname', 'lname', 'email', 'address', 'contact']);

        if ($request->hasFile('image')) {
            // Remove old image
            if ($student->image_path && Storage::disk('public')->exists($student->image_path)) {
                Storage::disk('public')->delete($student->image_path);
            }

            // Store new image
            $data['image_path'] = $request->file('image')->store('images', 'public');
        }

        $student->update($data);
        
        // Update the user account username (email)
        if ($student->userAccount) {
            $student->userAccount->update([
                'username' => $request->email
            ]);
        } else {
            // Create a new user account if it doesn't exist
            $defaultPassword = $student->studentid . $student->fname;
            
            UserAccount::create([
                'useraccount_id' => $student->id,
                'username' => $request->email,
                'password' => Hash::make($defaultPassword),
                'defaultpassword' => $defaultPassword,
                'status' => 'active',
            ]);
        }

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // Delete associated user account first
        if ($student->userAccount) {
            $student->userAccount->delete();
        }
        
        // Delete student image if exists
        if ($student->image_path && Storage::disk('public')->exists($student->image_path)) {
            Storage::disk('public')->delete($student->image_path);
        }
        
        // Delete student record
        $student->delete();
        
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
    
    /**
     * Toggle student account status between active and inactive.
     */
    public function toggleStatus(Student $student)
    {
        if ($student->userAccount) {
            $newStatus = $student->userAccount->status === 'active' ? 'inactive' : 'active';
            
            $student->userAccount->update([
                'status' => $newStatus
            ]);
            
            return redirect()->route('students.index')
                ->with('success', "Student account status changed to {$newStatus}.");
        }
        
        return redirect()->route('students.index')
            ->with('error', 'No user account found for this student.');
    }
}
