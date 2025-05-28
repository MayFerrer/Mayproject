<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | MayMayvèle</title>
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
            --light-brown: #E6D5B8;
        }
        
        body {
            background: var(--light-brown);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            color: var(--charcoal);
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, var(--mauve) 0%, transparent 50%);
            opacity: 0.1;
            animation: rotate 30s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        
        .card-form {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            padding: 2rem;
            width: 360px;
            height: 460px;
            position: relative;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            flex-direction: column;
        }
        
        h3 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 400;
            color: var(--terra);
            margin-bottom: 1.25rem;
            font-size: 1.5rem;
        }
        
        .btn-custom {
            background: linear-gradient(to right, var(--terra), var(--charcoal));
            border: none;
            color: #fff;
            transition: all 0.3s ease;
            border-radius: 4px;
            padding: 0.7rem 1rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-custom:active {
            transform: translateY(0);
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid var(--terra);
            color: var(--terra);
            border-radius: 4px;
            transition: all 0.3s ease;
            padding: 0.7rem 1rem;
        }
        
        .btn-outline:hover {
            background: linear-gradient(to right, var(--terra), var(--charcoal));
            border-color: transparent;
            color: white;
        }
        
        .form-control {
            border-radius: 4px;
            border: 2px solid rgba(195, 166, 160, 0.3);
            padding: 0.6rem 0.8rem;
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            box-shadow: none;
            border-color: var(--terra);
            background: white;
        }
        
        .form-label {
            color: var(--charcoal);
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 0.3rem;
        }
        
        .password-field {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 35px;
            cursor: pointer;
            color: var(--mauve);
            transition: all 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--terra);
        }
        
        .section-divider {
            height: 2px;
            background: linear-gradient(to right, var(--mauve), var(--terra));
            margin: 1.25rem 0;
            opacity: 0.3;
            border-radius: 2px;
        }
        
        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 2.2rem;
            background: linear-gradient(45deg, var(--terra), var(--charcoal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.3rem;
            text-align: center;
        }
        
        .subtitle {
            font-size: 0.8rem;
            color: var(--mauve);
            text-align: center;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
        }

        .alert {
            border: none;
            border-radius: 4px;
            padding: 0.75rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.9);
            font-size: 0.85rem;
        }

        .alert-danger {
            background: linear-gradient(to right, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
            color: #dc3545;
        }

        .alert-success {
            background: linear-gradient(to right, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.05));
            color: #28a745;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .mb-4 {
            margin-bottom: 1.25rem !important;
        }

        .mt-4 {
            margin-top: 1.25rem !important;
        }
    </style>
</head>

<body>
    <div class="card-form">
        <div class="logo">MayMayvèle</div>
        <div class="subtitle">where style meets sustainability</div>
        
        @if(session('user'))
            <h3 class="text-center mb-4">Welcome, {{ session('user')->username }}</h3>
            <div class="d-grid gap-3">
                <a href="{{ route('dashboard') }}" class="btn btn-custom">Go to Dashboard</a>
                <a href="{{ route('update-password') }}" class="btn btn-outline">Update Password</a>
            </div>
        @else
            <h3 class="text-center">Sign In</h3>
            
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                </div>
            @endif
            
            @if(session('message'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('message') }}
                </div>
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
                
                <div class="d-grid gap-3 mt-4">
                    <button class="btn btn-custom">Log In</button>
                    <div class="section-divider"></div>
                </div>
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
