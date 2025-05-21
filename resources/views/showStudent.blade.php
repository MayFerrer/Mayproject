@extends('layout.layout1')

@section('content')
<div class="container py-5" style="display: inline; text-align: center">
    <h2>Student Details</h2>
    <p><strong>Student ID:</strong> {{ $student->studentid }}</p>
    <p><strong>First Name:</strong> {{ $student->fname }}</p>
    <p><strong>Middle Name:</strong> {{ $student->mname }}</p>
    <p><strong>Last Name:</strong> {{ $student->lname }}</p>
    <p><strong>Address:</strong> {{ $student->address }}</p>
    <p><strong>Contact Number:</strong> {{ $student->contact }}</p> {{-- Fixed this line --}}

    <a href="{{ route('students.index') }}" class="btn btn-secondary"   >Back to List</a>
</div>
@endsection
