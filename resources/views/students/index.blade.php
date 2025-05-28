@extends('layout.layout1')

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="row mb-2">
        <div class="col-12">
                <div>
                <h1 class="heading-font mb-0 fs-4">Student List</h1>
                <p class="text-muted mb-0 small">Manage all registered students</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-2 d-flex align-items-center py-1 small">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-2 d-flex align-items-center py-1 small">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    <div class="row g-2">
        <!-- Add Student Form -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-1">
                    <h6 class="card-title mb-0 small">Add New Student</h6>
                </div>
                <div class="card-body p-2">
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="small">
                        @csrf
                        <div class="row g-1">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label small mb-0">First Name</label>
                                    <input type="text" name="fname" class="form-control form-control-sm py-1" value="{{ old('fname') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label small mb-0">Last Name</label>
                                    <input type="text" name="lname" class="form-control form-control-sm py-1" value="{{ old('lname') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-1 mt-1">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label small mb-0">Middle Name</label>
                                    <input type="text" name="mname" class="form-control form-control-sm py-1" value="{{ old('mname') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row g-1 mt-1">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label small mb-0">Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm py-1" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label small mb-0">Contact</label>
                                    <input type="text" name="contact" class="form-control form-control-sm py-1" value="{{ old('contact') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-1">
                            <label class="form-label small mb-0">Address</label>
                            <input type="text" name="address" class="form-control form-control-sm py-1" value="{{ old('address') }}" required>
                        </div>

                        <div class="form-group mt-1">
                            <label class="form-label small mb-0">Profile Image</label>
                            <input type="file" name="image" class="form-control form-control-sm py-1">
                        </div>

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-primary btn-sm py-1">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Students Table -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 small">
                    <thead style="background-color: var(--cream);">
                        <tr>
                                    <th class="px-2 py-2">ID</th>
                                    <th class="px-2 py-2">Student Info</th>
                                    <th class="px-2 py-2">Contact</th>
                                    <th class="px-2 py-2">Status</th>
                                    <th class="px-2 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                                    <td class="px-2 py-1">{{ $student->studentid }}</td>
                                    <td class="px-2 py-1">
                                        <div class="d-flex align-items-center">
                                    @if($student->image_path)
                                                <img src="{{ asset('storage/' . $student->image_path) }}" 
                                                     alt="Profile" 
                                                     class="rounded-circle me-2"
                                                     width="24"
                                                     height="24"
                                                     style="object-fit: cover;">
                                    @else
                                                <div class="rounded-circle bg-secondary me-2" 
                                                     style="width: 24px; height: 24px;"></div>
                                    @endif
                                    <div>
                                                <div class="fw-medium small">{{ $student->fname }} {{ $student->lname }}</div>
                                                <div class="small text-muted">{{ $student->email }}</div>
                                    </div>
                                </div>
                            </td>
                                    <td class="px-2 py-1">
                                        <div class="small">
                                            <div>{{ $student->contact }}</div>
                                            <div class="text-muted">{{ $student->address }}</div>
                                </div>
                            </td>
                                    <td class="px-2 py-1">
                                @if($student->userAccount)
                                            <span class="badge bg-success">Active</span>
                                @else
                                            <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                                    <td class="px-2 py-1">
                                <div class="d-flex gap-1">
                                            <a href="{{ route('students.show', $student->id) }}" 
                                               class="btn btn-sm py-0 px-1" 
                                               style="background-color: var(--terra); color: white;"
                                               data-bs-toggle="tooltip" 
                                               data-bs-placement="top" 
                                               title="View Student">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                    <a href="{{ route('students.edit', $student->id) }}" 
                                               class="btn btn-sm py-0 px-1" 
                                       style="background-color: var(--mauve); color: white;"
                                       data-bs-toggle="tooltip" 
                                       data-bs-placement="top" 
                                       title="Edit Student">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                            <form action="{{ route('students.destroy', $student->id) }}" 
                                                  method="POST" 
                                                  class="d-inline" 
                                                  onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                        class="btn btn-sm py-0 px-1" 
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
            <div class="d-flex justify-content-center mt-2">
        {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
