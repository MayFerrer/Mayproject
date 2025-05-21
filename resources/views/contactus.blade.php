@extends('layout.layout1') <!-- Make sure this layout is consistent with other views -->

@section('title', 'Contact Us')

@section('content')
    <div class="container">
        <h1 class="my-4">Contact Us</h1>

        <p>Feel free to reach out to us at <strong>contact@example.com</strong> or fill out the form below, and we will get back to you as soon as possible.</p>

        <!-- Contact Form -->
        <section class="contact-form my-5">
            <h2>Get in Touch</h2>
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </section>

        <!-- Google Maps Section -->
        <section class="my-5">
            <h2>Our Location</h2>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.7448932624977!2d144.9556313152045!3d-37.8122189797514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d1f87a5f839%3A0xd80c9d8dbe340a1b!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1627675375439!5m2!1sen!2sau" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>

        <!-- Additional Contact Info -->
        <section class="additional-info my-5">
            <h2>Additional Contact Information</h2>
            <ul class="list-unstyled">
                <li><i class="fas fa-phone-alt"></i> <strong>Phone:</strong> +1 (555) 123-4567</li>
                <li><i class="fas fa-envelope"></i> <strong>Email:</strong> <a href="mailto:contact@example.com">contact@example.com</a></li>
                <li><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> 123 Business St., City, Country</li>
            </ul>
        </section>

        <!-- Social Media Links -->
        <section class="social-media my-5 text-center">
            <h2>Follow Us</h2>
            <p>Stay connected with us through social media for the latest updates.</p>
            <div>
                <a href="https://facebook.com" class="btn btn-outline-primary mx-2" target="_blank">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="https://twitter.com" class="btn btn-outline-info mx-2" target="_blank">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
                <a href="https://instagram.com" class="btn btn-outline-danger mx-2" target="_blank">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
            </div>
        </section>
    </div>
@endsection
