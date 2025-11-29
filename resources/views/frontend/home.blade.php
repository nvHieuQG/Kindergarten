@extends('layouts.babycare')

@section('title', 'Home - BabyCare Daycare Website')

@section('content')
<!-- Hero Start -->
<div class="container-fluid py-5 hero-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7 col-md-12">
                <h1 class="mb-3 text-primary">Chúng tôi chăm sóc bé yêu của bạn</h1>    
                <h1 class="mb-5 display-1 text-white">Không gian vui chơi lý tưởng</h1>
                <a href="" class="btn btn-primary px-4 py-3 px-md-5  me-4 btn-border-radius">Bắt đầu</a>
                <a href="" class="btn btn-primary px-4 py-3 px-md-5 btn-border-radius">Tìm hiểu thêm</a>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

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
                <h1 class="text-dark mb-4 display-5">Chúng tôi đồng hành cùng bé học tập thông minh để xây dựng tương lai tươi sáng</h1>
                <p class="text-dark mb-4">Tại Mầm non Hạo Hướng Dương, chúng tôi mang đến môi trường học tập thân thiện, an toàn và sáng tạo. Với chương trình giáo dục hiện đại và đội ngũ giáo viên giàu kinh nghiệm, trẻ được phát triển toàn diện cả về trí tuệ, cảm xúc và thể chất.
Chúng tôi luôn nỗ lực tạo ra những trải nghiệm ý nghĩa nhất trong những năm tháng đầu đời của trẻ.</p>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>Thể thao</h6>
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Trò chơi ngoài trời phong phú</h6>
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Thức ăn lành mạnh</h6>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>Cơ sở vật chất an toàn, bảo mật</h6>
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Trường học thân thiện</h6>
                        <h6><i class="fas fa-check-circle me-2 text-secondary"></i>Đội ngũ giáo viên giàu kinh nghiệm</h6>
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn btn-primary px-5 py-3 btn-border-radius">Chi tiết</a>
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

<!-- Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Chúng tôi làm gì</h4>
            <h1 class="mb-5">Khởi đầu hành trình học tập và phát triển toàn diện dành cho các bé với môi trường thân thiện, sáng tạo và an toàn.</h1>
        </div>
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center border-primary border bg-white service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-inner">
                            <div class="p-4"><i class="fas fa-gamepad fa-6x text-primary"></i></div>
                            <a href="#" class="h4">Học & Chơi</a>
                            <p class="my-3">Chương trình học được thiết kế sinh động, kết hợp giữa học và chơi để giúp trẻ tiếp thu kiến thức tự nhiên, phát triển tư duy và kỹ năng xã hội thông qua các trò chơi giáo dục.</p>
                            <a href="#" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center border-primary border bg-white service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-inner">
                            <div class="p-4"><i class="fas fa-sort-alpha-down fa-6x text-primary"></i></div>
                            <a href="#" class="h4">Chương trình A đến Z</a>
                            <p class="my-3">Hệ thống chương trình từ A đến Z, bao gồm học tập, thể chất, nghệ thuật và khám phá khoa học – giúp trẻ phát triển đầy đủ về trí tuệ lẫn cảm xúc.</p>
                            <a href="#" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center border-primary border bg-white service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-inner">
                            <div class="p-4"><i class="fas fa-users fa-6x text-primary"></i></div>
                            <a href="#" class="h4">Giáo viên chuyên nghiệp</a>
                            <p class="my-3">Đội ngũ giáo viên giàu kinh nghiệm, tận tâm và yêu trẻ. Mỗi cô giáo là một người đồng hành, hướng dẫn và tạo cảm hứng học tập cho các bé mỗi ngày.</p>
                            <a href="#" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="text-center border-primary border bg-white service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-inner">
                            <div class="p-4"><i class="fas fa-user-nurse fa-6x text-primary"></i></div>
                            <a href="#" class="h4">Sức khỏe tinh thần</a>
                            <p class="my-3">Chúng tôi đặc biệt chú trọng sức khỏe tinh thần của trẻ. Các hoạt động trải nghiệm, giao tiếp và thư giãn giúp trẻ hình thành sự tự tin, cảm xúc tích cực và khả năng thích ứng tốt.</p>
                            <a href="#" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Programs Start -->
<div class="container-fluid program  py-5">

    
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Chương trình của chúng tôi</h4>
            <h1 class="mb-5 display-3">Bài Viết Nổi Bật</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="program-item rounded">
                    <div class="program-img position-relative">
                        <div class="overflow-hidden img-border-radius">
                            <img src="{{ asset('assets/img/program-1.jpg') }}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="px-4 py-2 bg-primary text-white program-rate">$60.99</div>
                    </div>
                    <div class="program-text bg-white px-4 pb-3">
                        <div class="program-text-inner">
                            <a href="#" class="h4">Tiếng Anh cho hôm nay</a>
                            <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed purus consectetur,</p>
                        </div>
                    </div>
                    <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                        <img src="{{ asset('assets/img/program-teacher.jpg') }}" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="Image" style="width: 70px; height: 70px;">
                        <div class="ms-3">
                            <h6 class="mb-0 text-primary">Mary Mordern</h6>
                            <small>Giáo viên nghệ thuật</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                        <small class="text-white"><i class="fas fa-wheelchair me-1"></i> 30 Chỗ</small>
                        <small class="text-white"><i class="fas fa-book me-1"></i> 11 Bài học</small>
                        <small class="text-white"><i class="fas fa-clock me-1"></i> 60 Giờ</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="program-item rounded">
                    <div class="program-img position-relative">
                        <div class="overflow-hidden img-border-radius">
                            <img src="{{ asset('assets/img/program-2.jpg') }}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="px-4 py-2 bg-primary text-white program-rate">$60.99</div>
                    </div>
                    <div class="program-text bg-white px-4 pb-3">
                        <div class="program-text-inner">
                            <a href="#" class="h4">Nghệ thuật đồ họa</a>
                            <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed purus consectetur,</p>
                        </div>
                    </div>
                    <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                        <img src="{{ asset('assets/img/program-teacher.jpg') }}" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="" style="width: 70px; height: 70px;">
                        <div class="ms-3">
                            <h6 class="mb-0 text-primary">Mary Mordern</h6>
                            <small>Giáo viên nghệ thuật</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                        <small class="text-white"><i class="fas fa-wheelchair me-1"></i> 30 Sits</small>
                        <small class="text-white"><i class="fas fa-book me-1"></i> 11 Lessons</small>
                        <small class="text-white"><i class="fas fa-clock me-1"></i> 60 Hours</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="program-item rounded">
                    <div class="program-img position-relative">
                        <div class="overflow-hidden img-border-radius">
                            <img src="{{ asset('assets/img/program-3.jpg') }}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="px-4 py-2 bg-primary text-white program-rate">$60.99</div>
                    </div>
                    <div class="program-text bg-white px-4 pb-3">
                        <div class="program-text-inner">
                            <a href="#" class="h4">Khoa học tổng quát</a>
                            <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed purus consectetur,</p>
                        </div>
                    </div>
                    <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                        <img src="{{ asset('assets/img/program-teacher.jpg') }}" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="" style="width: 70px; height: 70px;">
                        <div class="ms-3">
                            <h6 class="mb-0 text-primary">Mary Mordern</h6>
                            <small>Giáo viên nghệ thuật</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                        <small class="text-white"><i class="fas fa-wheelchair me-1"></i> 30 Sits</small>
                        <small class="text-white"><i class="fas fa-book me-1"></i> 11 Lessons</small>
                        <small class="text-white"><i class="fas fa-clock me-1"></i> 60 Hours</small>
                    </div>
                </div>
            </div>
            <div class="d-inline-block text-center wow fadeIn" data-wow-delay="0.1s">
                <a href="#" class="btn btn-primary px-5 py-3 text-white btn-border-radius">Xem tất cả chương trình</a>
            </div>
        </div> 
    </div>
</div>
<!-- Program End -->



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
                <p>Chưa có giáo viên nào.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Team End-->

<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Đánh giá</h4>
            <h1 class="mb-5 display-3">Phụ huynh nói gì về chúng tôi</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
            <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                <div class="p-4 position-relative">
                    <i class="fa fa-quote-right fa-2x text-primary position-absolute" style="top: 15px; right: 15px;"></i>
                    <div class="d-flex align-items-center">
                        <div class="border border-primary bg-white rounded-circle">
                            <img src="{{ asset('assets/img/testimonial-2.jpg') }}" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                        </div>
                        <div class="ms-4">
                            <h4 class="text-dark">Tên khách hàng</h4>
                            <p class="m-0 pb-3">Nghề nghiệp</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top border-primary mt-4 pt-3">
                        <p class="mb-0">Chúng tôi rất hài lòng với sự chăm sóc và giáo dục mà nhà trường mang lại cho con em chúng tôi.
                        </p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                <div class="p-4 position-relative">
                    <i class="fa fa-quote-right fa-2x text-primary position-absolute" style="top: 15px; right: 15px;"></i>
                    <div class="d-flex align-items-center">
                        <div class="border border-primary bg-white rounded-circle">
                            <img src="{{ asset('assets/img/testimonial-2.jpg') }}" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                        </div>
                        <div class="ms-4">
                            <h4 class="text-dark">Tên khách hàng</h4>
                            <p class="m-0 pb-3">Nghề nghiệp</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top border-primary mt-4 pt-3">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                <div class="p-4 position-relative">
                    <i class="fa fa-quote-right fa-2x text-primary position-absolute" style="top: 15px; right: 15px;"></i>
                    <div class="d-flex align-items-center">
                        <div class="border border-primary bg-white rounded-circle">
                            <img src="{{ asset('assets/img/testimonial-2.jpg') }}" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                        </div>
                        <div class="ms-4">
                            <h4 class="text-dark">Tên khách hàng</h4>
                            <p class="m-0 pb-3">Nghề nghiệp</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top border-primary mt-4 pt-3">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection
