<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account - May's Company</title>
    <!-- Bootstrap CSS (fallback) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (fallback) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS (will work offline) -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card-form">
            <h2 class="text-center mb-4" style="color: var(--salmon-pink);">Create Account</h2>

            @if(session('message'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate>
                @csrf
                <div class="mb-4">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background-color: var(--light-gray); border: none;">
                            <i class="fas fa-user" style="color: var(--text-medium);"></i>
                        </span>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="alert alert-info mb-4">
                    <i class="fas fa-info-circle me-2"></i>
                    A default password (Changeme123) will be assigned. You'll be prompted to change it after login.
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-custom py-2">Create Account</button>
                </div>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" style="color: var(--salmon-pink); text-decoration: none;">
                    <i class="fas fa-arrow-left me-1"></i> Back to Login
                </a>
            </div>
        </div>
    </div>

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
    </style>
</body>
</html>
