<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Password</title>
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
        <h3 class="text-center text-primary mb-4">Update Password</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="alert alert-info mb-4">
            For security reasons, you need to change your default password before continuing.
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="mb-3 password-field">
                <label class="form-label">New Password</label>
                <input type="password" name="new_password" id="newPassword" class="form-control" required>
                <i class="fas fa-eye password-toggle" id="toggleNewPassword"></i>
                @error('new_password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4 password-field">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="new_password_confirmation" id="confirmPassword" class="form-control" required>
                <i class="fas fa-eye password-toggle" id="toggleConfirmPassword"></i>
            </div>
            <button class="btn btn-custom w-100">Update Password</button>
        </form>
    </div>

    <script>
        // New password visibility toggle
        document.getElementById('toggleNewPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('newPassword');
            
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Confirm password visibility toggle
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('confirmPassword');
            
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
