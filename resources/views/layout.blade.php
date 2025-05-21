<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Layout</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Font Awesome (optional, for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS for Hover Effects -->
    <style>
        /* Hover effect for navbar links */
        .nav-link {
            transition: all 0.3s ease;
        }

        .nav-link:hover {
    color: #3dadb7 !important;  /* Change text color on hover */
    background-color: rgb(65, 54, 33);  /* Add background color on hover */
    border-radius: 5px;

        }

        .nav-item {
            padding-left: 15px;
        }

        /* Updated header style */
        header {
            background-color: 	#3dadb7; /* Background color */
        }

        /* Footer background color matching header */
        footer {
            background-color: 	#3dadb7; /* Same color as header */
        }

        /* Text alignment for left side */
        .header-text {
            font-size: 1.5rem;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Header with Navbar -->
     @section(section:'header with navbar')


    <header class="text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Text on the left -->
            <div class="header-text">
                May's Company
            </div>

            <!-- Navbar -->
            <nav>
                <ul class="nav justify-content-end">
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
                        <a class="nav-link text-white" href="{{ route('conditional') }}">Conditional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('students') }}">Student List</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    @show
    <!-- Main Content -->
     @section(section:'Main')


    <main class="container my-5">
        @yield('content') <!-- This will be replaced by content from specific pages -->

        <!-- Call-to-Action Section -->
        <!-- <section class="cta text-center bg-light py-5">
            <div class="container">
                <h2 class="mb-3">Start Your Journey With Us Today</h2>
                <p class="lead mb-4">Let us help you achieve your goals with our expertise and innovative solutions.</p>
                <a href="{{ route('contactus') }}" style="color: #3dadb7;">Contact Us</a>

            </div>
        </section> -->
    </main>
@show
    <!-- Footer -->
     @section(section:'footer')


    <footer class="text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Your Website. All Rights Reserved.</p>
        <p>
            <a href="https://facebook.com" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
        </p>
    </footer>
@show
    <!-- Bootstrap JS & Popper (optional for dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
