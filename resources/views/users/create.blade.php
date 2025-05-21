@extends('layout.layout1')

@section('content')
<div class="container py-4">
    <h3>Create New User</h3>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
            @error('username') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Default Password</label>
            <input type="password" name="defaultpassword" class="form-control" required>
            @error('defaultpassword') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">Create User</button>
    </form>
</div>
@endsection
