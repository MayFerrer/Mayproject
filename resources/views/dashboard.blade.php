@extends('layout.layout1') <!-- Correctly extending the layout -->

@section('content')
<div class="container">
    <!-- Dashboard Header -->
    <div class="row">
        <div class="col-12 text-center my-5">
            <h1 class="display-5 fw-bold">Welcome Back, {{ $username }}!</h1>

            <p class="lead">Track your activities, monitor stats, and manage everything in one place.</p>
        </div>
    </div>

    <!-- Profile and Stats Section -->
    <div class="row g-4">
        <!-- User Profile -->
        <div class="col-md-6">
            <div class="card h-100 border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary">👤 User Profile</h5>
                    <p><strong>Name:</strong> May Marie</p>
                    <p><strong>Email:</strong> may@example.com</p>
                    <p><strong>Joined:</strong> January 2023</p>
                    <a href="#" class="btn btn-primary mt-2">Edit Profile</a>
                </div>
            </div>
        </div>

        <!-- Account Statistics -->
        <div class="col-md-6">
            <div class="card h-100 border-info">
                <div class="card-body">
                    <h5 class="card-title text-info">📊 Account Stats</h5>
                    <ul class="list-unstyled mb-0">
                        <li><strong>Total Posts:</strong> 15</li>
                        <li><strong>Total Comments:</strong> 120</li>
                        <li><strong>Active Since:</strong> 3 months</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row my-5">
        <div class="col-12">
            <h3 class="mb-3">📝 Recent Activities</h3>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action border-start border-3 border-primary">
                    <h5 class="mb-1">New Article: "How to Manage Your Time Effectively"</h5>
                    <small class="text-muted">Published on March 5, 2025</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action border-start border-3 border-info">
                    <h5 class="mb-1">Commented: "The Importance of Work-Life Balance"</h5>
                    <small class="text-muted">March 3, 2025</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action border-start border-3 border-success">
                    <h5 class="mb-1">Liked Post: "Top 5 Tools for Remote Work"</h5>
                    <small class="text-muted">March 1, 2025</small>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats and Sales Section -->
    <div class="row g-4 mb-5">
        <!-- Website Traffic -->
        <div class="col-md-6">
            <div class="card h-100 border-success">
                <div class="card-body">
                    <h5 class="card-title text-success">🌐 Website Traffic</h5>
                    <p><strong>Page Views (30 days):</strong> 12,340</p>
                    <p><strong>Unique Visitors:</strong> 5,678</p>
                    <p><strong>Bounce Rate:</strong> 20%</p>
                </div>
            </div>
        </div>

        <!-- Recent Sales -->
        <div class="col-md-6">
            <div class="card h-100 border-warning">
                <div class="card-body">
                    <h5 class="card-title text-warning">💵 Recent Sales</h5>
                    <ul class="list-unstyled">
                        <li><strong>Order #1234:</strong> $45.00 <span class="text-muted">– Mar 5, 2025</span></li>
                        <li><strong>Order #1233:</strong> $30.00 <span class="text-muted">– Mar 3, 2025</span></li>
                        <li><strong>Order #1232:</strong> $90.00 <span class="text-muted">– Mar 1, 2025</span></li>
                    </ul>
                    <a href="#" class="btn btn-primary mt-2">View All Sales</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation / CTA -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h4 class="mb-3">Quick Navigation</h4>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="{{ route('students.index') }}" class="btn btn-outline-primary">📚 Manage Students</a>
                <a href="{{ route('aboutus') }}" class="btn btn-outline-info">ℹ️ About Us</a>
                <a href="{{ route('contactus') }}" class="btn btn-outline-success">✉️ Contact Us</a>
            </div>
        </div>
    </div>
</div>
@endsection
