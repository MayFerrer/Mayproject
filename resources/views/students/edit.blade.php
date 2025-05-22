@extends('layout.layout1')

@section('content')
<div class="container">
    <h2>Edit Student</h2>
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('students.form', ['student' => $student])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
