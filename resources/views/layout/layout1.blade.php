<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vèle - Where Style Meets Sustainability</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <style>
        :root {
            --cream: #F7F1F0;
            --mauve: #C3A6A0;
            --terra: #A15C38;
            --charcoal: #262220;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--cream);
            color: var(--charcoal);
            line-height: 1.6;
        }
        
        h1, h2, h3, h4, h5, .heading-font {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 400;
        }
        
        .navbar {
            background-color: var(--cream);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 0.7rem 0;
        }
        
        .navbar-brand {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 2rem;
            color: var(--charcoal);
        }
        
        .nav-link {
            color: var(--charcoal) !important;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 0.5rem 1.2rem !important;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }
        
        .nav-link:hover {
            color: var(--terra) !important;
            background-color: transparent;
        }
        
        .btn-primary {
            background-color: var(--terra);
            border-color: var(--terra);
            color: var(--cream);
        }
        
        .btn-primary:hover {
            background-color: var(--charcoal);
            border-color: var(--charcoal);
        }
        
        .btn-outline-primary {
            border-color: var(--terra);
            color: var(--terra);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--terra);
            border-color: var(--terra);
            color: var(--cream);
        }
        
        .card {
            border-radius: 8px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .card-title {
            color: var(--terra);
            font-weight: 600;
        }
        
        footer {
            background-color: var(--charcoal);
            color: var(--cream);
            padding: 2rem 0;
        }
        
        .social-icon {
            color: var(--cream);
            font-size: 1.2rem;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        
        .social-icon:hover {
            color: var(--mauve);
        }
        
        .section-divider {
            height: 1px;
            background-color: var(--mauve);
            margin: 3rem 0;
            opacity: 0.5;
        }
        
        .auth-btn {
            border: 1px solid var(--terra);
            border-radius: 4px;
            color: var(--terra) !important;
        }
        
        .auth-btn:hover {
            background-color: var(--terra);
            color: var(--cream) !important;
        }
    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">vèle</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aboutus') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('conditional', ['grade' => 10]) }}">Conditional</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('students.index') }}">Student List</a>
                        </li>

                        {{-- Logout button always visible when session user exists --}}
                        @if(session()->has('user'))
                            <li class="nav-item ms-2">
                                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn auth-btn" 
                                        style="cursor:pointer;">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item ms-2">
                                <a class="nav-link auth-btn" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="text-center">
        <div class="container">
            <p class="mb-3">where style meets sustainability</p>
            <div class="mb-4">
                <a href="https://facebook.com" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="https://twitter.com" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://pinterest.com" class="social-icon"><i class="fab fa-pinterest"></i></a>
            </div>
            <p class="small">&copy; {{ date('Y') }} Vèle. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
