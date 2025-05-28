@extends('layout.layout1')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center">
                <a href="{{ route('students.index') }}" class="btn btn-sm me-3" style="background-color: var(--mauve); color: white;">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="heading-font mb-0">Student Details</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4 text-center">
                    @if($student->image_path)
                        <img src="{{ asset('storage/' . $student->image_path) }}" 
                             alt="Profile" 
                             class="rounded-circle mb-3"
                             width="150"
                             height="150"
                             style="object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-secondary mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 150px; height: 150px;">
                            <i class="fas fa-user fa-4x text-white"></i>
                        </div>
                    @endif
                    <h3 class="heading-font mb-1">{{ $student->fname }} {{ $student->lname }}</h3>
                    <p class="text-muted mb-3">{{ $student->studentid }}</p>
                    <div class="d-grid gap-2">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-primary">
                            <i class="fas fa-edit me-2"></i>Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0">Personal Information</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <p class="text-muted mb-1 small">First Name</p>
                            <p class="mb-0">{{ $student->fname }}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-muted mb-1 small">Middle Name</p>
                            <p class="mb-0">{{ $student->mname ?: 'N/A' }}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-muted mb-1 small">Last Name</p>
                            <p class="mb-0">{{ $student->lname }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="text-muted mb-1 small">Email</p>
                            <p class="mb-0">{{ $student->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-1 small">Contact Number</p>
                            <p class="mb-0">{{ $student->contact }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p class="text-muted mb-1 small">Address</p>
                            <p class="mb-0">{{ $student->address }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0">Account Status</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 small">Account Status</p>
                            <p class="mb-0">
                                @if($student->userAccount)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <form action="{{ route('students.toggle-status', $student) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-sync-alt me-2"></i>Toggle Status
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 