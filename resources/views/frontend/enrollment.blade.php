@extends('layouts.babycare')

@section('title', 'Enrollment - BabyCare')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4">Enrollment</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">Enrollment</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Enrollment Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Enrollment</h4>
            <h1 class="mb-5 display-3">Join Our Class</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                <p class="text-center mb-5">Please fill out the form below to enroll your child in our programs. We will contact you shortly to confirm the details.</p>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('enrollment.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Child Name</label>
                            <input type="text" name="child_name" class="form-control border-0 py-3" placeholder="Child Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="child_dob" class="form-control border-0 py-3" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <select name="child_gender" class="form-select border-0 py-3" required>
                                <option value="" selected disabled>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Program Interested</label>
                            <select name="program" class="form-select border-0 py-3">
                                <option value="" selected disabled>Select Program</option>
                                <option value="Baby Care">Baby Care</option>
                                <option value="English Class">English Class</option>
                                <option value="Art Class">Art Class</option>
                                <option value="Music Class">Music Class</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Parent Name</label>
                            <input type="text" name="parent_name" class="form-control border-0 py-3" placeholder="Parent Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Parent Email</label>
                            <input type="email" name="parent_email" class="form-control border-0 py-3" placeholder="Parent Email" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Parent Phone</label>
                            <input type="tel" name="parent_phone" class="form-control border-0 py-3" placeholder="Parent Phone" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control border-0 py-3" placeholder="Address">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Additional Message</label>
                            <textarea name="message" class="form-control border-0" rows="5" placeholder="Any special requirements or questions?"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary w-100 py-3 btn-border-radius" type="submit">Submit Enrollment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Enrollment End -->
@endsection
