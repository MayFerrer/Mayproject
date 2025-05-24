@extends('layout.layout1')

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="heading-font mb-0">Student List</h1>
                    <p class="text-muted">Manage all registered students</p>
                </div>
                <a href="{{ route('students.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Add Student
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4 d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-4 d-flex align-items-center">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    <!-- Students Table Card -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background-color: var(--cream);">
                        <tr>
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3">Contact</th>
                            <th class="px-4 py-3">Username</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td class="px-4 py-3">{{ $student->studentid }}</td>
                            <td class="px-4 py-3">
                                <div class="fw-medium">{{ $student->fname }} {{ $student->mname }} {{ $student->lname }}</div>
                            </td>
                            <td class="px-4 py-3">{{ $student->email }}</td>
                            <td class="px-4 py-3">{{ $student->address }}</td>
                            <td class="px-4 py-3">{{ $student->contact }}</td>
                            <td class="px-4 py-3">{{ $student->userAccount->username ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                @if($student->userAccount)
                                    <a href="{{ route('students.toggle-status', $student->id) }}" class="text-decoration-none">
                                        <span class="badge rounded-pill px-3 py-2 
                                            {{ $student->userAccount->status === 'active' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                            {{ $student->userAccount->status }}
                                        </span>
                                    </a>
                                @else
                                    <span class="badge bg-secondary">N/A</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($student->image_path)
                                    <img 
                                        src="{{ asset('storage/images/' . basename($student->image_path)) }}" 
                                        alt="Image of {{ $student->fname }}" 
                                        width="40" 
                                        height="40"
                                        class="rounded-circle object-fit-cover"
                                    >
                                @else
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 40px; height: 40px; background-color: var(--mauve); color: var(--cream);">
                                        {{ strtoupper(substr($student->fname, 0, 1)) }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm" style="background-color: var(--mauve); color: white;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background-color: var(--charcoal); color: white;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
</div>
@endsection
