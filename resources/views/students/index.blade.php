@extends('layout.layout1')

@section('content')
<div class="container mx-auto px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-xl font-bold" style="color: var(--salmon-pink);">Student Management</h2>
        <a href="{{ route('students.create') }}" class="btn btn-custom">
            <i class="fas fa-plus-circle me-2"></i>Add Student
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4 shadow-sm">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-4 shadow-sm">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td class="fw-bold">{{ $student->studentid }}</td>
                            <td>
                                {{ $student->fname }} {{ $student->mname }} {{ $student->lname }}
                                <div class="text-muted small">{{ $student->address }}</div>
                            </td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->contact }}</td>
                            <td>
                                @if($student->userAccount)
                                    <a href="{{ route('students.toggle-status', $student->id) }}" class="px-2 d-inline-flex text-decoration-none align-items-center rounded-pill cursor-pointer
                                        {{ $student->userAccount->status === 'active' ? 'status-active' : 'status-inactive' }}"
                                        title="Click to toggle status">
                                        <i class="fas fa-circle me-1 small"></i>
                                        {{ $student->userAccount->status }}
                                    </a>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($student->image_path)
                                    <img 
                                        src="{{ asset('storage/images/' . basename($student->image_path)) }}" 
                                        alt="Image of {{ $student->fname }}" 
                                        width="60" 
                                        class="rounded shadow-sm"
                                    >
                                @else
                                    <span class="text-muted"><i class="fas fa-user-circle fa-2x"></i></span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
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

    <!-- Student User Info -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header" style="background-color: var(--light-beige);">
                    <h5 class="mb-0">User Account Information</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                @if($student->userAccount)
                                <tr>
                                    <td>{{ $student->studentid }}</td>
                                    <td>{{ $student->userAccount->username }}</td>
                                    <td>
                                        <span class="{{ $student->userAccount->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                            {{ $student->userAccount->status }}
                                        </span>
                                    </td>
                                    <td>{{ $student->userAccount->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>

<style>
    .status-active {
        background-color: rgba(208, 187, 168, 0.2);
        color: var(--taupe);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-weight: 500;
        font-size: 0.875rem;
    }
    
    .status-inactive {
        background-color: rgba(246, 196, 179, 0.2);
        color: var(--salmon-pink);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-weight: 500;
        font-size: 0.875rem;
    }
</style>
@endsection
