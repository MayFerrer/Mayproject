<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - May's Company</title>
    <!-- Bootstrap CSS (fallback) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for eye icon (fallback) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS (will work offline) -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card-form">
            <h2 class="text-center mb-4" style="color: var(--salmon-pink);">Welcome Back</h2>
            
            @if(session('user'))
                <div class="text-center mb-4">
                    <div class="avatar-circle mb-3 mx-auto">
                        <span class="initials">{{ substr(session('user')->username, 0, 1) }}</span>
                    </div>
                    <h3 class="mb-3">{{ session('user')->username }}</h3>
                    <a href="{{ route('update-password') }}" class="btn btn-custom w-100">Update Password</a>
                </div>
            @else
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                
                <form method="POST" action="{{ route('users.login') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: var(--light-gray); border: none;">
                                <i class="fas fa-user" style="color: var(--text-medium);"></i>
                            </span>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="mb-4 password-field">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: var(--light-gray); border: none;">
                                <i class="fas fa-lock" style="color: var(--text-medium);"></i>
                            </span>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                    </div>
                    
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-custom py-2">Sign In</button>
                        <a href="{{ route('users.create') }}" class="btn btn-outline-secondary">Create New Account</a>
                    </div>
                </form>
                
                <div class="text-center mt-4">
                    <a href="{{ route('dashboard') }}" style="color: var(--salmon-pink); text-decoration: none;">
                        <i class="fas fa-home me-1"></i> Return to Homepage
                    </a>
                </div>
            @endif
        </div>
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
    
    <style>
        body {
            background: linear-gradient(135deg, var(--salmon-pink), var(--beige));
        }
        
        .avatar-circle {
            width: 80px;
            height: 80px;
            background-color: var(--salmon-pink);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .initials {
            font-size: 2.5rem;
            color: white;
            font-weight: 500;
            text-transform: uppercase;
        }
        
        .input-group-text {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }
        
        .form-control {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        
        .password-toggle {
            top: 45px;
            right: 15px;
        }
    </style>
</body>
</html>
