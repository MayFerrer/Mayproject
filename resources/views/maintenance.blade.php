@extends('layout.layout1')

@section('title', 'Maintenance Mode')

@section('content')
<div class="container-fluid p-0" style="background-image: url('https://via.placeholder.com/1600x900'); background-size: cover; background-position: center; min-height: 100vh;">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg rounded bg-light text-center p-4" style="max-width: 700px; width: 100%;">

            <!-- Maintenance Title with Icon -->
            <h1 class="fw-bold mb-3" style="color: #d9534f;">
                <i class="fas fa-cogs"></i> We're Under Maintenance
            </h1>

            <!-- Maintenance Message -->
            <p class="mb-4" style="font-size: 1.2rem; color: #555;">
                Our system is currently undergoing scheduled maintenance.<br>
                We’ll be back shortly. Thank you for your patience!
            </p>

            <!-- Loading Spinner (Centered) -->
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-danger" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <!-- Estimated Time (Optional) -->
            <div class="alert alert-info mt-4" style="font-size: 1.1rem;">
                <strong>Estimated Downtime:</strong> <span>Approximately 30 minutes</span>
            </div>


            <!-- Contact Information -->
            <div class="mt-4">
                <p class="text-muted">For urgent inquiries, contact support at <a href="mailto:support@example.com">support@example.com</a></p>
            </div>

        </div>
    </div>
</div>
@endsection
