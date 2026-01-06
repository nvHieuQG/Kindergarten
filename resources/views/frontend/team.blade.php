@extends('layouts.babycare')

@section('title', 'Đội ngũ giáo viên - Hoa Hướng Dương')

@section('content')
<!-- Page Header Start -->
    <x-page-header title="Đội ngũ giáo viên" active="Giáo viên" />
<!-- Page Header End -->

<!-- Team Start-->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Đội ngũ của chúng tôi</h4>
            <h1 class="mb-5 display-3">Gặp gỡ giáo viên chuyên nghiệp</h1>
        </div>
        <div class="row g-5 justify-content-center">
            @forelse($teachers as $teacher)
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="team-item border border-primary img-border-radius overflow-hidden">
                    <img src="{{ $teacher->photo ? asset('storage/' . $teacher->photo) : asset('assets/img/team-1.jpg') }}" class="img-fluid w-100" alt="" style="height: 300px; object-fit: cover;">
                    <div class="team-icon d-flex align-items-center justify-content-center">
                        <a class="share btn btn-primary btn-md-square text-white rounded-circle me-3" href=""><i class="fas fa-share-alt"></i></a>
                        @if($teacher->facebook) <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="{{ $teacher->facebook }}"><i class="fab fa-facebook-f"></i></a> @endif

                    </div>
                    <div class="team-content text-center py-3">
                        <h4 class="text-primary">{{ $teacher->name }}</h4>
                        <p class="text-muted mb-2">{{ $teacher->position }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Chưa có giáo viên nào.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Team End-->
@endsection
