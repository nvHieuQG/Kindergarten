@extends('layouts.babycare')

@section('title', 'Đánh giá từ phụ huynh - Hoa Hướng Dương')

@section('content')
    <x-page-header title="Đánh giá" active="Đánh giá" />

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Phản hồi</h4>
                <h1 class="mb-5 display-3">Phụ huynh nói gì về chúng tôi</h1>
            </div>
            
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                        <p class="fs-5 mb-4">"Trường mầm non Hoa Hướng Dương là nơi tôi hoàn toàn yên tâm khi gửi gắm con mình. Các cô giáo rất tận tâm và yêu trẻ."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle p-2 border border-primary bg-white" src="{{ asset('assets/img/testimonial-1.jpg') }}" alt="" style="width: 60px; height: 60px;">
                            <div class="ms-3">
                                <h4 class="text-primary mb-0">Chị Lan Hương</h4>
                                <p class="mb-0">Phụ huynh bé Bo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                        <p class="fs-5 mb-4">"Môi trường học tập thân thiện, sạch sẽ và các hoạt động ngoại khóa rất đa dạng giúp con tôi năng động hơn mỗi ngày."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle p-2 border border-primary bg-white" src="{{ asset('assets/img/testimonial-2.jpg') }}" alt="" style="width: 60px; height: 60px;">
                            <div class="ms-3">
                                <h4 class="text-primary mb-0">Anh Minh Tuấn</h4>
                                <p class="mb-0">Phụ huynh bé Tít</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                        <p class="fs-5 mb-4">"Tôi rất ấn tượng với cơ sở vật chất và chế độ dinh dưỡng của trường. Con tôi ăn ngon và tăng cân đều đặn."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle p-2 border border-primary bg-white" src="{{ asset('assets/img/testimonial-3.jpg') }}" alt="" style="width: 60px; height: 60px;">
                            <div class="ms-3">
                                <h4 class="text-primary mb-0">Chị Thu Trà</h4>
                                <p class="mb-0">Phụ huynh bé Miu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
