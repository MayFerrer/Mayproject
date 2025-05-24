@extends('layout.layout1') <!-- Correctly extending the layout -->

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12 text-center py-4">
            <h1 class="display-5 fw-normal">Welcome Back, {{ $username }}</h1>
            <div class="section-divider mx-auto" style="max-width: 200px;"></div>
            <p class="lead mt-3 text-muted">Track your activities, monitor stats, and manage everything in one place.</p>
        </div>
    </div>

    <!-- Profile and Stats Section -->
    <div class="row g-4 mb-5">
        <!-- User Profile -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">User Profile</h5>
                    <div class="d-flex align-items-center mb-4">
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background-color: var(--mauve); color: var(--cream);">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <div class="ms-4">
                            <h4 class="mb-0">May Marie</h4>
                            <p class="text-muted mb-0">Premium Member</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <p class="mb-1"><i class="fas fa-envelope me-2" style="color: var(--terra);"></i> <strong>Email:</strong> may@example.com</p>
                            <p class="mb-1"><i class="fas fa-calendar-alt me-2" style="color: var(--terra);"></i> <strong>Joined:</strong> January 2023</p>
                            <p><i class="fas fa-map-marker-alt me-2" style="color: var(--terra);"></i> <strong>Location:</strong> San Francisco, CA</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>

        <!-- Account Statistics -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Account Stats</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 rounded" style="background-color: rgba(195, 166, 160, 0.1);">
                                <h3 class="mb-1">15</h3>
                                <p class="text-muted mb-0">Total Posts</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded" style="background-color: rgba(195, 166, 160, 0.1);">
                                <h3 class="mb-1">120</h3>
                                <p class="text-muted mb-0">Comments</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded" style="background-color: rgba(195, 166, 160, 0.1);">
                                <h3 class="mb-1">3</h3>
                                <p class="text-muted mb-0">Months Active</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded" style="background-color: rgba(195, 166, 160, 0.1);">
                                <h3 class="mb-1">4.8</h3>
                                <p class="text-muted mb-0">Rating</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Recent Activities</h5>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 py-3 d-flex align-items-center border-0 border-bottom">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px; background-color: rgba(161, 92, 56, 0.1);">
                                <i class="fas fa-file-alt" style="color: var(--terra);"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h6 class="mb-1">New Article: "How to Manage Your Time Effectively"</h6>
                                <small class="text-muted">Published on March 5, 2025</small>
                            </div>
                            <div>
                                <a href="#" class="btn btn-sm" style="color: var(--terra);"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-3 d-flex align-items-center border-0 border-bottom">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px; background-color: rgba(161, 92, 56, 0.1);">
                                <i class="fas fa-comment-alt" style="color: var(--terra);"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h6 class="mb-1">Commented: "The Importance of Work-Life Balance"</h6>
                                <small class="text-muted">March 3, 2025</small>
                            </div>
                            <div>
                                <a href="#" class="btn btn-sm" style="color: var(--terra);"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-3 d-flex align-items-center border-0">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px; background-color: rgba(161, 92, 56, 0.1);">
                                <i class="fas fa-heart" style="color: var(--terra);"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h6 class="mb-1">Liked Post: "Top 5 Tools for Remote Work"</h6>
                                <small class="text-muted">March 1, 2025</small>
                            </div>
                            <div>
                                <a href="#" class="btn btn-sm" style="color: var(--terra);"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats and Sales Section -->
    <div class="row g-4 mb-5">
        <!-- Website Traffic -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Website Traffic</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background-color: rgba(195, 166, 160, 0.1);">
                            <i class="fas fa-chart-line" style="color: var(--terra);"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">Page Views (30 days)</h6>
                            <h4 class="mb-0">12,340</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background-color: rgba(195, 166, 160, 0.1);">
                            <i class="fas fa-users" style="color: var(--terra);"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">Unique Visitors</h6>
                            <h4 class="mb-0">5,678</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background-color: rgba(195, 166, 160, 0.1);">
                            <i class="fas fa-undo-alt" style="color: var(--terra);"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">Bounce Rate</h6>
                            <h4 class="mb-0">20%</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Sales -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Recent Sales</h5>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 py-3 d-flex align-items-center border-0 border-bottom">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background-color: rgba(195, 166, 160, 0.1);">
                                <i class="fas fa-shopping-bag" style="color: var(--terra);"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h6 class="mb-0">Order #1234</h6>
                                <small class="text-muted">Mar 5, 2025</small>
                            </div>
                            <div>
                                <span class="fw-bold">$45.00</span>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-3 d-flex align-items-center border-0 border-bottom">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background-color: rgba(195, 166, 160, 0.1);">
                                <i class="fas fa-shopping-bag" style="color: var(--terra);"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h6 class="mb-0">Order #1233</h6>
                                <small class="text-muted">Mar 3, 2025</small>
                            </div>
                            <div>
                                <span class="fw-bold">$30.00</span>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-3 d-flex align-items-center border-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background-color: rgba(195, 166, 160, 0.1);">
                                <i class="fas fa-shopping-bag" style="color: var(--terra);"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h6 class="mb-0">Order #1232</h6>
                                <small class="text-muted">Mar 1, 2025</small>
                            </div>
                            <div>
                                <span class="fw-bold">$90.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="btn btn-primary">View All Sales</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation / CTA -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card" style="background-color: var(--cream); border: 1px solid var(--mauve);">
                <div class="card-body p-4 text-center">
                    <h4 class="mb-4">Quick Navigation</h4>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('students.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-user-graduate me-2"></i> Manage Students
                        </a>
                        <a href="{{ route('aboutus') }}" class="btn btn-outline-primary">
                            <i class="fas fa-info-circle me-2"></i> About Us
                        </a>
                        <a href="{{ route('contactus') }}" class="btn btn-outline-primary">
                            <i class="fas fa-envelope me-2"></i> Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
