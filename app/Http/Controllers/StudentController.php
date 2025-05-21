<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    // Show the student details
    public function show($id)
    {
        $student = Student::findOrFail($id);  // Changed $students to $student
        return view('student.show', compact('student'));
    }



    // Update the student details
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->fname = $request->fname;
        $student->mname = $request->mname;
        $student->lname = $request->lname;
        $student->address = $request->address;
        $student->contact = $request->contact;
        $student->save();

        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }



    // Delete the student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);  // Changed $students to $student
        $student->delete();
        return redirect()->route('student.index');
            // ->with('success', 'Student deleted successfully');
    }
}
