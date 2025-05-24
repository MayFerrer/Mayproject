@extends('layout.layout1') <!-- Use your layout -->

@section('content')
    <div class="container">
        <!-- Hero Section -->
        <div class="row mb-5">
            <div class="col-12 text-center py-4">
                <h1 class="display-4 fw-normal">About Us</h1>
                <div class="section-divider mx-auto" style="max-width: 200px;"></div>
                <p class="lead mt-4 text-muted">We are a company that focuses on sourcing each material carefully and thoughtfully. By doing so, we ensure all fabrics come from ethical and fair trade sources.</p>
            </div>
        </div>

        <!-- Our Story Section -->
        <div class="row mb-5 align-items-center">
            <div class="col-md-6">
                <div class="p-4">
                    <h2 class="mb-4 heading-font">Our Story</h2>
                    <div class="mb-4" style="width: 50px; height: 3px; background-color: var(--terra);"></div>
                    <p class="mb-3">Founded in 2010, we began with a vision to revolutionize the way people interact with sustainable fashion. Over the years, we've grown from a small startup to a leading player in the industry, driven by innovation and a commitment to excellence.</p>
                    <p>Through continuous research and development, we have created timeless pieces that solve real-world problems. Our success is the result of hard work, a passionate team, and a customer-first approach that has earned us trust and respect across various industries.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div style="height: 350px; background-color: var(--mauve); display: flex; align-items: center; justify-content: center;">
                        <span class="heading-font text-white fs-1">Our Journey</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission and Vision Section -->
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <h3 class="heading-font mb-3">Our Mission</h3>
                    <div class="mb-4" style="width: 50px; height: 3px; background-color: var(--terra);"></div>
                    <p>Our mission is to create value for our clients through innovative sustainable fashion that empowers individuals to make ethical choices. We aim to be the best at what we do, delivering high-quality products with integrity, transparency, and dedication.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <h3 class="heading-font mb-3">Our Vision</h3>
                    <div class="mb-4" style="width: 50px; height: 3px; background-color: var(--terra);"></div>
                    <p>To be a global leader in sustainable fashion, helping individuals unlock their style potential through ethical choices. We envision a future where our products play a key role in shaping a more sustainable world and improving lives worldwide.</p>
                </div>
            </div>
        </div>

        <!-- Core Values Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm p-4">
                    <h2 class="heading-font mb-4 text-center">Our Core Values</h2>
                    <div class="section-divider mx-auto mb-4" style="max-width: 100px;"></div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="text-center p-3 h-100" style="background-color: rgba(195, 166, 160, 0.1); border-radius: 8px;">
                                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: var(--cream); color: var(--terra);">
                                    <i class="fas fa-lightbulb fa-2x"></i>
                                </div>
                                <h4 class="heading-font mb-3">Sustainability</h4>
                                <p class="mb-0">We are constantly pushing the boundaries of fashion to create new and better sustainable solutions.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 h-100" style="background-color: rgba(195, 166, 160, 0.1); border-radius: 8px;">
                                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: var(--cream); color: var(--terra);">
                                    <i class="fas fa-handshake fa-2x"></i>
                                </div>
                                <h4 class="heading-font mb-3">Integrity</h4>
                                <p class="mb-0">We operate with transparency, honesty, and respect in all our interactions with customers and suppliers.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 h-100" style="background-color: rgba(195, 166, 160, 0.1); border-radius: 8px;">
                                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: var(--cream); color: var(--terra);">
                                    <i class="fas fa-heart fa-2x"></i>
                                </div>
                                <h4 class="heading-font mb-3">Quality</h4>
                                <p class="mb-0">Our customers are at the center of our business, and we strive to provide clothing that lasts.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-4">
                <h2 class="heading-font">What Our Clients Say</h2>
                <div class="section-divider mx-auto" style="max-width: 100px;"></div>
            </div>
            <!-- Testimonial 1 -->
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background-color: var(--mauve); color: var(--cream); font-weight: bold;">
                                SL
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0">Sarah Lee</h5>
                                <small class="text-muted">CEO, Business Corp</small>
                            </div>
                        </div>
                        <p class="card-text mb-0">"This company has been a game-changer for our business. Their sustainable fashion solutions have helped us align with our ethical values."</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background-color: var(--mauve); color: var(--cream); font-weight: bold;">
                                DS
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0">David Smith</h5>
                                <small class="text-muted">Founder, Tech Startup</small>
                            </div>
                        </div>
                        <p class="card-text mb-0">"The team at vèle is incredible. They truly care about their clients and go above and beyond to provide sustainable fashion that feels luxurious."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
