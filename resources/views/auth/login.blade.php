<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for eye icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
        .password-field {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 38px;
            cursor: pointer;
            color: #6c757d;
        }
        .password-toggle:hover {
            color: #3dadb7;
        }
    </style>
</head>
<body>
    <div class="card-form">
        @if(session('user'))
            <h3 class="text-center text-primary mb-4">Welcome, {{ session('user')->username }}</h3>
            <a href="{{ route('update-password') }}" class="btn btn-custom w-100">Update Password</a>
        @else
            <h3 class="text-center text-primary mb-4">Login</h3>
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form method="POST" action="{{ route('users.login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-4 password-field">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                </div>
                <button class="btn btn-custom w-100 mb-2">Login</button>
                <a href="{{ route('users.create') }}" class="btn btn-outline-secondary w-100">Create Account</a>
            </form>
        @endif
    </div>

    <script>
        // Password visibility toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
