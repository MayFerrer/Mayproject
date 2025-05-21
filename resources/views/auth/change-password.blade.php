@extends('layout.layout1')

@section('content')
<div class="container mt-5">
    <h3>Change Your Password</h3>
    <form method="POST" action="/change-password">
        @csrf
        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-success">Update Password</button>
    </form>
</div>
@endsection
