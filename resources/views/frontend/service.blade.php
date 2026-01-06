@extends('layouts.babycare')

@section('title', 'Dịch vụ của chúng tôi - Hoa Hướng Dương')

@section('content')
    <x-page-header title="Dịch vụ" active="Dịch vụ" />

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Chúng tôi cung cấp</h4>
                <h1 class="mb-5 display-3">Dịch vụ giáo dục tốt nhất</h1>
            </div>
            <div class="row g-5">
                @php
                    $services = \App\Models\Service::all();
                @endphp
                @forelse($services as $service)
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="text-center border-primary border bg-white service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-inner">
                                <div class="p-4">
                                    @if($service->image)
                                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid" style="max-height: 100px;">
                                    @elseif($service->icon)
                                        <i class="{{ $service->icon }} fa-6x text-primary"></i>
                                    @else
                                        <i class="fas fa-star fa-6x text-primary"></i>
                                    @endif
                                </div>
                                <h4 class="mb-3">{{ $service->title }}</h4>
                                <p class="mb-4">{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>Hiện chưa có dịch vụ nào được cập nhật.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
