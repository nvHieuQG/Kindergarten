<!-- Navbar start -->
<div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
    <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 0 20px 20px">
        <div class="d-flex justify-content-between align-items-center">
            <div class="top-info ps-2">
                <small class="me-3 text-white fw-bold"><i class="fas fa-map-marker-alt me-2 text-secondary"></i>{{ $settings['site_address'] ?? 'Hà Nội, Việt Nam' }}</small>
                <small class="me-3 text-white fw-bold"><i class="fas fa-envelope me-2 text-secondary"></i>{{ $settings['site_email'] ?? 'contact@hoahuongduong.edu.vn' }}</small>
            </div>
            <div class="top-link pe-2">
                <span class="text-white small me-3 fw-bold">Kết nối với chúng tôi:</span>
                @if(isset($settings['social_facebook'])) <a href="{{ $settings['social_facebook'] }}" class="btn btn-light btn-xs-square rounded-circle" style="width: 25px; height: 25px;"><i class="fab fa-facebook-f text-secondary small"></i></a> @endif
                @if(isset($settings['social_youtube'])) <a href="{{ $settings['social_youtube'] }}" class="btn btn-light btn-xs-square rounded-circle" style="width: 25px; height: 25px;"><i class="fab fa-youtube text-secondary small"></i></a> @endif
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light navbar-expand-xl py-3">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <i class="fas fa-sun text-primary fa-2x me-2"></i>
                <h1 class="text-primary h2 mb-0 fw-bold" style="font-family: 'Fredoka', sans-serif; letter-spacing: -1px;">Hoa Hướng Dương</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}" style="white-space: nowrap;">Trang chủ</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}" style="white-space: nowrap;">Thông tin</a>
                    <a href="{{ route('services') }}" class="nav-item nav-link {{ request()->routeIs('services') ? 'active' : '' }}" style="white-space: nowrap;">Dịch vụ</a>
                    <a href="{{ route('blog') }}" class="nav-item nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" style="white-space: nowrap;">Bài viết</a>
                    <a href="{{ route('teachers') }}" class="nav-item nav-link {{ request()->routeIs('teachers') ? 'active' : '' }}" style="white-space: nowrap;">Giáo viên</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Khác</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{ route('testimonials') }}" class="dropdown-item {{ request()->routeIs('testimonials') ? 'active' : '' }}">Phản hồi</a>
                            <a href="{{ route('enrollment') }}" class="dropdown-item {{ request()->routeIs('enrollment') ? 'active' : '' }}">Tuyển sinh</a>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" style="white-space: nowrap;">Liên hệ</a>
                </div>
                <div class="d-flex align-items-center me-4 d-none d-xl-flex">
                    <div id="phone-tada" class="d-flex align-items-center justify-content-center me-3">
                        <a href="tel:{{ $settings['site_phone'] ?? '' }}" class="position-relative wow tada" data-wow-delay=".9s" >
                            <i class="fa fa-phone-alt text-primary fa-lg"></i>
                        </a>
                    </div>
                    <div class="d-flex flex-column pe-3 border-end border-primary">
                        <span class="text-primary small fw-bold">Hotline</span>
                        <a href="tel:{{ $settings['site_phone'] ?? '' }}"><span class="text-secondary small fw-bold">{{ $settings['site_phone'] ?? '0123 456 789' }}</span></a>
                    </div>
                </div>
                <button class="btn-search btn btn-primary btn-sm-square rounded-circle" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-white"></i></button>
                
                <div class="ms-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary rounded-pill px-3 py-2 btn-sm">Admin</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-3 py-2 btn-sm">Đăng nhập</a>
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm theo từ khóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <form action="{{ route('blog') }}" method="GET" class="w-75 mx-auto">
                    <div class="input-group d-flex">
                        <input type="search" name="search" class="form-control p-3" placeholder="Nhập từ khóa tìm kiếm..." aria-describedby="search-icon-1" value="{{ request('search') }}">
                        <button type="submit" id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
