<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account | Vèle</title>
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
        
        .back-link {
            color: var(--terra);
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .back-link:hover {
            color: var(--charcoal);
        }
    </style>
</head>
<body>
    <div class="card-form">
        <div class="logo">vèle</div>
        <div class="subtitle">where style meets sustainability</div>
        
        <h3 class="text-center">Create Account</h3>

        @if(session('message'))
            <div class="alert alert-success d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="mb-4">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <div class="alert alert-info d-flex align-items-start">
                    <i class="fas fa-info-circle me-2 mt-1"></i>
                    <div>A default password will be assigned. You'll be prompted to change it after login.</div>
                </div>
            </div>
            
            <div class="d-grid gap-3 mt-4">
                <button class="btn btn-custom">Create Account</button>
                <div class="section-divider"></div>
                <div class="text-center">
                    <a href="{{ route('login') }}" class="back-link text-decoration-none">
                        <i class="fas fa-arrow-left me-1"></i> Back to Login
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

