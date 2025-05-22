@extends('layout.layout1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold" style="color: var(--salmon-pink);">Get In Touch</h1>
                <p class="lead text-muted">We'd love to hear from you. Reach out with any questions or inquiries.</p>
            </div>
            
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title mb-4" style="color: var(--taupe);">Send us a message</h3>
                            
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstName" placeholder="Your first name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" placeholder="Your last name">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="your@email.com">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="How can we help?">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" placeholder="Your message here..."></textarea>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-custom py-2">
                                        <i class="fas fa-paper-plane me-2"></i> Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h3 class="card-title mb-4" style="color: var(--taupe);">Contact Information</h3>
                            
                            <div class="d-flex mb-4">
                                <div class="me-3 text-center" style="background-color: var(--light-beige); width: 40px; height: 40px; border-radius: 8px; line-height: 40px;">
                                    <i class="fas fa-map-marker-alt" style="color: var(--salmon-pink);"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Our Location</h5>
                                    <p class="text-muted mb-0">123 Education Lane, Learning City, LC 12345</p>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-4">
                                <div class="me-3 text-center" style="background-color: var(--light-beige); width: 40px; height: 40px; border-radius: 8px; line-height: 40px;">
                                    <i class="fas fa-phone-alt" style="color: var(--salmon-pink);"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Call Us</h5>
                                    <p class="text-muted mb-0">(123) 456-7890</p>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-4">
                                <div class="me-3 text-center" style="background-color: var(--light-beige); width: 40px; height: 40px; border-radius: 8px; line-height: 40px;">
                                    <i class="fas fa-envelope" style="color: var(--salmon-pink);"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Email Us</h5>
                                    <p class="text-muted mb-0">info@mayscompany.com</p>
                                </div>
                            </div>
                            
                            <div class="d-flex">
                                <div class="me-3 text-center" style="background-color: var(--light-beige); width: 40px; height: 40px; border-radius: 8px; line-height: 40px;">
                                    <i class="fas fa-clock" style="color: var(--salmon-pink);"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Business Hours</h5>
                                    <p class="text-muted mb-0">Monday - Friday: 9:00 AM - 5:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title mb-4" style="color: var(--taupe);">Connect With Us</h3>
                            
                            <div class="d-flex justify-content-around">
                                <a href="#" class="social-icon" style="background-color: var(--salmon-pink); color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-icon" style="background-color: var(--beige); color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon" style="background-color: var(--taupe); color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-icon" style="background-color: var(--light-beige); color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Google Map Placeholder -->
            <div class="card border-0 shadow-sm mt-5">
                <div class="card-body p-0">
                    <div style="background-color: var(--light-gray); height: 300px; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt" style="font-size: 3rem; color: var(--salmon-pink);"></i>
                            <h4 class="mt-3 mb-1">Find Us On The Map</h4>
                            <p class="text-muted">Map would be displayed here in a production environment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
