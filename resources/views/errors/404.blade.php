@extends('layouts.babycare')

@section('title', '404 - Page Not Found')

@section('content')
    <x-page-header title="Không tìm thấy trang" active="Lỗi 404" />
    <!-- 404 Start -->
    <div class="container-fluid py-5 bg-light-subtle">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-1 text-primary">404</h1>
                    <h1 class="mb-4">Không tìm thấy trang</h1>
                    <p class="mb-4">Xin lỗi, trang bạn đang tìm kiếm không tồn tại trên website của chúng tôi. Có thể trang
                        đã bị di chuyển hoặc xóa. Vui lòng quay lại trang chủ hoặc sử dụng tìm kiếm.</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('home') }}">
                            <i class="fas fa-home me-2"></i>Về trang chủ
                        </a>
                        <a class="btn btn-outline-primary rounded-pill py-3 px-5" href="javascript:history.back()">
                            <i class="fas fa-arrow-left me-2"></i>Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->
@endsection
