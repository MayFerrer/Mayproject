@extends('layout.layout1')

@section('title', 'Edit Student')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="mb-0"><i class="fas fa-user-edit me-2"></i>Edit Student</h1>
        </div>

        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Student ID --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Student ID</label>
                        <input type="text" name="studentid"
                               class="form-control @error('studentid') is-invalid @enderror"
                               value="{{ old('studentid') !== null ? old('studentid') : $student->studentid }}">
                        <input type="hidden" name="original_studentid" value="{{ $student->studentid }}">
                        <small class="text-muted">Length: {{ strlen(old('studentid') !== null ? old('studentid') : $student->studentid) }}</small>
                        @error('studentid') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- First Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="fname"
                               class="form-control @error('fname') is-invalid @enderror"
                               value="{{ old('fname') !== null ? old('fname') : $student->fname }}">
                        <input type="hidden" name="original_fname" value="{{ $student->fname }}">
                        <small class="text-muted">Length: {{ strlen(old('fname') !== null ? old('fname') : $student->fname) }}</small>
                        @error('fname') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Middle Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" name="mname"
                               class="form-control @error('mname') is-invalid @enderror"
                               value="{{ old('mname') !== null ? old('mname') : $student->mname }}">
                        <input type="hidden" name="original_mname" value="{{ $student->mname }}">
                        <small class="text-muted">Length: {{ strlen(old('mname') !== null ? old('mname') : $student->mname) }}</small>
                        @error('mname') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="lname"
                               class="form-control @error('lname') is-invalid @enderror"
                               value="{{ old('lname') !== null ? old('lname') : $student->lname }}">
                        <input type="hidden" name="original_lname" value="{{ $student->lname }}">
                        <small class="text-muted">Length: {{ strlen(old('lname') !== null ? old('lname') : $student->lname) }}</small>
                        @error('lname') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Address --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address"
                               class="form-control @error('address') is-invalid @enderror"
                               value="{{ old('address') !== null ? old('address') : $student->address }}">
                        <input type="hidden" name="original_address" value="{{ $student->address }}">
                        <small class="text-muted">Length: {{ strlen(old('address') !== null ? old('address') : $student->address) }}</small>
                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Contact --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="contact"
                               class="form-control @error('contact') is-invalid @enderror"
                               value="{{ old('contact') !== null ? old('contact') : $student->contact }}">
                        <input type="hidden" name="original_contact" value="{{ $student->contact }}">
                        <small class="text-muted">Length: {{ strlen(old('contact') !== null ? old('contact') : $student->contact) }}</small>
                        @error('contact') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Submit --}}
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-arrow-left me-1"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Update Student
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
