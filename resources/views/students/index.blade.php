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
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: var(--cream);">
                        <tr>
                            <th class="px-3 py-3">ID</th>
                            <th class="px-3 py-3">Student Info</th>
                            <th class="px-3 py-3">Contact</th>
                            <th class="px-3 py-3">Status</th>
                            <th class="px-3 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td class="px-3 py-2">{{ $student->studentid }}</td>
                            <td class="px-3 py-2">
                                <div class="d-flex align-items-center gap-2">
                                    @if($student->image_path)
                                        <img 
                                            src="{{ asset('storage/' . $student->image_path) }}" 
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
                                    <div>
                                        <div class="fw-medium">{{ $student->fname }} {{ $student->lname }}</div>
                                        <div class="text-muted small">{{ $student->email }}</div>
                                        <div class="text-muted small text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $student->address }}">
                                            <i class="fas fa-map-marker-alt me-1"></i>{{ $student->address }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-2">
                                <div class="text-nowrap">
                                    <i class="fas fa-phone me-1"></i>{{ $student->contact }}
                                </div>
                            </td>
                            <td class="px-3 py-2">
                                @if($student->userAccount)
                                    <div class="form-check form-switch">
                                        <a href="{{ route('students.toggle-status', $student->id) }}" 
                                           class="d-flex align-items-center text-decoration-none gap-2">
                                            <div class="form-check-input {{ $student->userAccount->status === 'active' ? 'bg-success' : 'bg-danger' }}" 
                                                 style="width: 2.5em; height: 1.25em; cursor: pointer;"
                                                 role="switch">
                                            </div>
                                            <span class="badge {{ $student->userAccount->status === 'active' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                                {{ ucfirst($student->userAccount->status) }}
                                            </span>
                                        </a>
                                    </div>
                                @else
                                    <span class="badge bg-secondary">No Account</span>
                                @endif
                            </td>
                            <td class="px-3 py-2">
                                <div class="d-flex gap-1">
                                    <a href="{{ route('students.edit', $student->id) }}" 
                                       class="btn btn-sm" 
                                       style="background-color: var(--mauve); color: white;"
                                       data-bs-toggle="tooltip" 
                                       data-bs-placement="top" 
                                       title="Edit Student">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm" 
                                                style="background-color: var(--charcoal); color: white;"
                                                data-bs-toggle="tooltip" 
                                                data-bs-placement="top" 
                                                title="Delete Student">
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

<style>
.form-check-input:checked {
    background-color: var(--terra) !important;
    border-color: var(--terra) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
})
</script>
@endsection
