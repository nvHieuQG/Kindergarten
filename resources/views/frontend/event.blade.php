@extends('layouts.babycare')

@section('title', 'Events - BabyCare')

@section('content')
    <x-page-header title="Our Events" active="Events" />

<!-- Events Start -->
<div class="container-fluid events py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Our Events</h4>
            <h1 class="mb-5 display-3">Our Upcoming Events</h1>
        </div>
        <div class="row g-5 justify-content-center">
            @forelse($events as $event)
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="events-item bg-primary rounded">
                    <div class="events-inner position-relative">
                        <div class="events-img overflow-hidden rounded-circle position-relative">
                            <img src="{{ $event->image ? asset('storage/' . $event->image) : asset('assets/img/event-1.jpg') }}" class="img-fluid w-100 rounded-circle" alt="Image" style="height: 250px; object-fit: cover;">
                            <div class="event-overlay">
                                <a href="{{ $event->image ? asset('storage/' . $event->image) : asset('assets/img/event-1.jpg') }}" data-lightbox="event-1"><i class="fas fa-search-plus text-white fa-2x"></i></a>
                            </div>
                        </div>
                        <div class="px-4 py-2 bg-secondary text-white text-center events-rate">{{ $event->start_date->format('d M') }}</div>
                        <div class="d-flex justify-content-between px-4 py-2 bg-secondary">
                            <small class="text-white"><i class="fas fa-calendar me-1 text-primary"></i> {{ $event->start_date->format('H:i') }}</small>
                            <small class="text-white"><i class="fas fa-map-marker-alt me-1 text-primary"></i> {{ Str::limit($event->location, 15) }}</small>
                        </div>
                    </div>
                    <div class="events-text p-4 border border-primary bg-white border-top-0 rounded-bottom">
                        <a href="#" class="h4">{{ Str::limit($event->title, 25) }}</a>
                        <p class="mb-0 mt-3">{{ Str::limit($event->description, 80) }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No upcoming events at the moment.</p>
            </div>
            @endforelse

            <div class="col-12 d-flex justify-content-center mt-5">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</div>
<!-- Events End-->
@endsection
