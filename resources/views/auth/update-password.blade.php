@extends('layout.layout1')

@section('content')
<div class="container py-4">
    <h3>Update Your Password</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control" required>
            @error('new_password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>

        <button class="btn btn-success">Update Password</button>
    </form>
</div>
@endsection
