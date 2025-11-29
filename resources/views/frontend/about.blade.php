@extends('layouts.babycare')

@section('title', 'Về chúng tôi - BabyCare')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4">Về chúng tôi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Trang</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">Về chúng tôi</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-fluid py-5 about bg-light">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="video border">
                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Về chúng tôi</h4>
                <h1 class="text-dark mb-4 display-5">Chúng tôi học cách thông minh để xây dựng tương lai tươi sáng cho con bạn</h1>
                <p class="text-dark mb-4">Lorem Ipsum chỉ là văn bản giả của ngành in ấn và sắp chữ. Lorem Ipsum đã là văn bản giả tiêu chuẩn của ngành kể từ những năm 1500, khi một máy in không xác định Lorem Ipsum đã là văn bản giả tiêu chuẩn của ngành kể từ những năm 1500.
                </p>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>Hoạt động thể thao</h6>
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Trò chơi ngoài trời</h6>
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Thực phẩm dinh dưỡng</h6>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>Bảo mật cao</h6>
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Môi trường thân thiện</h6>
                        <h6><i class="fas fa-check-circle me-2 text-secondary"></i>Giáo viên có trình độ</h6>
                    </div>
                </div>
                <a href="" class="btn btn-primary px-5 py-3 btn-border-radius">Chi tiết</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection
