@extends('layouts.babycare')

@section('title', 'Our Team - BabyCare')

@section('content')
    <x-page-header title="Our Team" active="Team" />

<!-- Team Start-->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Our Team</h4>
            <h1 class="mb-5 display-3">Meet With Our Expert Teacher</h1>
        </div>
        <div class="row g-5 justify-content-center">
            @forelse($teachers as $teacher)
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="team-item border border-primary img-border-radius overflow-hidden">
                    <img src="{{ $teacher->photo ? asset('storage/' . $teacher->photo) : asset('assets/img/team-1.jpg') }}" class="img-fluid w-100" alt="" style="height: 300px; object-fit: cover;">
                    <div class="team-icon d-flex align-items-center justify-content-center">
                        <a class="share btn btn-primary btn-md-square text-white rounded-circle me-3" href=""><i class="fas fa-share-alt"></i></a>
                        @if($teacher->facebook) <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="{{ $teacher->facebook }}"><i class="fab fa-facebook-f"></i></a> @endif
                        @if($teacher->twitter) <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="{{ $teacher->twitter }}"><i class="fab fa-twitter"></i></a> @endif
                        @if($teacher->instagram) <a class="share-link btn btn-primary btn-md-square text-white rounded-circle" href="{{ $teacher->instagram }}"><i class="fab fa-instagram"></i></a> @endif
                    </div>
                    <div class="team-content text-center py-3">
                        <h4 class="text-primary">{{ $teacher->name }}</h4>
                        <p class="text-muted mb-2">{{ $teacher->position }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No teachers available yet.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Team End-->
@endsection
