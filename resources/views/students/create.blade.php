@extends('layout.layout1')

@section('content')
<div class="container">
    <h2>Add Student</h2>
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('students.form')
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
