<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Hoa Hướng Dương - Trường Mầm Non Uy Tín')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('sunflower.svg') }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('meta_keywords', 'trường mầm non, mẫu giáo, giáo dục mầm non, hoa hướng dương')" name="keywords">
    <meta content="@yield('meta_description', 'Trường Mầm Non Hoa Hướng Dương - Nơi ươm mầm tương lai, phát triển toàn diện cho trẻ')" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Custom Styles for UX Improvements -->
    <style>
        :root {
            --font-primary: 'Lexend', sans-serif;
            --font-heading: 'Lexend', sans-serif;
            --bs-primary: #FF8A00;
            /* Richer Orange */
            --bs-primary-rgb: 255, 138, 0;
            --bs-secondary: #1E293B;
            /* Slate 800 */
        }

        body {
            font-family: var(--font-primary);
            color: #475569;
            background-color: #F8FAFC;
        }

        /* Font Awesome Fix */
        .fas,
        .fa-solid,
        .fa {
            font-family: "Font Awesome 5 Free" !important;
            font-weight: 900 !important;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
        }

        /* Opacity & Glass Fix */
        .bg-white.bg-opacity-20 {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }

        .bg-primary.bg-opacity-10 {
            background-color: rgba(255, 138, 0, 0.1) !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .display-1,
        .display-5 {
            font-family: var(--font-heading) !important;
            font-weight: 700 !important;
            color: var(--bs-secondary);
        }

        /* Glassmorphism Card Style */
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        .section-title-wrapper {
            margin-bottom: 3rem;
        }

        .title-badge {
            background: rgba(var(--bs-primary-rgb), 0.1);
            color: var(--bs-primary);
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
        }

        /* Headings */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: var(--font-heading);
            font-weight: 600;
            line-height: 1.3;
            color: #1a202c;
            margin-bottom: 1rem;
        }

        h1,
        .h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        h2,
        .h2 {
            font-size: 2rem;
            font-weight: 700;
        }

        h3,
        .h3 {
            font-size: 1.75rem;
            font-weight: 600;
        }

        h4,
        .h4 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        h5,
        .h5 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        h6,
        .h6 {
            font-size: 1.1rem;
            font-weight: 600;
        }

        /* Display Headings */
        .display-1,
        .display-2,
        .display-3,
        .display-4,
        .display-5,
        .display-6 {
            font-family: var(--font-heading);
            font-weight: 700;
            line-height: 1.2;
        }

        /* Paragraphs */
        p {
            font-family: var(--font-primary);
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            color: #4a5568;
            font-weight: 400;
        }

        /* Links */
        a {
            font-family: var(--font-primary);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        /* Navigation Menu */
        .navbar .navbar-nav .nav-link {
            font-family: var(--font-primary) !important;
            font-size: 15px !important;
            font-weight: 500 !important;
            letter-spacing: 0.2px !important;
            text-transform: none !important;
            position: relative;
            padding: 10px 15px !important;
            margin: 0 2px;
            color: #475569 !important;
            transition: all 0.3s ease;
        }

        .navbar .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            width: 0;
            height: 3px;
            background-color: var(--bs-primary);
            border-radius: 50px;
            transition: width 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar .navbar-nav .nav-link.active::after,
        .navbar .navbar-nav .nav-link:hover::after {
            width: 20px;
        }

        .navbar .navbar-nav .nav-link.active {
            color: var(--bs-primary) !important;
            font-weight: 700 !important;
            background-color: transparent !important;
        }

        /* Fixed navbar adjustment */
        .navbar-fixed-top {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .hero-header {
            background-repeat: no-repeat !important;
            background-size: cover !important;
            background-position: center center !important;
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
            backface-visibility: hidden;
            filter: contrast(1.1) brightness(1.05);
            /* Tăng độ tương phản để ảnh sắc nét hơn */
        }

        /* Remove uppercase from menu */
        .nav-link {
            text-transform: none !important;
        }

        .footer-item iframe {
            width: 100% !important;
            height: 100% !important;
            border: 0;
        }

        /* Buttons */
        .btn {
            font-family: var(--font-primary);
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        /* Small Text */
        small,
        .small {
            font-family: var(--font-primary);
            font-size: 0.875rem;
            font-weight: 400;
        }

        /* Lead Text */
        .lead {
            font-family: var(--font-primary);
            font-size: 1.25rem;
            font-weight: 400;
            line-height: 1.6;
        }

        /* Blockquote */
        blockquote {
            font-family: var(--font-primary);
            font-size: 1.1rem;
            font-style: italic;
            line-height: 1.6;
            font-weight: 400;
        }

        /* Form Inputs */
        input,
        textarea,
        select {
            font-family: var(--font-primary);
            font-size: 15px;
            font-weight: 400;
        }

        /* Better form input styling */
        .form-control {
            border: 2px solid #f1f5f9 !important;
            transition: all 0.3s ease;
            background-color: #f8fafc !important;
        }

        .form-control:focus {
            border-color: var(--bs-primary) !important;
            box-shadow: 0 0 0 4px rgba(255, 138, 0, 0.1) !important;
            background-color: #ffffff !important;
        }

        /* Enrollment Form Specifics */
        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label {
            transform: scale(0.85) translateY(-0.75rem) translateX(0.15rem);
            color: var(--bs-primary);
            opacity: 1;
        }

        /* Validation Styling */
        .is-invalid {
            border-color: #ef4444 !important;
            background-image: none !important;
            /* Remove default icon */
        }

        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: 0.3rem;
            font-size: 11.5px;
            color: #ef4444;
            font-weight: 500;
            padding-left: 0.4rem;
            animation: fadeInDown 0.3s ease-out;
            white-space: nowrap;
        }

        @media (max-width: 576px) {
            .invalid-feedback {
                white-space: normal;
                font-size: 11px;
            }
        }

        .is-invalid~.invalid-feedback {
            display: block;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .bg-light.form-control {
            background-color: #f8f9fa !important;
        }

        /* Card Titles */
        .card-title {
            font-family: var(--font-heading);
            font-weight: 600;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            font-family: var(--font-primary);
        }

        .dropdown-item {
            font-size: 14px;
            font-weight: 500;
        }

        /* Strong/Bold */
        strong,
        b,
        .fw-bold {
            font-weight: 600 !important;
        }

        /* Topbar */
        .topbar .top-info {
            font-family: var(--font-primary);
            font-weight: 500;
        }

        /* Responsive Typography Utilities */
        @media (max-width: 768px) {
            body {
                font-size: 15px;
            }

            .display-1 {
                font-size: 2.25rem !important;
                letter-spacing: -1px !important;
            }

            .display-4 {
                font-size: 2rem !important;
            }

            .display-5 {
                font-size: 1.75rem !important;
            }

            .section-padding-mobile {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important;
            }
        }

        @media (max-width: 576px) {
            .display-1 {
                font-size: 1.85rem !important;
                letter-spacing: -0.5px !important;
            }

            .navbar-brand h1 {
                font-size: 1rem !important;
            }

            .btn {
                padding: 10px 20px !important;
                font-size: 14px !important;
            }

            .container-fluid {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }

        /* Improved Card Responsiveness */
        .card-responsive {
            margin-bottom: 20px;
        }

        /* ========================================
           FASTER ANIMATIONS
           ======================================== */

        /* Override WOW.js animation duration - Faster */
        .wow,
        .animated {
            animation-duration: 0.6s !important;
        }

        /* Specific animations - Even faster */
        .fadeIn,
        .fadeInUp,
        .fadeInDown,
        .fadeInLeft,
        .fadeInRight {
            animation-duration: 0.5s !important;
        }

        /* ========================================
           STICKY NAVBAR
           ======================================== */

        /* Make navbar sticky */
        .navbar-light {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            background: white !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        /* Add padding to body to prevent content jump */
        body {
            padding-top: 90px;
        }

        /* Navbar scrolled state */
        .navbar-light.scrolled {
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.12);
        }

        /* Navbar Links */
        .navbar-nav .nav-link {
            font-size: 15px !important;
            font-weight: 500 !important;
            color: #4a5568 !important;
            padding: 8px 16px !important;
            margin: 0 2px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--bs-primary) !important;
            background: rgba(255, 179, 0, 0.1);
        }

        .navbar-nav .nav-link.active {
            color: var(--bs-primary) !important;
            background: rgba(255, 179, 0, 0.15);
            font-weight: 600 !important;
        }

        /* Dropdown */
        .dropdown-menu {
            border: none;
            padding: 8px;
        }

        .dropdown-item {
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .dropdown-item:hover {
            background: rgba(255, 179, 0, 0.1);
            color: var(--bs-primary);
        }

        /* Logo Animation - Rotate 360 on Hover */
        .logo-icon,
        .navbar-brand img {
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .navbar-brand:hover .logo-icon,
        .navbar-brand:hover img {
            transform: rotate(360deg);
        }

        /* Mobile navbar optimization */
        @media (max-width: 768px) {
            .logo-icon {
                width: 45px !important;
                height: 45px !important;
            }

            .logo-icon i {
                font-size: 1.5rem !important;
            }

            .navbar-brand h1 {
                font-size: 1.1rem !important;
            }

            .navbar-brand small {
                display: none !important;
            }
        }

        /* ========================================
           ANIMATIONS
           ======================================== */

        /* Pulse Glow Animation for CTA Button */
        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 10px rgba(254, 111, 97, 0.4);
                transform: scale(1);
            }

            50% {
                box-shadow: 0 0 20px rgba(254, 111, 97, 0.8);
                transform: scale(1.02);
            }
        }

        /* Hover Lift Effect */
        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2) !important;
        }

        /* ========================================
           STICKY CONTACT BUTTONS - Compact & Mobile Friendly
           ======================================== */

        .sticky-contact-buttons {
            position: fixed;
            right: 15px;
            bottom: 90px;
            z-index: 999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .contact-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }

        .contact-btn:hover {
            transform: scale(1.15);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25);
            color: white;
        }

        .contact-btn.phone {
            background: linear-gradient(135deg, #FE6F61 0%, #FF8A80 100%);
        }

        .contact-btn.zalo {
            background: linear-gradient(135deg, #0068FF 0%, #0084FF 100%);
        }

        .contact-btn.messenger {
            background: linear-gradient(135deg, #00B2FF 0%, #006AFF 100%);
        }

        /* Tooltip for contact buttons */
        .contact-btn .tooltip-text {
            position: absolute;
            right: 55px;
            background: rgba(0, 0, 0, 0.85);
            color: white;
            padding: 6px 10px;
            border-radius: 6px;
            white-space: nowrap;
            font-size: 12px;
            font-family: var(--font-primary);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        .contact-btn:hover .tooltip-text {
            opacity: 1;
        }

        /* Mobile responsive - Even smaller */
        @media (max-width: 768px) {
            .sticky-contact-buttons {
                right: 10px;
                bottom: 70px;
                gap: 8px;
            }

            .contact-btn {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .contact-btn .tooltip-text {
                display: none;
                /* Hide tooltips on mobile */
            }
        }

        /* Footer Premium Refinement */
        .footer {
            color: #475569;
        }

        .footer h4,
        .footer h5 {
            color: #1e293b !important;
            letter-spacing: 0.5px;
        }

        .footer .footer-item p {
            line-height: 1.8;
            color: #64748b;
        }

        .footer-galary-img {
            transition: all 0.3s ease;
            position: relative;
            background: #fff;
        }

        .footer-galary-img:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        /* Override the ugly dotted border from style.css */
        .footer .footer-galary-img img {
            border-style: none !important;
            border-width: 0 !important;
            border-radius: 12px;
            transition: all 0.5s ease;
        }

        .footer .footer-galary-img:hover img {
            transform: scale(1.1);
        }

        .transition-hover:hover {
            color: var(--bs-primary) !important;
            transform: translateX(5px);
            padding-left: 2px;
        }

        .fw-extrabold {
            font-weight: 800 !important;
        }

        .letter-spacing-1 {
            letter-spacing: 1px;
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Page Content -->
    @yield('content')

    <!-- Footer -->
    @include('partials.footer')

    <!-- Sticky Contact Buttons -->
    <div class="sticky-contact-buttons">
        <!-- Phone -->
        <a href="tel:{{ $settings['site_phone'] ?? '0123456789' }}" class="contact-btn phone" title="Gọi ngay">
            <i class="fas fa-phone-alt"></i>
            <span class="tooltip-text">Gọi ngay: {{ $settings['site_phone'] ?? '0123 456 789' }}</span>
        </a>

        <!-- Zalo -->
        <a href="https://zalo.me/{{ $settings['zalo_number'] ?? '0123456789' }}" target="_blank"
            class="contact-btn zalo" title="Chat Zalo">
            <span style="font-weight: 800; font-family: sans-serif; font-size: 22px;">Z</span>
            <span class="tooltip-text">Chat qua Zalo</span>
        </a>

        <!-- Messenger -->
        <a href="https://m.me/{{ $settings['facebook_page_id'] ?? '' }}" target="_blank" class="contact-btn messenger"
            title="Chat Messenger">
            <i class="fab fa-facebook-messenger"></i>
            <span class="tooltip-text">Chat qua Messenger</span>
        </a>
    </div>



    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/counter.js') }}"></script>

    <script>
        $(document).ready(function() {
            const navLinks = $('.navbar-nav .nav-link.scroll-link');
            const sections = navLinks.map(function() {
                const href = $(this).attr('href');
                if (href && href.includes('#')) {
                    const id = href.split('#')[1];
                    return document.getElementById(id);
                }
            }).get();

            function scrollSpy() {
                const scrollPos = $(window).scrollTop() + 120;
                let currentSection = null;

                sections.forEach(section => {
                    if (section && scrollPos >= $(section).offset().top) {
                        currentSection = section;
                    }
                });

                if (currentSection) {
                    navLinks.removeClass('active');
                    navLinks.filter(`[href*="#${currentSection.id}"]`).addClass('active');
                }
            }

            $(window).on('scroll', scrollSpy);
            scrollSpy();

            // Ultra-fast Smooth Scrolling (200ms)
            navLinks.on('click', function(event) {
                const href = $(this).attr('href');
                if (href.includes('#')) {
                    const targetId = href.split('#')[1];
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        event.preventDefault();
                        const targetOffset = $(targetElement).offset().top - 75;

                        $('html, body').stop().animate({
                            scrollTop: targetOffset
                        }, 200, 'linear');

                        $('.navbar-collapse').collapse('hide');
                    }
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
