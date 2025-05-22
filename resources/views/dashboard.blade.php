@extends('layout.layout1')

@section('content')
<div class="container">
    <!-- Dashboard Header -->
    <div class="row">
        <div class="col-12 text-center my-4">
            <div class="avatar-circle mx-auto mb-3">
                <span class="initials">{{ substr($username, 0, 1) }}</span>
            </div>
            <h1 class="display-5 fw-bold" style="color: var(--taupe);">Welcome, {{ $username }}!</h1>
            <p class="lead text-muted">Track your activities, monitor stats, and manage everything in one place.</p>
        </div>
    </div>

    <!-- Profile and Stats Section -->
    <div class="row g-4 mb-5">
        <!-- User Profile -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-user-circle me-2" style="color: var(--salmon-pink);"></i>
                        User Profile
                    </h5>
                    <div class="mt-3">
                        <p><strong>Name:</strong> May Marie</p>
                        <p><strong>Email:</strong> {{ $username }}</p>
                        <p><strong>Joined:</strong> January 2023</p>
                    </div>
                    <a href="#" class="btn btn-custom mt-3">
                        <i class="fas fa-edit me-2"></i>Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Account Statistics -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-chart-bar me-2" style="color: var(--beige);"></i>
                        Account Stats
                    </h5>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-file-alt me-2"></i> Total Posts</span>
                                <span class="badge" style="background-color: var(--light-beige); color: var(--text-dark);">15</span>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-comments me-2"></i> Total Comments</span>
                                <span class="badge" style="background-color: var(--light-beige); color: var(--text-dark);">120</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-calendar-alt me-2"></i> Active Since</span>
                                <span class="badge" style="background-color: var(--light-beige); color: var(--text-dark);">3 months</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-3" style="color: var(--taupe);"><i class="fas fa-history me-2"></i> Recent Activities</h3>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action border-start border-3" style="border-left-color: var(--salmon-pink) !important;">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">New Article: "How to Manage Your Time Effectively"</h5>
                        <small class="text-muted">March 5, 2025</small>
                    </div>
                    <p class="mb-1 text-muted">You published a new article about time management techniques.</p>
                </a>
                <a href="#" class="list-group-item list-group-item-action border-start border-3" style="border-left-color: var(--beige) !important;">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Commented: "The Importance of Work-Life Balance"</h5>
                        <small class="text-muted">March 3, 2025</small>
                    </div>
                    <p class="mb-1 text-muted">You left a comment on an article about maintaining work-life balance.</p>
                </a>
                <a href="#" class="list-group-item list-group-item-action border-start border-3" style="border-left-color: var(--taupe) !important;">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Liked Post: "Top 5 Tools for Remote Work"</h5>
                        <small class="text-muted">March 1, 2025</small>
                    </div>
                    <p class="mb-1 text-muted">You liked a post about tools that enhance remote work productivity.</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats and Sales Section -->
    <div class="row g-4 mb-5">
        <!-- Website Traffic -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-globe me-2" style="color: var(--taupe);"></i>
                        Website Traffic
                    </h5>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Page Views (30 days)</span>
                            <span>12,340</span>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar" role="progressbar" style="width: 75%; background-color: var(--salmon-pink);" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span>Unique Visitors</span>
                            <span>5,678</span>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: var(--beige);" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span>Bounce Rate</span>
                            <span>20%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar" role="progressbar" style="width: 20%; background-color: var(--taupe);" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Sales -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-shopping-cart me-2" style="color: var(--coral);"></i>
                        Recent Sales
                    </h5>
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><strong>Order #1234:</strong> $45.00</span>
                                <span class="badge" style="background-color: var(--light-gray);">Mar 5, 2025</span>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><strong>Order #1233:</strong> $30.00</span>
                                <span class="badge" style="background-color: var(--light-gray);">Mar 3, 2025</span>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><strong>Order #1232:</strong> $90.00</span>
                                <span class="badge" style="background-color: var(--light-gray);">Mar 1, 2025</span>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-custom mt-3">
                        <i class="fas fa-list me-2"></i>View All Sales
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation / CTA -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h4 class="mb-4" style="color: var(--taupe);">Quick Navigation</h4>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="{{ route('students.index') }}" class="btn btn-lg" style="background-color: var(--salmon-pink); color: white;">
                    <i class="fas fa-user-graduate me-2"></i>Manage Students
                </a>
                <a href="{{ route('aboutus') }}" class="btn btn-lg" style="background-color: var(--beige); color: var(--text-dark);">
                    <i class="fas fa-info-circle me-2"></i>About Us
                </a>
                <a href="{{ route('contactus') }}" class="btn btn-lg" style="background-color: var(--taupe); color: white;">
                    <i class="fas fa-envelope me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .avatar-circle {
        width: 80px;
        height: 80px;
        background-color: var(--salmon-pink);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
        
    .initials {
        font-size: 2.5rem;
        color: white;
        font-weight: 500;
        text-transform: uppercase;
    }
    
    .progress {
        background-color: var(--light-gray);
        border-radius: 50px;
    }
    
    .list-group-item {
        border-left: none;
        border-right: none;
        padding: 1rem 0;
        transition: all 0.3s ease;
    }
    
    .list-group-item:hover {
        background-color: var(--light-gray);
    }
</style>
@endsection
