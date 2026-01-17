@extends('layouts.babycare')

@section('title', '403 - Forbidden')

@section('content')
<!-- 403 Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-1 text-warning">403</h1>
                <h1 class="mb-4">Access Forbidden</h1>
                <p class="mb-4">Bạn không có quyền truy cập vào trang này. Nếu bạn cần quyền truy cập, vui lòng liên hệ với quản trị viên.</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('home') }}">
                        <i class="fas fa-home me-2"></i>Trang chủ
                    </a>
                    <a class="btn btn-outline-primary rounded-pill py-3 px-5" href="javascript:history.back()">
                        <i class="fas fa-arrow-left me-2"></i>Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 403 End -->
@endsection

