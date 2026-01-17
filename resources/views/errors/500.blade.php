@extends('layouts.babycare')

@section('title', '500 - Server Error')

@section('content')
<!-- 500 Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-1 text-danger">500</h1>
                <h1 class="mb-4">Server Error</h1>
                <p class="mb-4">Xin lỗi, đã xảy ra lỗi trên máy chủ. Chúng tôi đang khắc phục sự cố này. Vui lòng thử lại sau hoặc quay lại trang chủ.</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('home') }}">
                    <i class="fas fa-home me-2"></i>Quay lại Trang chủ
                </a>
            </div>
        </div>
    </div>
</div>
<!-- 500 End -->
@endsection

