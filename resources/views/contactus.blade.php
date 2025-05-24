@extends('layout.layout1')

@section('title', 'Contact Us')

@section('content')
    <div class="container">
        <!-- Hero Section -->
        <div class="row mb-5">
            <div class="col-12 text-center py-4">
                <h1 class="display-4 fw-normal">Contact Us</h1>
                <div class="section-divider mx-auto" style="max-width: 200px;"></div>
                <p class="lead mt-4 text-muted">We'd love to hear from you. Reach out with any questions about our sustainable practices or products.</p>
            </div>
        </div>

        <div class="row mb-5">
            <!-- Contact Form -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="heading-font mb-4">Get in Touch</h3>
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label small text-muted">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required style="border-radius: 0; border-color: var(--mauve); padding: 12px;">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label small text-muted">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email" required style="border-radius: 0; border-color: var(--mauve); padding: 12px;">
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label small text-muted">Your Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required style="border-radius: 0; border-color: var(--mauve); padding: 12px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary px-4 py-2">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h3 class="heading-font mb-4">Contact Information</h3>
                        <div class="d-flex mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px; background-color: rgba(161, 92, 56, 0.1);">
                                <i class="fas fa-envelope" style="color: var(--terra);"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1">Email Us</h6>
                                <p class="mb-0"><a href="mailto:contact@example.com" class="text-decoration-none" style="color: var(--terra);">contact@example.com</a></p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px; background-color: rgba(161, 92, 56, 0.1);">
                                <i class="fas fa-phone-alt" style="color: var(--terra);"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1">Call Us</h6>
                                <p class="mb-0">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px; background-color: rgba(161, 92, 56, 0.1);">
                                <i class="fas fa-map-marker-alt" style="color: var(--terra);"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1">Visit Us</h6>
                                <p class="mb-0">123 Business St., City, Country</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="heading-font mb-4">Follow Us</h3>
                        <p class="text-muted mb-4">Stay connected with us through social media for the latest updates on our sustainable collections.</p>
                        <div class="d-flex gap-3">
                            <a href="https://facebook.com" class="btn btn-sm text-white p-2" style="background-color: var(--terra);" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com" class="btn btn-sm text-white p-2" style="background-color: var(--terra);" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://instagram.com" class="btn btn-sm text-white p-2" style="background-color: var(--terra);" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://pinterest.com" class="btn btn-sm text-white p-2" style="background-color: var(--terra);" target="_blank">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="ratio ratio-21x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.7448932624977!2d144.9556313152045!3d-37.8122189797514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d1f87a5f839%3A0xd80c9d8dbe340a1b!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1627675375439!5m2!1sen!2sau" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
