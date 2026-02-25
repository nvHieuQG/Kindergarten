<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Kindergarten Management</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('sunflower.svg') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --font-main: 'Lexend', sans-serif;
            --sidebar-width: 280px;
            --header-height: 70px;
            --primary: #F59E0B;
            /* Modern Amber Primary */
            --primary-light: #FEF3C7;
            --primary-dark: #D97706;
            --secondary: #1E293B;
            /* Matched with Frontend Slate 800 */
            --sidebar-bg: #0F172A;
            --sidebar-hover: #1E293B;
            /* Slate 800 */
            --text-main: #334155;
            /* Slate 700 */
            --text-muted: #64748B;
            /* Slate 500 */
            --bg-light: #F8FAFC;
            /* Slate 50 */
            --card-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --card-shadow-hover: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --radius: 12px;
        }

        body {
            font-family: var(--font-main);
            background-color: var(--bg-light);
            color: var(--text-main);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

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
            font-family: var(--font-main);
            color: var(--secondary);
            font-weight: 700;
        }

        button,
        input,
        optgroup,
        select,
        textarea,
        .btn {
            font-family: var(--font-main);
        }


        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            z-index: 1060;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.15);
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(4px);
            z-index: 1055;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        .sidebar .logo {
            height: var(--header-height);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-nav {
            padding: 1rem 0.75rem;
            flex: 1;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.1) transparent;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .sidebar-nav .nav-heading {
            padding: 1.25rem 1rem 0.5rem;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            font-weight: 700;
        }

        .sidebar-nav .nav-link {
            color: #94A3B8;
            padding: 0.65rem 1rem;
            margin-bottom: 0.2rem;
            display: flex;
            align-items: center;
            border-radius: 10px;
            transition: all 0.2s;
            font-weight: 500;
            font-size: 0.875rem;
            border: 1px solid transparent;
            text-decoration: none;
        }

        .sidebar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        .sidebar-nav .nav-link.active {
            background: var(--primary);
            color: #0F172A;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
        }

        .sidebar-nav .nav-link i {
            width: 20px;
            margin-right: 0.75rem;
            font-size: 1.1rem;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            width: calc(100% - var(--sidebar-width));
        }

        .header {
            height: var(--header-height);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #E2E8F0;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .content-wrapper {
            padding: 2rem;
            flex: 1;
            width: 100%;
            margin: 0 auto;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: all 0.3s;
            border: 1px solid #F1F5F9;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--card-shadow-hover);
        }

        .stat-icon-wrapper {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        /* Custom Table Styling */
        .table thead th {
            background-color: #F8FAFC;
            border-bottom: 1px solid #E2E8F0;
            text-transform: uppercase;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: var(--text-muted);
            padding: 1rem 1.25rem;
        }

        .table tbody td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
            color: var(--text-main);
            border-bottom: 1px solid #F1F5F9;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #0F172A;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
        }

        /* Status Badges */
        .badge {
            padding: 0.4em 0.75em;
            font-weight: 600;
            border-radius: 6px;
        }

        /* Sidebar Toggle Mobile */
        .sidebar-toggle {
            width: 38px;
            height: 38px;
            display: none;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            border: 1px solid #E2E8F0;
            background: #fff;
            color: var(--text-main);
            margin-right: 1rem;
            transition: all 0.2s;
            cursor: pointer;
        }

        .sidebar-toggle:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Responsive UI */
        @media (max-width: 1024.98px) {
            .sidebar {
                transform: translateX(-100%);
                width: 260px;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar-toggle {
                display: flex;
            }

            .content-wrapper {
                padding: 1.5rem;
            }
        }

        @media (max-width: 575.98px) {
            .header h5 {
                font-size: 0.95rem;
                max-width: 140px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .content-wrapper {
                padding: 1rem;
            }

            .stat-card {
                padding: 1.25rem;
            }

            /* Table Responsive Patterns */
            .table-responsive-stack thead,
            .table-stack thead {
                display: none;
            }

            .table-responsive-stack tr,
            .table-stack tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #E2E8F0;
                border-radius: var(--radius);
                background: white;
                padding: 0.5rem;
                box-shadow: 0 1px 2px rgba(30, 41, 59, 0.05);
            }

            .table-responsive-stack td,
            .table-stack td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.625rem 0.75rem;
                text-align: right;
                border: none;
                border-bottom: 1px solid #F1F5F9;
                min-height: 2.75rem;
            }

            .table-responsive-stack td::before,
            .table-stack td::before {
                content: attr(data-label);
                font-weight: 700;
                font-size: 0.65rem;
                text-transform: uppercase;
                color: var(--text-muted);
                text-align: left;
                flex: 1;
                padding-right: 1rem;
            }

            .table-responsive-stack td:last-child,
            .table-stack td:last-child {
                border-bottom: none;
            }
        }



        /* Animation */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-up {
            animation: slideInUp 0.4s ease-out forwards;
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <i class="fas fa-child me-2 text-warning"></i> Quản trị Mầm non
        </div>

        <nav class="sidebar-nav">
            <div class="nav-heading">Tổng quan</div>
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Bảng điều khiển
            </a>

            <div class="nav-heading">Nội dung học tập</div>
            <a href="{{ route('admin.posts.index') }}"
                class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <i class="fas fa-clone"></i> Bài viết
            </a>

            <a href="{{ route('admin.categories.index') }}"
                class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> Danh mục tin
            </a>

            <div class="nav-heading">Nhà trường</div>
            <a href="{{ route('admin.teachers.index') }}"
                class="nav-link {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}">
                <i class="fas fa-user-tie"></i> Đội ngũ giáo viên
            </a>

            <a href="{{ route('admin.services.index') }}"
                class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fas fa-star"></i> Dịch vụ giáo dục
            </a>

            <a href="{{ route('admin.branches.index') }}"
                class="nav-link {{ request()->routeIs('admin.branches.*') ? 'active' : '' }}">
                <i class="fas fa-map-marked-alt"></i> Cơ sở trường
            </a>

            <div class="nav-heading">Vận hành</div>
            <a href="{{ route('admin.enrollments.index') }}"
                class="nav-link {{ request()->routeIs('admin.enrollments.*') ? 'active' : '' }}">
                <i class="fas fa-id-card"></i> Yêu cầu tư vấn
            </a>

            <a href="{{ route('admin.contacts.index') }}"
                class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="fas fa-comment-alt"></i> Tin nhắn liên hệ
            </a>

            <div class="nav-heading">Hệ thống</div>
            <a href="{{ route('admin.users.index') }}"
                class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-user-shield"></i> Quản trị viên
            </a>

            <a href="{{ route('admin.settings.index') }}"
                class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fas fa-sliders-h"></i> Cấu hình chung
            </a>

            <hr class="mx-3 my-4" style="border-color: rgba(255,255,255,0.05);">

            <a href="{{ route('home') }}" class="nav-link" target="_blank">
                <i class="fas fa-external-link-alt"></i> Xem trang chủ
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                    <i class="fas fa-power-off text-danger"></i> Đăng xuất
                </button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="d-flex align-items-center">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0 fw-semibold text-secondary">@yield('page-title', 'Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center">
                <span class="me-3 d-none d-md-block fw-semibold text-secondary">Xin chào,
                    {{ auth()->user()->name }}</span>
                <div class="dropdown">
                    <button class="btn btn-light rounded-circle shadow-sm" type="button" data-bs-toggle="dropdown"
                        style="width: 40px; height: 40px; padding: 0;">
                        <i class="fas fa-user text-secondary"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i
                                        class="fas fa-sign-out-alt me-2"></i> Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content-wrapper">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 border-start border-success border-4"
                    role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 border-start border-danger border-4"
                    role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggle = document.getElementById('sidebarToggle');
            const sidebarNav = document.querySelector('.sidebar-nav');
            const activeLink = document.querySelector('.sidebar-nav .nav-link.active');

            function toggleSidebar() {
                if (sidebar) sidebar.classList.toggle('show');
                if (overlay) overlay.classList.toggle('show');
            }

            if (toggle) {
                toggle.onclick = function(e) {
                    e.stopPropagation();
                    toggleSidebar();
                };
            }

            if (overlay) {
                overlay.onclick = function() {
                    toggleSidebar();
                };
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth < 1025) {
                    if (sidebar && sidebar.classList.contains('show')) {
                        if (!sidebar.contains(e.target) && (!toggle || !toggle.contains(e.target))) {
                            sidebar.classList.remove('show');
                            overlay.classList.remove('show');
                        }
                    }
                }
            });

            // Persistent Sidebar Scroll Position
            const savedScrollPos = localStorage.getItem('sidebar-scroll');
            if (savedScrollPos !== null && sidebarNav) {
                sidebarNav.scrollTop = savedScrollPos;
            } else if (activeLink && sidebarNav) {
                activeLink.scrollIntoView({
                    block: 'center'
                });
            }

            // Save scroll position and auto-close on link click
            const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (sidebarNav) {
                        localStorage.setItem('sidebar-scroll', sidebarNav.scrollTop);
                    }

                    if (window.innerWidth < 1025 && sidebar) {
                        sidebar.classList.remove('show');
                        if (overlay) overlay.classList.remove('show');
                    }
                });
            });

            // Cleanup on resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1025) {
                    if (sidebar) sidebar.classList.remove('show');
                    if (overlay) overlay.classList.remove('show');
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
