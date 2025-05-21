@extends('layout.layout1') <!-- Use your layout -->

@section('content')
    <div class="container">
        <!-- About Us Title -->
        <h1 class="my-4 text-center" style="color: #3dadb7;">About Us</h1>

        <!-- Introductory Paragraph -->
        <p class="text-center text-secondary">We are a company that does amazing things! Our goal is to provide high-quality services that make a difference in the lives of our customers. We have a team of dedicated professionals working tirelessly to bring the best solutions to our clients.</p>

        <!-- Our Story Section -->
        <section class="our-story my-5 border p-4 rounded shadow" style="border-color: #3dadb7; background-color: #e8f7ff;">
            <h2 class="text-black">Our Story</h2>
            <p>Founded in 2010, we began with a vision to revolutionize the way people interact with technology. Over the years, we’ve grown from a small startup to a leading player in the industry, driven by innovation and a commitment to excellence.</p>
            <p>Through continuous research and development, we have created cutting-edge products and services that solve real-world problems. Our success is the result of hard work, a passionate team, and a customer-first approach that has earned us trust and respect across various industries.</p>
        </section>

        <!-- Mission and Vision Section -->
        <section class="mission-vision my-5 border p-4 rounded shadow" style="border-color: #3dadb7; background-color: #e8f7ff;">
            <h2 class="text-black">Our Mission</h2>
            <p>Our mission is to create value for our clients through innovative technology solutions that empower businesses to thrive in a digital world. We aim to be the best at what we do, delivering high-quality services with integrity, transparency, and dedication.</p>

            <h2 class="text-black">Our Vision</h2>
            <p>To be a global leader in our industry, helping organizations and individuals unlock their potential through the power of technology. We envision a future where our solutions play a key role in shaping the success of our clients and improving lives worldwide.</p>
        </section>

        <!-- Meet The Team Section -->
        <section class="meet-the-team my-5 border p-4 rounded shadow" style="border-color: #3dadb7; background-color: #e8f7ff;">
            <h2 class="text-black">Meet Our Team</h2>
            <p>Our team is the backbone of our company. We have a diverse group of individuals who bring a wide range of skills, experience, and creativity to the table. Together, we collaborate to build innovative solutions that change the game for our clients.</p>
        </section>

        <!-- Core Values Section -->
        <section class="core-values my-5 border p-4 rounded shadow" style="border-color: #3dadb7; background-color: #e8f7ff;">
            <h2 class="text-purple">Our Core Values</h2>
            <p>At the heart of everything we do are our core values. These principles guide us and inspire us to deliver exceptional results every day:</p>
            <ul>
                <li><strong>Innovation:</strong> We are constantly pushing the boundaries of technology to create new and better solutions.</li>
                <li><strong>Integrity:</strong> We operate with transparency, honesty, and respect in all our interactions.</li>
                <li><strong>Customer Commitment:</strong> Our customers are at the center of our business, and we strive to meet their needs with excellence.</li>
                <li><strong>Collaboration:</strong> We believe in the power of teamwork to solve complex challenges and achieve success.</li>
                <li><strong>Excellence:</strong> We hold ourselves to the highest standards, continuously striving to improve and exceed expectations.</li>
            </ul>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials my-5 border p-4 rounded shadow" style="border-color: #16a085; background-color: #d1f0e7;">
            <h2 class="text-teal">What Our Clients Say</h2>
            <div class="row">
                <!-- Testimonial 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <p class="card-text">"This company has been a game-changer for our business. Their solutions have helped us streamline operations and grow faster."</p>
                            <footer class="blockquote-footer">Sarah Lee, <cite title="Source Title">CEO, Business Corp</cite></footer>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <p class="card-text">"The team at this company is incredible. They truly care about their clients and go above and beyond to meet their needs."</p>
                            <footer class="blockquote-footer">David Smith, <cite title="Source Title">Founder, Tech Startup</cite></footer>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
