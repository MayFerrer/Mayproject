<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Password - May's Company</title>
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
            <h2 class="text-center mb-4" style="color: var(--salmon-pink);">Update Password</h2>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="alert alert-info mb-4">
                <i class="fas fa-info-circle me-2"></i>
                For security reasons, you need to change your default password before continuing.
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate>
                @csrf
                <div class="mb-4 password-field">
                    <label class="form-label">New Password</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background-color: var(--light-gray); border: none;">
                            <i class="fas fa-lock" style="color: var(--text-medium);"></i>
                        </span>
                        <input type="password" name="new_password" id="newPassword" class="form-control" required>
                    </div>
                    <i class="fas fa-eye password-toggle" id="toggleNewPassword"></i>
                    @error('new_password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4 password-field">
                    <label class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background-color: var(--light-gray); border: none;">
                            <i class="fas fa-lock" style="color: var(--text-medium);"></i>
                        </span>
                        <input type="password" name="new_password_confirmation" id="confirmPassword" class="form-control" required>
                    </div>
                    <i class="fas fa-eye password-toggle" id="toggleConfirmPassword"></i>
                </div>

                <div class="password-strength mb-4">
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" id="passwordStrength" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-muted" id="passwordStrengthText">Password strength: Too weak</small>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-custom py-2">Update Password</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
                </div>
            </form>
        </div>
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

        // Password strength meter
        document.getElementById('newPassword').addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            const progressBar = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('passwordStrengthText');
            
            progressBar.style.width = strength.score + '%';
            
            // Change progress bar color based on strength
            progressBar.className = 'progress-bar';
            if (strength.score < 30) {
                progressBar.classList.add('bg-danger');
                strengthText.textContent = 'Password strength: Too weak';
            } else if (strength.score < 60) {
                progressBar.classList.add('bg-warning');
                strengthText.textContent = 'Password strength: Medium';
            } else {
                progressBar.classList.add('bg-success');
                strengthText.textContent = 'Password strength: Strong';
            }
        });

        function calculatePasswordStrength(password) {
            let score = 0;
            
            // Length check
            if (password.length > 6) score += 20;
            if (password.length > 10) score += 10;
            
            // Complexity checks
            if (/[A-Z]/.test(password)) score += 15; // Uppercase
            if (/[a-z]/.test(password)) score += 15; // Lowercase
            if (/[0-9]/.test(password)) score += 15; // Numbers
            if (/[^A-Za-z0-9]/.test(password)) score += 25; // Special chars
            
            return {
                score: Math.min(100, score)
            };
        }
    </script>
    
    <style>
        body {
            background: linear-gradient(135deg, var(--salmon-pink), var(--beige));
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
        
        .progress {
            border-radius: 50px;
            background-color: var(--light-gray);
            margin-top: 5px;
        }
    </style>
</body>
</html>
