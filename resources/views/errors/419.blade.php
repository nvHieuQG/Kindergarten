@extends('layouts.babycare')

@section('title', '419 - Page Expired')

@section('content')
<!-- 419 Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-1 text-warning">419</h1>
                <h1 class="mb-4">Page Expired</h1>
                <p class="mb-4">Phiên làm việc của bạn đã hết hạn do bảo mật. Vui lòng làm mới trang và thử lại.</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="javascript:location.reload()">
                        <i class="fas fa-sync-alt me-2"></i>Làm mới trang
                    </a>
                    <a class="btn btn-outline-primary rounded-pill py-3 px-5" href="{{ route('home') }}">
                        <i class="fas fa-home me-2"></i>Trang chủ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 419 End -->
@endsection

