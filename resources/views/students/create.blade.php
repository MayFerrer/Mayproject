@extends('layout.layout1')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center">
                <a href="{{ route('students.index') }}" class="btn btn-sm me-3" style="background-color: var(--mauve); color: white;">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="heading-font mb-0">Add New Student</h1>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('students.form')
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">Save Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
