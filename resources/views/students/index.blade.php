@extends('layout.layout1')

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="row mb-3">
        <div class="col-12">
            <div>
                <h1 class="heading-font mb-0">Student List</h1>
                <p class="text-muted mb-0">Manage all registered students</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-3 d-flex align-items-center py-2">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-3 d-flex align-items-center py-2">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <!-- Add Student Form -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-2">
                    <h6 class="card-title mb-0">Add New Student</h6>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label small mb-1">First Name</label>
                                    <input type="text" name="fname" class="form-control form-control-sm" value="{{ old('fname') }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label small mb-1">Last Name</label>
                                    <input type="text" name="lname" class="form-control form-control-sm" value="{{ old('lname') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mt-2">
                            <label class="form-label small mb-1">Middle Name</label>
                            <input type="text" name="mname" class="form-control form-control-sm" value="{{ old('mname') }}">
                        </div>

                        <div class="row g-2 mt-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label small mb-1">Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label small mb-1">Contact</label>
                                    <input type="text" name="contact" class="form-control form-control-sm" value="{{ old('contact') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label small mb-1">Address</label>
                            <textarea name="address" class="form-control form-control-sm" rows="1" required>{{ old('address') }}</textarea>
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label small mb-1">Profile Image</label>
                            <input type="file" name="image" class="form-control form-control-sm">
                        </div>

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Students Table -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background-color: var(--cream);">
                                <tr>
                                    <th class="px-3 py-2">ID</th>
                                    <th class="px-3 py-2">Student Info</th>
                                    <th class="px-3 py-2">Contact</th>
                                    <th class="px-3 py-2">Status</th>
                                    <th class="px-3 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td class="px-3 py-2">{{ $student->studentid }}</td>
                                    <td class="px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            @if($student->image_path)
                                                <img src="{{ asset('storage/' . $student->image_path) }}" 
                                                     alt="Profile" 
                                                     class="rounded-circle me-2"
                                                     width="32"
                                                     height="32"
                                                     style="object-fit: cover;">
                                            @else
                                                <div class="rounded-circle bg-secondary me-2" 
                                                     style="width: 32px; height: 32px;"></div>
                                            @endif
                                            <div>
                                                <div class="fw-medium">{{ $student->fname }} {{ $student->lname }}</div>
                                                <div class="small text-muted">{{ $student->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">
                                        <div class="small">
                                            <div>{{ $student->contact }}</div>
                                            <div class="text-muted">{{ $student->address }}</div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">
                                        @if($student->userAccount)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
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
    </div>
</div>
@endsection
