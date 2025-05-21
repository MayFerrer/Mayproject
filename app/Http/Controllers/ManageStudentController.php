<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class ManageStudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->paginate(5);
        return view('students', ['students' => $students]);
    }

    // Show the form to create a new student
    public function create()
    {
        return view('addStudentForm');
    }

    // Store a newly created student
    public function store(Request $request)
{
    $validated = $request->validate([
        'studentid' => 'required|min:4|max:20|unique:students,studentid',
        'fname'     => 'required|min:3|max:50',
        'mname'     => 'nullable|min:3|max:20',
        'lname'     => 'required|min:3|max:50',
        'address'   => 'required|string|max:255',
        'contact'   => 'required|digits:11|regex:/^09\d{9}$/',
    ]);
    Student::create($validated);

    Log::info('Student added', [
        'data' => $validated,
        'ip' => $request->ip(),
        'time' => now()
    ]);


    return redirect()->route('students.index')->with('message', 'Student added successfully!');
}


    // Show a specific student's details
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('showStudent', compact('student'));
    }

    // Show the form to edit an existing student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('editStudentForm', compact('student'));


    }

    // Update an existing student's information
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'studentid' => 'required|string|max:255',
            'fname'     => 'required|string|max:255',
            'mname'     => 'nullable|string|max:255',
            'lname'     => 'required|string|max:255',
            'address'   => 'required|string|max:255',
            'contact'   => 'required|string|max:15',
        ]);

        // Compare original and new values
        if (
            $request->studentid === $request->original_studentid &&
            $request->fname === $request->original_fname &&
            $request->mname === $request->original_mname &&
            $request->lname === $request->original_lname &&
            $request->address === $request->original_address &&
            $request->contact === $request->original_contact
        ) {
            return redirect()->back()->with('info', 'No changes detected.');
        }

        // Update student
        $student->update([
            'studentid' => $request->studentid,
            'fname'     => $request->fname,
            'mname'     => $request->mname,
            'lname'     => $request->lname,
            'address'   => $request->address,
            'contact'   => $request->contact,
        ]);


        return redirect('students')->with('message', 'Student updated successfully.');
    }





    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        Log::warning('Student deleted', [
            'data' => $student->toArray(),
            'ip' => request()->ip(),
            'time' => now()
        ]);

        $student->delete();


        return redirect('/students')->with('message', 'Student deleted successfully!');
    }
}
