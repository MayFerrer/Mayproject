<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Password | Mayvèle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --cream: #F7F1F0;
            --mauve: #C3A6A0;
            --terra: #A15C38;
            --charcoal: #262220;
        }
        
        body {
            background-color: var(--cream);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            color: var(--charcoal);
        }
        
        .card-form {
            background: #fff;
            border-radius: 8px;
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        h3 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 400;
            color: var(--terra);
            margin-bottom: 1.5rem;
        }
        
        .btn-custom {
            background-color: var(--terra);
            border-color: var(--terra);
            color: #fff;
            transition: all 0.3s ease;
            border-radius: 0;
            padding: 0.6rem 1rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        
        .btn-custom:hover {
            background-color: var(--charcoal);
            border-color: var(--charcoal);
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--terra);
            color: var(--terra);
        }
        
        .btn-outline:hover {
            background-color: var(--terra);
            color: white;
        }
        
        .form-control {
            border-radius: 0;
            border-color: var(--mauve);
            padding: 0.7rem 1rem;
            font-size: 0.95rem;
        }
        
        .form-control:focus {
            box-shadow: none;
            border-color: var(--terra);
        }
        
        .form-label {
            color: var(--charcoal);
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .password-field {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 42px;
            cursor: pointer;
            color: var(--mauve);
        }
        
        .password-toggle:hover {
            color: var(--terra);
        }
        
        .section-divider {
            height: 1px;
            background-color: var(--mauve);
            margin: 1.5rem 0;
            opacity: 0.5;
        }
        
        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 2.5rem;
            color: var(--charcoal);
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .subtitle {
            font-size: 0.9rem;
            color: var(--mauve);
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .alert-info {
            background-color: rgba(195, 166, 160, 0.1);
            border-color: var(--mauve);
            color: var(--charcoal);
            border-radius: 0;
        }
    </style>
</head>
<body>
    <div class="card-form">
        <div class="logo">Mayvèle</div>
        <div class="subtitle">where style meets sustainability</div>

        <h3 class="text-center">Update Password</h3>

        @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif
        
        @if(session('message'))
            <div class="alert alert-success d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('message') }}
            </div>
        @endif

        <div class="alert alert-info mb-4 d-flex align-items-start">
            <i class="fas fa-info-circle me-2 mt-1"></i>
            <div>For security reasons, you need to change your default password before continuing.</div>
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
            
            <div class="d-grid gap-3 mt-4">
                <button class="btn btn-custom">Update Password</button>
                <a href="{{ route('dashboard') }}" class="btn btn-outline">Back to Dashboard</a>
            </div>
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
