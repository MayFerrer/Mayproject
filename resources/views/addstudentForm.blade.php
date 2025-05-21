@extends('layout.layout1')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Add Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="row">
            {{-- Student ID --}}
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label class="form-label">Student ID</label>
                    <input type="text" name="studentid" class="form-control @error('studentid') is-invalid @enderror"
                           value="{{ old('studentid') }}" data-original="">
                    @error('studentid')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- First Name --}}
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label class="form-label">First Name</label>
                    <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror"
                           value="{{ old('fname') }}" data-original="">
                    @error('fname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- Middle Name --}}
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label class="form-label">Middle Name</label>
                    <input type="text" name="mname" class="form-control @error('mname') is-invalid @enderror"
                           value="{{ old('mname') }}" maxlength="20" data-original="">
                    @error('mname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- Last Name --}}
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror"
                           value="{{ old('lname') }}" data-original="">
                    @error('lname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- Address --}}
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                           value="{{ old('address') }}" data-original="">
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- Contact Number --}}
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror"
                           value="{{ old('contact') }}" data-original="">
                    @error('contact')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Submit Button --}}
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success w-100">
                <i class="fas fa-user-plus me-1"></i> Add Student
            </button>
        </div>
    </form>
</div>
@endsection
