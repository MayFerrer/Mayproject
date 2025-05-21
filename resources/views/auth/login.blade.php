@extends('layout.layout1')

@section('content')
<div class="container py-4">

    @if(session('user'))
        <h3>Welcome, {{ session('user')->username }}</h3>
        <p>You are already logged in.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-success">Go to Dashboard</a>
    @else
        <h3>Login</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('users.login') }}">
            @csrf

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-primary">Login</button>

                <a href="{{ route('users.create') }}" class="btn btn-outline-secondary">Create Account</a>
            </div>
        </form>
    @endif

</div>
@endsection
