<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laravel Layout</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Optional: Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- Font Awesome (optional, for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <style>
        /* Hover effect for navbar links */
        .nav-link {
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #3dadb7 !important;
            background-color: rgb(65, 54, 33);
            border-radius: 5px;
        }

        .nav-item {
            padding-left: 15px;
        }

        header {
            background-color: #3dadb7;
        }

        footer {
            background-color: #3dadb7;
        }

        .header-text {
            font-size: 1.5rem;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <header class="text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="header-text">May's Company</div>

            <nav>
                <ul class="nav justify-content-end align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('aboutus') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('contactus') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('conditional', ['grade' => 10]) }}">Conditional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('students', ['grade' => 10]) }}">Student List</a>
                    </li>

                    {{-- Logout button always visible when session user exists --}}
                    @if(session()->has('user'))
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link text-white p-0 border-0 bg-transparent" 
                                        style="cursor:pointer;">
                                    Logout ({{ session('user')->username }})
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Your Website. All Rights Reserved.</p>
        <p>
            <a href="https://facebook.com" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
