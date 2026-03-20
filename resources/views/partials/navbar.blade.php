<!-- Navbar start -->
<div class="container-fluid bg-white shadow-sm sticky-top">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-xl py-3">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                @if (isset($settings['site_logo']))
                    <img src="{{ asset('storage/' . $settings['site_logo']) }}"
                        alt="{{ $settings['site_name'] ?? 'Logo' }}" class="me-3"
                        style="height: 55px; width: auto; max-width: 150px;">
                @else
                    <div class="logo-icon bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width: 55px; height: 55px;">
                        <i class="fas fa-sun text-white fa-2x"></i>
                    </div>
                @endif
                <div>
                    <h1 class="text-primary h4 mb-0 fw-bold" style="letter-spacing: -0.5px;">
                        {{ $settings['site_name'] ?? 'Hoa Hướng Dương' }}</h1>
                    <small class="text-muted d-none d-lg-block"
                        style="font-size: 12px;">{{ $settings['site_slogan'] ?? 'Trường Mầm Non' }}</small>
                </div>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Mở/đóng menu">
                <span class="fa fa-bars text-primary"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Main Menu -->
                <div class="navbar-nav mx-auto">
                    <a href="{{ request()->routeIs('home') ? '#home' : route('home') }}"
                        class="nav-item nav-link scroll-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Trang chủ
                    </a>
                    <a href="{{ request()->routeIs('home') ? '#about' : route('home') . '#about' }}"
                        class="nav-item nav-link scroll-link">
                        Giới thiệu
                    </a>
                    <a href="{{ request()->routeIs('home') ? '#blog' : route('home') . '#blog' }}"
                        class="nav-item nav-link scroll-link">
                        Tin tức
                    </a>
                    <a href="{{ request()->routeIs('home') ? '#services' : route('home') . '#services' }}"
                        class="nav-item nav-link scroll-link">
                        Dịch vụ
                    </a>
                    <a href="{{ request()->routeIs('home') ? '#team' : route('home') . '#team' }}"
                        class="nav-item nav-link scroll-link">
                        Đội ngũ
                    </a>

                    <a href="{{ request()->routeIs('home') ? '#contact' : route('home') . '#contact' }}"
                        class="nav-item nav-link scroll-link">
                        Liên hệ
                    </a>
                </div>

                <!-- Right Side Actions -->
                <div class="d-flex align-items-center gap-3">
                    <!-- Hotline -->
                    <div class="d-none d-lg-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                            <i class="fas fa-phone-alt text-primary"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block" style="font-size: 10px;">Hotline</small>
                            <a href="tel:{{ $settings['site_phone'] ?? '0967352874' }}"
                                class="text-dark fw-bold text-decoration-none"
                                style="font-size: 14px;">{{ $settings['site_phone'] ?? '0967352874' }}</a>
                        </div>
                    </div>

                    <!-- Admin Login -->
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('admin.dashboard') }}"
                                class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                <i class="fas fa-user-shield me-1"></i>
                                <span class="d-none d-lg-inline">Admin</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;" title="Đăng nhập">
                                <i class="fas fa-user"></i>
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
