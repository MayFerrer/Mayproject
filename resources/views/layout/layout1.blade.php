<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mayvèle - Where Style Meets Sustainability</title>

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
            min-height: 100vh;
            display: flex;
        }
        
        h1, h2, h3, h4, h5, .heading-font {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 400;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--charcoal);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 1rem;
            z-index: 1000;
        }
        
        .sidebar-brand {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 2rem;
            color: var(--cream);
            text-decoration: none;
            display: block;
            text-align: center;
            padding: 1rem 0;
            margin-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-brand:hover {
            color: var(--mauve);
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav .nav-item {
            margin-bottom: 0.5rem;
        }

        .sidebar-nav .nav-link {
            color: var(--cream) !important;
            padding: 0.75rem 1rem;
            border-radius: 4px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sidebar-nav .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar-nav .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: var(--mauve) !important;
        }

        .sidebar-nav .nav-link.active {
            background-color: var(--terra);
            color: var(--cream) !important;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 2rem;
            background-color: var(--cream);
            min-height: 100vh;
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
        
        /* Logout button style */
        .logout-btn {
            background-color: transparent;
            border: 1px solid var(--mauve);
            color: var(--cream);
            width: 100%;
            padding: 0.75rem;
            margin-top: 2rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .logout-btn:hover {
            background-color: var(--mauve);
            color: var(--charcoal);
        }

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
        }
        
            .main-content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 1001;
                background-color: var(--charcoal);
                color: var(--cream);
                border: none;
                padding: 0.5rem;
                border-radius: 4px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Toggle Button (Mobile) -->
    <button class="sidebar-toggle d-md-none" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
                </button>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">Mayvèle</a>
        <ul class="sidebar-nav">
                        <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                        </li>
                        <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                    <i class="fas fa-user-graduate"></i> Student List
                </a>
                        </li>
                        <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('aboutus') ? 'active' : '' }}" href="{{ route('aboutus') }}">
                    <i class="fas fa-info-circle"></i> About Us
                </a>
                        </li>
                        <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('contactus') ? 'active' : '' }}" href="{{ route('contactus') }}">
                    <i class="fas fa-envelope"></i> Contact Us
                </a>
                        </li>
                        <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('conditional') ? 'active' : '' }}" href="{{ route('conditional', ['grade' => 10]) }}">
                    <i class="fas fa-tasks"></i> Conditional
                </a>
                        </li>
                        @if(session()->has('user'))
                <li class="nav-item mt-auto">
                    <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
</body>
</html>
