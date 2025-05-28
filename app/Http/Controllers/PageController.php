<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function showGradeAndStudents(Request $request)
    {
        $students = [
            ['name' => 'John Doe', 'age' => 20, 'color' => 'blue', 'grade' => 10],
            ['name' => 'Jane Smith', 'age' => 21, 'color' => 'red', 'grade' => 10],
            ['name' => 'Alice Brown', 'age' => 19, 'color' => 'green', 'grade' => 9],
        ];

        $score = $request->query('score', null);
        return view('students', compact('students', 'score'));
    }

    public function maintenance()
    {
        return view('maintenance');
    }

    public function contactus()
    {
        return view('contactus');
    }

    public function layout()
    {
        return view('layout');
    }

    public function dashboard()
    {
        $user = Session::get('user');
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        return view('dashboard', ['username' => $user->username]);
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function students($grade = null)
    {
        $students = [
            ['name' => 'John Doe', 'age' => 20, 'grade' => 10],
            ['name' => 'Jane Smith', 'age' => 21, 'grade' => 10],
            ['name' => 'Alice Brown', 'age' => 19, 'grade' => 9],
        ];

        if ($grade) {
            $students = array_filter($students, fn($student) => $student['grade'] == $grade);
        }

        return view('students', compact('students', 'grade'));
    }

    public function conditional($grade = null)
    {
        return view('conditional', compact('grade'));
    }

    public function index()
    {
        return view('student.index');
    }
}
