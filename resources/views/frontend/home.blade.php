@extends('layouts.babycare')

@section('title', 'Trang chủ - Hoa Hướng Dương')

@section('content')
    <!-- Hero Start -->
    <div id="home" class="container-fluid py-5 hero-header"
        style="position: relative; {{ isset($settings['hero_image']) ? 'background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.1)), url(' . (Str::startsWith($settings['hero_image'], 'assets/') ? asset($settings['hero_image']) : asset('storage/' . $settings['hero_image'])) . '); background-position: center center; background-repeat: no-repeat; background-size: cover;' : '' }}">
        <div class="container py-4 mt-4">
            <div class="row g-5 align-items-center">
                <!-- Left: CTA Content -->
                <div class="col-lg-7 col-md-12 text-center text-lg-start">
                    <span class="title-badge mb-3">Hệ thống giáo dục chuẩn quốc tế</span>
                    <h1 class="mb-4 display-1 text-white fw-extrabold" style="line-height: 1.1; letter-spacing: -2px;">
                        {!! nl2br(e($settings['hero_title'] ?? 'Nơi Ươm Mầm Thiên Tài Nhỏ')) !!}
                    </h1>
                    <p class="text-white fs-5 mb-5 opacity-90 fw-light" style="max-width: 600px;">
                        {{ $settings['hero_subtitle'] ?? 'Môi trường an toàn, giáo viên tận tâm, chương trình giáo dục hiện đại.' }}
                    </p>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap gap-3">
                        <a href="#about" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow-lg">Khám phá ngay</a>
                        <a href="tel:{{ $settings['site_phone'] ?? '' }}"
                            class="btn btn-light text-primary px-5 py-3 rounded-pill fw-bold shadow-sm">
                            <i class="fas fa-phone-alt me-2"></i>Tư vấn miễn phí
                        </a>
                    </div>
                </div>

                <!-- Right: Quick Enrollment Form (Glassmorphism) -->
                <div class="col-lg-5 col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 border-start border-success border-4 rounded-3 mb-4"
                            role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle fs-4 me-3 text-success"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">Thành công!</h6>
                                    <small>{{ session('success') }}</small>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="bg-white rounded-5 p-4 p-md-5 shadow-lg border-0 position-relative overflow-hidden"
                        style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                        <div class="position-absolute top-0 start-0 w-100 h-2 bg-primary"></div>
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-dark mb-2">
                                {{ $settings['hero_form_title'] ?? 'Đăng ký đăng ký tư vấn' }}</h3>
                            <p class="text-muted small">Cùng đăng ký hành trình học tập đầu đời cho bé</p>
                        </div>

                        <form action="{{ route('enrollment.store') }}" method="POST">
                            @csrf
                            {{-- Honeypot field - ẩn với người dùng, bot sẽ điền vào --}}
                            <div style="position: absolute; left: -9999px;" aria-hidden="true">
                                <input type="text" name="company" tabindex="-1" autocomplete="off">
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="parent_name"
                                            class="form-control rounded-4 @error('parent_name') is-invalid @enderror"
                                            id="floatingParentName" placeholder="Họ tên Phụ huynh *"
                                            value="{{ old('parent_name') }}" required>
                                        <label for="floatingParentName" class="text-muted ps-4">Họ tên Phụ huynh</label>
                                        @error('parent_name')
                                            <div class="invalid-feedback"><i
                                                    class="fas fa-exclamation-circle me-1 small"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" name="parent_phone"
                                            class="form-control rounded-4 @error('parent_phone') is-invalid @enderror"
                                            id="floatingPhone" placeholder="Số điện thoại *"
                                            value="{{ old('parent_phone') }}" required>
                                        <label for="floatingPhone" class="text-muted ps-4">Số điện thoại</label>
                                        @error('parent_phone')
                                            <div class="invalid-feedback"><i
                                                    class="fas fa-exclamation-circle me-1 small"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mt-1">
                                <div class="col-md-7">
                                    <div class="form-floating">
                                        <input type="text" name="child_name"
                                            class="form-control rounded-4 @error('child_name') is-invalid @enderror"
                                            id="floatingChildName" placeholder="Họ tên của bé *"
                                            value="{{ old('child_name') }}" required>
                                        <label for="floatingChildName" class="text-muted ps-4">Họ tên của bé</label>
                                        @error('child_name')
                                            <div class="invalid-feedback"><i
                                                    class="fas fa-exclamation-circle me-1 small"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="number" name="child_dob_year"
                                            class="form-control rounded-4 @error('child_dob_year') is-invalid @enderror"
                                            id="floatingDobYear" placeholder="Năm sinh bé *"
                                            value="{{ old('child_dob_year') }}" required min="2018"
                                            max="{{ date('Y') }}">
                                        <label for="floatingDobYear" class="text-muted ps-4">Năm sinh</label>
                                        @error('child_dob_year')
                                            <div class="invalid-feedback"><i
                                                    class="fas fa-exclamation-circle me-1 small"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit"
                                    class="btn btn-primary w-100 py-3 rounded-4 fw-bold shadow-lg transform-hover text-uppercase"
                                    style="letter-spacing: 1px;">
                                    <i class="fas fa-paper-plane me-2"></i>Gửi thông tin ngay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Stats Counter Start -->
    <div class="container-fluid py-4"
        style="background: linear-gradient(135deg, #FFB300 0%, #FFC107 100%); margin-top: -40px; position: relative; z-index: 10;">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center text-white">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-award fa-3x text-white"></i>
                        </div>
                        <h2 class="display-4 fw-bold mb-2 counter" data-target="{{ $settings['stats_exp'] ?? 10 }}">0
                        </h2>
                        <p class="fs-5 mb-0 fw-semibold">Năm kinh nghiệm</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center text-white">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-chalkboard-teacher fa-3x text-white"></i>
                        </div>
                        <h2 class="display-4 fw-bold mb-2 counter" data-target="{{ $settings['stats_teachers'] ?? 50 }}">
                            0</h2>
                        <p class="fs-5 mb-0 fw-semibold">Giáo viên chuyên nghiệp</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center text-white">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-users fa-3x text-white"></i>
                        </div>
                        <h2 class="display-4 fw-bold mb-2 counter"
                            data-target="{{ $settings['stats_students'] ?? 500 }}">0</h2>
                        <p class="fs-5 mb-0 fw-semibold">Học sinh đang học</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center text-white">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-smile fa-3x text-white"></i>
                        </div>
                        <h2 class="display-4 fw-bold mb-2"><span class="counter"
                                data-target="{{ $settings['stats_satisfaction'] ?? 100 }}">0</span>%</h2>
                        <p class="fs-5 mb-0 fw-semibold">Phụ huynh hài lòng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Stats Counter End -->

    <!-- About Start -->
    <div id="about" class="container-fluid py-5 about bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="video border">
                        <button type="button" class="btn btn-play" data-bs-toggle="modal"
                            data-src="{{ $settings['about_video'] ?? 'https://www.youtube.com/watch?v=Rv3SY9iytmI' }}"
                            data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h4
                        class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                        Về chúng tôi</h4>
                    <h1 class="text-dark mb-4 display-5">
                        {{ $settings['about_title'] ?? 'Trường Mầm Non Hoa Hướng Dương' }}</h1>
                    <p class="text-dark mb-4">{{ $settings['about_content'] ?? 'Nơi ươm mầm tương lai cho các bé' }}</p>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            @for ($i = 1; $i <= 3; $i++)
                                @if (isset($settings['about_feature_' . $i]) && $settings['about_feature_' . $i])
                                    <h6 class="mb-3"><i
                                            class="fas fa-check-circle me-2 text-primary"></i>{{ $settings['about_feature_' . $i] }}
                                    </h6>
                                @endif
                            @endfor
                        </div>
                        <div class="col-lg-6">
                            @for ($i = 4; $i <= 6; $i++)
                                @if (isset($settings['about_feature_' . $i]) && $settings['about_feature_' . $i])
                                    <h6 class="mb-3"><i
                                            class="fas fa-check-circle me-2 text-primary"></i>{{ $settings['about_feature_' . $i] }}
                                    </h6>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <a href="#contact" class="btn btn-primary px-5 py-3 btn-border-radius scroll-link">Liên hệ ngay</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Video giới thiệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Blog Start -->
    <div id="blog" class="container-fluid py-5">
        <div class="container py-4">
            <div class="mx-auto text-center mb-5" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    Tin tức & Sự kiện</h4>
                <h1 class="mb-3 display-5 fw-bold text-secondary">Bài Viết Mới Nhất</h1>
                <p class="text-muted">Cập nhật những hoạt động và tin tức nổi bật</p>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse($recentPosts as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card h-100">
                            <div class="blog-img">
                                <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('assets/img/blog-1.jpg') }}"
                                    alt="{{ $post->title }}">
                                <div class="category-badge">{{ $post->category->name ?? 'Tin tức' }}</div>
                            </div>
                            <div class="blog-content">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="blog-title">{{ $post->title }}</a>
                                <p class="blog-excerpt">{{ Str::limit($post->excerpt, 100) }}</p>

                                <div class="author-info">
                                    <img src="{{ asset('assets/img/program-teacher.jpg') }}" class="author-img"
                                        alt="Admin">
                                    <div>
                                        <h6 class="author-name">{{ $post->user->name ?? 'Admin' }}</h6>
                                        <small class="text-muted">{{ $post->created_at->format('d/m/Y') }}</small>
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
                        <p class="text-muted">Chưa có bài viết nào.</p>
                    </div>
                @endforelse
            </div>
            @if ($recentPosts->count() > 0)
                <div class="text-center mt-5">
                    <a href="{{ route('blog') }}" class="btn btn-primary px-5 py-3 text-white btn-border-radius">Xem tất
                        cả bài viết</a>
                </div>
            @endif
        </div>
    </div>
    <!-- Blog End -->

    <div id="services" class="container-fluid service py-5">
        <div class="container py-4">
            <div class="section-title-wrapper text-center">
                <span class="title-badge mb-3">Dịch vụ ưu việt</span>
                <h2 class="display-5 text-secondary">Giáo dục toàn diện cho bé</h2>
                <p class="text-muted mx-auto" style="max-width: 650px;">Chúng tôi cung cấp môi trường tốt nhất để bé phát
                    triển thể chất và trí tuệ.</p>
            </div>
            <div class="row g-4">
                @forelse($services as $service)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="text-center border-primary border bg-white service-item h-100">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-inner">
                                    <div class="p-4">
                                        @if ($service->image)
                                            <img src="{{ asset('storage/' . $service->image) }}"
                                                alt="{{ $service->title }}" class="img-fluid"
                                                style="max-height: 100px;">
                                        @elseif($service->icon)
                                            <i class="{{ $service->icon }} fa-4x text-primary"></i>
                                        @else
                                            <i class="fas fa-star fa-4x text-primary"></i>
                                        @endif
                                    </div>
                                    <a href="#" class="h5 d-block mb-3">{{ $service->title }}</a>
                                    <p class="mb-0">{{ Str::limit($service->description, 80) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Chưa có dịch vụ nào.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Service End -->





    <!-- Team Start-->
    <div id="team" class="container-fluid team py-5">
        <div class="container py-4">
            <div class="mx-auto text-center mb-5" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    Đội ngũ của chúng tôi</h4>
                <h1 class="mb-3 display-5">Gặp gỡ giáo viên chuyên nghiệp</h1>
                <p class="text-muted">Đội ngũ giáo viên tận tâm, yêu thương trẻ</p>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse($teachers->take(4) as $teacher)
                    <div class="col-md-6 col-lg-3">
                        <div class="team-item border border-primary img-border-radius overflow-hidden h-100">
                            <img src="{{ $teacher->photo ? asset('storage/' . $teacher->photo) : asset('assets/img/team-1.jpg') }}"
                                class="img-fluid w-100" alt="{{ $teacher->name }}"
                                style="height: 300px; object-fit: cover;">
                            <div class="team-icon d-flex align-items-center justify-content-center">
                                <a class="share btn btn-primary btn-md-square text-white rounded-circle me-3"
                                    href=""><i class="fas fa-share-alt"></i></a>
                                @if ($teacher->facebook)
                                    <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3"
                                        href="{{ $teacher->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if ($teacher->twitter)
                                    <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3"
                                        href="{{ $teacher->twitter }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if ($teacher->instagram)
                                    <a class="share-link btn btn-primary btn-md-square text-white rounded-circle"
                                        href="{{ $teacher->instagram }}"><i class="fab fa-instagram"></i></a>
                                @endif
                            </div>
                            <div class="team-content text-center py-3">
                                <h5 class="text-primary mb-0">{{ $teacher->name }}</h5>
                                <p class="text-muted small mb-0">{{ $teacher->position }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Chưa có giáo viên nào.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Team End-->







    <!-- FAQ & Contact Start -->
    <div id="contact" class="container-fluid py-3 bg-light">
        <div class="container py-3">
            <div class="row g-5">
                <!-- Left: FAQ & Quick Info -->
                <div class="col-lg-6">


                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-3 bg-white rounded-4 shadow-sm h-100">
                                <div class="btn-square bg-primary bg-opacity-10 text-primary rounded-circle me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div>
                                    <p class="mb-0 small text-muted">Số liên hệ</p>
                                    <h6 class="mb-0 fw-bold">{{ $settings['site_phone'] ?? '0123 456 789' }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-3 bg-white rounded-4 shadow-sm h-100">
                                <div class="btn-square bg-primary bg-opacity-10 text-primary rounded-circle me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <p class="mb-0 small text-muted">Địa chỉ</p>
                                    <h6 class="mb-0 fw-bold small">
                                        {{ Str::limit($settings['site_address'] ?? 'Hà Nội, Việt Nam', 30) }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5">
                        <h4 class="mb-4 fw-bold text-dark">Các Cơ Sở Trường Mầm Non</h4>
                        <div class="d-flex flex-column gap-3">
                            @foreach ($branches as $branch)
                                <div class="p-3 bg-white rounded-4 shadow-sm border-start border-primary border-4">
                                    <h6 class="text-primary fw-bold mb-2"><i
                                            class="fa fa-map-marker-alt me-2"></i>{{ $branch->name }}</h6>
                                    <p class="text-muted mb-1 small"><i
                                            class="fa fa-location-dot text-primary me-2"></i>{{ $branch->address }}</p>
                                    @if ($branch->phone)
                                        <p class="text-muted mb-0 small"><i
                                                class="fa fa-phone-alt text-primary me-2"></i><a
                                                href="tel:{{ $branch->phone }}"
                                                class="text-decoration-none text-muted">{{ $branch->phone }}</a></p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="col-lg-6">
                    <div class="bg-white rounded-4 shadow-sm p-4 h-100 border-top border-primary border-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 border-start border-success border-4 rounded-3 mb-4"
                                role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle fs-4 me-3 text-success"></i>
                                    <div>
                                        <h6 class="fw-bold mb-0">Đã gửi thành công!</h6>
                                        <small>Cảm ơn bạn đã liên hệ. Chúng tôi sẽ trả lời sớm nhất.</small>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="mb-4 text-center">
                            <h4 class="fw-bold text-secondary">Gửi tin nhắn tư vấn</h4>
                            <p class="text-muted small">Chúng tôi sẽ phản hồi trong vòng 24 giờ</p>
                        </div>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            {{-- Honeypot field - ẩn với người dùng, bot sẽ điền vào --}}
                            <div style="position: absolute; left: -9999px;" aria-hidden="true">
                                <input type="text" name="website" tabindex="-1" autocomplete="off">
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="small fw-bold text-dark mb-1">Họ tên *</label>
                                    <input type="text" name="name" class="form-control px-3 py-2 rounded-3"
                                        placeholder="Nhập tên" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="small fw-bold text-dark mb-1">SĐT *</label>
                                    <input type="tel" name="phone" class="form-control px-3 py-2 rounded-3"
                                        placeholder="Nhập SĐT" required>
                                </div>
                                <div class="col-12">
                                    <label class="small fw-bold text-dark mb-1">Nội dung thắc mắc *</label>
                                    <textarea name="message" class="form-control px-3 py-2 rounded-3" rows="4"
                                        placeholder="Ví dụ: Bé nhà tôi 2 tuổi, tôi muốn hỏi về học phí..." required></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button class="btn btn-primary w-100 py-3 fw-bold shadow-sm" type="submit">
                                        <i class="fa fa-paper-plane me-2"></i>Xác nhận gửi thông tin
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ & Contact End -->

    @push('scripts')
        <script>
            // Smooth scroll for anchor links
            document.addEventListener('DOMContentLoaded', function() {
                const scrollLinks = document.querySelectorAll('.scroll-link');

                scrollLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        const href = this.getAttribute('href');

                        if (href && href.startsWith('#')) {
                            e.preventDefault();

                            const targetId = href.substring(1);
                            const targetElement = document.getElementById(targetId);

                            if (targetElement) {
                                const navbarHeight = document.querySelector('.navbar').offsetHeight ||
                                    100;
                                const targetPosition = targetElement.offsetTop - navbarHeight;

                                window.scrollTo({
                                    top: targetPosition,
                                    behavior: 'smooth'
                                });

                                const navbarCollapse = document.getElementById('navbarCollapse');
                                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                                    navbarCollapse.classList.remove('show');
                                }
                            }
                        }
                    });
                });

                if (window.location.hash) {
                    setTimeout(() => {
                        const targetElement = document.querySelector(window.location.hash);
                        if (targetElement) {
                            const navbarHeight = document.querySelector('.navbar').offsetHeight || 100;
                            const targetPosition = targetElement.offsetTop - navbarHeight;
                            window.scrollTo({
                                top: targetPosition,
                                behavior: 'smooth'
                            });
                        }
                    }, 100);
                }
            });
        </script>
    @endpush
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.querySelector('form[action="{{ route('enrollment.store') }}"]');
                if (!form) return;

                const inputs = {
                    parentName: document.getElementById('floatingParentName'),
                    phone: document.getElementById('floatingPhone'),
                    childName: document.getElementById('floatingChildName'),
                    dobYear: document.getElementById('floatingDobYear')
                };

                const currentYear = new Date().getFullYear();

                // Validation Rules
                const validators = {
                    parentName: (value) => value.trim().length > 0 ? null : 'Vui lòng nhập họ tên phụ huynh.',
                    childName: (value) => value.trim().length > 0 ? null : 'Vui lòng nhập họ tên bé.',
                    phone: (value) => {
                        if (!value) return 'Vui lòng nhập số điện thoại.';
                        const regex = /^(0)[0-9]{9}$/;
                        return regex.test(value) ? null : 'Số điện thoại phải có 10 số và bắt đầu bằng số 0.';
                    },
                    dobYear: (value) => {
                        if (!value) return 'Vui lòng nhập năm sinh.';
                        const year = parseInt(value);
                        if (isNaN(year) || year < 2018 || year > currentYear) {
                            return `Năm sinh phải từ 2018 đến ${currentYear}.`;
                        }
                        return null;
                    }
                };

                // UI Helpers
                const showError = (input, message) => {
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');

                    // Find or create invalid-feedback div
                    let feedback = input.parentNode.querySelector('.invalid-feedback');
                    if (!feedback) {
                        feedback = document.createElement('div');
                        feedback.className = 'invalid-feedback';
                        input.parentNode.appendChild(feedback);
                    }
                    feedback.innerHTML = `<i class="fas fa-exclamation-circle me-1 small"></i>${message}`;
                };

                const showSuccess = (input) => {
                    input.classList.remove('is-invalid');
                    // We don't necessarily need a green border for every valid field while typing
                    // but we can add it if you want. Let's keep it clean.
                    input.classList.remove('is-valid');

                    const feedback = input.parentNode.querySelector('.invalid-feedback');
                    if (feedback) {
                        feedback.textContent = '';
                    }
                };

                const validateInput = (key) => {
                    const input = inputs[key];
                    if (!input) return true; // Skip if input not found

                    const error = validators[key](input.value);
                    if (error) {
                        showError(input, error);
                        return false;
                    } else {
                        showSuccess(input);
                        return true;
                    }
                };

                // Attach Events
                Object.keys(inputs).forEach(key => {
                    const input = inputs[key];
                    if (input) {
                        // Validate on blur
                        input.addEventListener('blur', () => validateInput(key));
                        // Clear error on input
                        input.addEventListener('input', () => {
                            if (input.classList.contains('is-invalid')) {
                                validateInput(key);
                            }
                        });
                    }
                });

                // Form Submit
                form.addEventListener('submit', function(e) {
                    let isValid = true;
                    Object.keys(inputs).forEach(key => {
                        if (!validateInput(key)) {
                            isValid = false;
                        }
                    });

                    if (!isValid) {
                        e.preventDefault();
                    }
                });
            });
        </script>
    @endpush
@endsection
