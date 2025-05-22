<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;



class ManageStudentController extends Controller
{
    // Show all students
    public function index()
    {


    $students = Student::paginate(3); // show 10 students per page
    return view('students.index', compact('students'));

        $students = Student::all();
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
            'address' => 'required',
            'contact' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $year = Carbon::now()->year;
        $yy = substr($year, -2);

        $count = Student::whereYear('created_at', $year)->count() + 1;
        $studentId = "S-{$yy}-{$count}";

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Student::create([
            'studentid' => $studentId,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'address' => $request->address,
            'contact' => $request->contact,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['fname', 'mname', 'lname', 'address', 'contact']);

        if ($request->hasFile('image')) {
            // Remove old image
            if ($student->image_path && Storage::disk('public')->exists($student->image_path)) {
                Storage::disk('public')->delete($student->image_path);
            }

            // Store new image
            $data['image_path'] = $request->file('image')->store('images', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    
}

