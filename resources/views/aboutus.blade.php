@extends('layout.layout1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold" style="color: var(--salmon-pink);">About May's Company</h1>
                <p class="lead text-muted">We're a team of dedicated professionals committed to excellence.</p>
            </div>
            
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3 text-center" style="background-color: var(--light-beige); width: 50px; height: 50px; border-radius: 10px; line-height: 50px;">
                                    <i class="fas fa-bullseye" style="color: var(--taupe); font-size: 1.5rem;"></i>
                                </div>
                                <h3 class="card-title mb-0" style="color: var(--taupe);">Our Mission</h3>
                            </div>
                            <p class="card-text">To provide exceptional educational management solutions that empower educators and students alike. We believe in creating systems that are intuitive, efficient, and adaptable to the evolving needs of educational institutions.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3 text-center" style="background-color: var(--light-beige); width: 50px; height: 50px; border-radius: 10px; line-height: 50px;">
                                    <i class="fas fa-eye" style="color: var(--taupe); font-size: 1.5rem;"></i>
                                </div>
                                <h3 class="card-title mb-0" style="color: var(--taupe);">Our Vision</h3>
                            </div>
                            <p class="card-text">To be the leading provider of educational management systems worldwide, recognized for our innovation, reliability, and commitment to enhancing the educational experience for all stakeholders.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4" style="color: var(--salmon-pink);">Our Story</h3>
                    <p>May's Company was founded in 2020 with a simple yet powerful goal: to revolutionize how educational institutions manage their administrative tasks. We recognized that educators often spent too much time on paperwork and not enough time teaching, so we set out to create solutions that would streamline these processes.</p>
                    <p>Starting with just a small team of passionate developers and educators, we've grown into a company that serves hundreds of schools across the country. Our flagship student management system has helped schools reduce administrative workload by up to 40%, allowing staff to focus more on what matters most—the students.</p>
                    <p>Today, we continue to innovate and expand our offerings, but our core mission remains the same: to make education administration simpler, more efficient, and more effective.</p>
                </div>
            </div>
            
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <h3 class="text-center mb-4" style="color: var(--taupe);">Our Values</h3>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3 mx-auto" style="background-color: var(--salmon-pink); opacity: 0.8; width: 60px; height: 60px; border-radius: 30px; line-height: 60px;">
                                <i class="fas fa-lightbulb" style="color: white; font-size: 1.75rem;"></i>
                            </div>
                            <h4 class="card-title" style="color: var(--text-dark);">Innovation</h4>
                            <p class="card-text text-muted">We constantly seek new and better ways to solve problems in education management.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3 mx-auto" style="background-color: var(--beige); opacity: 0.8; width: 60px; height: 60px; border-radius: 30px; line-height: 60px;">
                                <i class="fas fa-handshake" style="color: white; font-size: 1.75rem;"></i>
                            </div>
                            <h4 class="card-title" style="color: var(--text-dark);">Integrity</h4>
                            <p class="card-text text-muted">We operate with honesty, transparency, and a commitment to ethical practices in all we do.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3 mx-auto" style="background-color: var(--taupe); opacity: 0.8; width: 60px; height: 60px; border-radius: 30px; line-height: 60px;">
                                <i class="fas fa-users" style="color: white; font-size: 1.75rem;"></i>
                            </div>
                            <h4 class="card-title" style="color: var(--text-dark);">Collaboration</h4>
                            <p class="card-text text-muted">We believe in the power of teamwork and partnership with our clients to achieve excellence.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <a href="{{ route('contactus') }}" class="btn btn-lg px-5" style="background-color: var(--salmon-pink); color: white;">
                    <i class="fas fa-envelope me-2"></i>Get in Touch
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
