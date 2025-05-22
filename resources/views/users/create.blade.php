<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #3dadb7, #2e8b94);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card-form {
            background: #fff;
            border-radius: 16px;
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        .btn-custom {
            background-color: #3dadb7;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #2e8b94;
        }
    </style>
</head>
<body>
    <div class="card-form">
        <h3 class="text-center text-primary mb-4">Create New User</h3>

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <div class="alert alert-info">
                    A default password will be assigned. You'll be prompted to change it after login.
                </div>
            </div>
            <button class="btn btn-custom w-100">Create User</button>
            <div class="mt-3 text-center">
                <a href="{{ route('login') }}" class="text-decoration-none">Back to Login</a>
            </div>
        </form>
    </div>
</body>
</html>
