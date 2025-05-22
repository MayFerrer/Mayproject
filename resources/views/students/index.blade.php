@extends('layout.layout1')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-xl font-bold mb-4">Student List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-4">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered w-full text-sm text-left text-gray-600">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Middle</th>
                <th>Last</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Username</th>
                <th>Status</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->studentid }}</td>
                <td>{{ $student->fname }}</td>
                <td>{{ $student->mname }}</td>
                <td>{{ $student->lname }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->contact }}</td>
                <td>{{ $student->userAccount->username ?? 'N/A' }}</td>
                <td>
                    @if($student->userAccount)
                        <a href="{{ route('students.toggle-status', $student->id) }}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full cursor-pointer
                            {{ $student->userAccount->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}"
                            title="Click to toggle status">
                            {{ $student->userAccount->status }}
                        </a>
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    @if($student->image_path)
                        <img 
                            src="{{ asset('storage/images/' . basename($student->image_path)) }}" 
                            alt="Image of {{ $student->fname }}" 
                            width="60" 
                            class="rounded shadow"
                        >
                    @else
                        <span class="text-gray-400 italic">No image</span>
                    @endif
                </td>
                <td class="flex space-x-2">
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm bg-red-500 hover:bg-red-700 text-white">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tailwind-styled pagination --}}
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>
@endsection
