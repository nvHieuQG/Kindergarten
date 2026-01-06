@extends('layouts.babycare')

@section('title', 'Home -  Hoa Hướng Dương Website')

@section('content')
<!-- Hero Start -->
<div class="container-fluid py-5 hero-header wow fadeIn" data-wow-delay="0.1s" style="{{ isset($settings['hero_image']) ? 'background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2)), url(' . asset('storage/' . $settings['hero_image']) . '); background-position: center center; background-repeat: no-repeat; background-size: cover;' : '' }}">
    <div class="container py-5 mt-5">
        <div class="row g-5">
            <div class="col-lg-8 col-md-12">
                <h4 class="text-primary text-uppercase mb-3 fw-bold" style="letter-spacing: 3px;">Hệ thống giáo dục mầm non chuyên nghiệp</h4>    
                <h1 class="mb-5 display-1 text-white fw-bold">Nơi Khởi Đầu <br><span class="text-primary">Tương Lai</span> Của Bé</h1>
                <div class="d-flex align-items-center">
                    <a href="{{ route('enrollment') }}" class="btn btn-primary px-4 py-3 px-md-5 me-4 btn-border-radius shadow">Đăng ký ngay</a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light px-4 py-3 px-md-5 btn-border-radius">Tìm hiểu về trường</a>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-shape-divider-bottom-1689964567">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid py-5 about bg-light">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="video border">
                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/watch?v=Rv3SY9iytmI" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Về chúng tôi</h4>
                <h1 class="text-dark mb-4 display-5">{{ $settings['about_title'] ?? 'Tiêu đề mặc định' }}</h1>
                <p class="text-dark mb-4">{{ $settings['about_content'] ?? 'Nội dung mặc định' }}</p>
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
            <h1 class="mb-5">"Dịch vụ giáo dục mầm non toàn diện, an toàn và sáng tạo cho sự phát triển toàn diện của trẻ."</h1>
        </div>
        <div class="row g-5">
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
                            <a href="#" class="h4">{{ $service->title }}</a>
                            <p class="my-3">{{ Str::limit($service->description, 100) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Chưa có dịch vụ nào.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Programs Start -->
<div class="container-fluid program  py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Tin tức & Sự kiện</h4>
            <h1 class="mb-5 display-3 fw-bold text-secondary">Bài Viết Nổi Bật</h1>
        </div>
        <div class="row g-5 justify-content-center">
            @forelse($recentPosts as $post)
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('assets/img/blog-1.jpg') }}" alt="{{ $post->title }}">
                        <div class="category-badge">{{ $post->category->name ?? 'Tin tức' }}</div>
                    </div>
                    <div class="blog-content">
                        <a href="{{ route('blog.show', $post->slug) }}" class="blog-title">{{ $post->title }}</a>
                        <p class="blog-excerpt">{{ $post->excerpt }}</p>
                        
                        <div class="author-info">
                            <img src="{{ asset('assets/img/program-teacher.jpg') }}" class="author-img" alt="Admin">
                            <div>
                                <h6 class="author-name">{{ $post->user->name ?? 'Cán bộ trường' }}</h6>
                                <small class="text-muted">Tác giả</small>
                            </div>
                        </div>
                    </div>
                    <div class="blog-meta">
                        <span><i class="fas fa-calendar-alt"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                        <span><i class="fas fa-eye"></i>{{ $post->views }} lượt xem</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Chưa có bài viết nào.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-5 wow fadeIn" data-wow-delay="0.3s">
            <a href="{{ route('blog') }}" class="btn btn-primary px-5 py-3 text-white btn-border-radius">Xem tất cả bài viết</a>
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
<!-- Branches Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Hệ thống của chúng tôi</h4>
            <h1 class="mb-5 display-5 fw-bold text-secondary">Các Cơ Sở Trường Mầm Non</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($branches as $branch)
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                <div class="h-100 p-4 bg-white rounded-4 shadow-sm border-top border-primary border-4">
                    <h5 class="text-primary fw-bold mb-3">{{ $branch->name }}</h5>
                    <p class="text-muted mb-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $branch->address }}</p>
                    @if($branch->phone)
                    <p class="text-muted mb-2"><i class="fa fa-phone-alt text-primary me-2"></i>{{ $branch->phone }}</p>
                    @endif
                    @if($branch->email)
                    <p class="text-muted mb-0"><i class="fa fa-envelope text-primary me-2"></i>{{ $branch->email }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Branches End -->

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
                            <h4 class="text-dark">Hoàng Văn Hiệp</h4>
                            <p class="m-0 pb-3">Công nhân</p>
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
                            <h4 class="text-dark">Nguyễn Thị Hạnh</h4>
                            <p class="m-0 pb-3">Nhân viên văn phòng</p>
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
                        <p class="mb-0">Nhà trường tạo ra một môi trường an toàn, thân thiện và giúp các con phát triển mỗi ngày.
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
                            <h4 class="text-dark">Nguyễn Văn Hiếu</h4>
                            <p class="m-0 pb-3">Tài xế</p>
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
                        <p class="mb-0">Các cô giáo luôn tận tâm và yêu thương trẻ, giúp chúng tôi hoàn toàn yên tâm khi gửi con.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection
