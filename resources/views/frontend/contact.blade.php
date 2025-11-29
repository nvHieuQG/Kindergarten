@extends('layouts.babycare')

@section('title', 'Contact Us - BabyCare')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4">Contact Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Contact Us</h4>
            <h1 class="mb-5 display-3">Get In Touch</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <h4 class="text-primary">Send Us A Message</h4>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control border-0 py-3" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control border-0 py-3" placeholder="Your Email" required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="subject" class="form-control border-0 py-3" placeholder="Subject" required>
                        </div>
                        <div class="col-12">
                            <textarea name="message" class="form-control border-0" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3 btn-border-radius" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <h4 class="text-primary">Contact Information</h4>
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 50px;">
                        <i class="fa fa-map-marker-alt text-primary"></i>
                    </div>
                    <div class="ms-3">
                        <h5>Address</h5>
                        <p class="mb-0">123 Street, New York, USA</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 50px;">
                        <i class="fa fa-phone-alt text-primary"></i>
                    </div>
                    <div class="ms-3">
                        <h5>Phone</h5>
                        <p class="mb-0">+012 345 67890</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 50px;">
                        <i class="fa fa-envelope text-primary"></i>
                    </div>
                    <div class="ms-3">
                        <h5>Email</h5>
                        <p class="mb-0">info@example.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
