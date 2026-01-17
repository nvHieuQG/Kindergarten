<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Kindergarten Management</title>

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
            z-index: 1050;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.15);
        }

        .sidebar .logo {
            height: var(--header-height);
            display: flex;
            align-items: center;
            padding: 0 1.75rem;
            color: #fff;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar-nav {
            padding: 1.5rem 0.75rem;
            flex: 1;
            overflow-y: auto;
        }

        .sidebar-nav .nav-heading {
            padding: 1.5rem 1rem 0.5rem;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            font-weight: 700;
        }

        .sidebar-nav .nav-link {
            color: #94A3B8;
            /* Slate 400 */
            padding: 0.75rem 1rem;
            margin-bottom: 0.25rem;
            display: flex;
            align-items: center;
            border-radius: 8px;
            transition: all 0.2s;
            font-weight: 500;
            font-size: 0.9rem;
            border: 1px solid transparent;
        }

        .sidebar-nav .nav-link:hover {
            background: var(--sidebar-hover);
            color: #fff;
        }

        .sidebar-nav .nav-link.active {
            background: var(--primary);
            color: #000;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .sidebar-nav .nav-link i {
            width: 20px;
            margin-right: 0.85rem;
            font-size: 1.15rem;
            transition: transform 0.2s;
        }

        .sidebar-nav .nav-link:hover i {
            transform: scale(1.1);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
        }

        .header {
            height: var(--header-height);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #E2E8F0;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .content-wrapper {
            padding: 2.5rem;
            flex: 1;
            max-width: 1600px;
            width: 100%;
            margin: 0 auto;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: var(--radius);
            padding: 1.75rem;
            box-shadow: var(--card-shadow);
            transition: all 0.3s;
            border: 1px solid #F1F5F9;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--card-shadow-hover);
            border-color: var(--primary-light);
        }

        .stat-icon-wrapper {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 1.25rem;
        }

        /* Custom Table Styling */
        .card {
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .table thead th {
            background-color: #F8FAFC;
            border-bottom: 1px solid #E2E8F0;
            text-transform: uppercase;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: var(--text-muted);
            padding: 1rem 1.5rem;
        }

        .table tbody td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            color: var(--text-main);
            border-bottom: 1px solid #F1F5F9;
        }

        /* Stack Table Pattern - Responsive */
        @media (max-width: 768px) {
            .table-stack,
            .table-responsive-stack {
                border: 0;
            }

            .table-stack thead,
            .table-responsive-stack thead {
                display: none;
            }

            .table-stack tr,
            .table-responsive-stack tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #E2E8F0;
                border-radius: var(--radius);
                background: white;
                box-shadow: var(--card-shadow);
                padding: 1rem;
            }

            .table-stack td,
            .table-responsive-stack td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem 0;
                border: none;
                border-bottom: 1px solid #F1F5F9;
                text-align: right;
            }

            .table-stack td:last-child,
            .table-responsive-stack td:last-child {
                border-bottom: none;
            }

            .table-stack td::before,
            .table-responsive-stack td::before {
                content: attr(data-label);
                font-weight: 700;
                text-transform: uppercase;
                font-size: 0.7rem;
                letter-spacing: 0.05em;
                color: var(--text-muted);
                text-align: left;
                flex: 0 0 40%;
                padding-right: 1rem;
            }

            .table-stack td[data-label="Hành động"],
            .table-responsive-stack td[data-label="Hành động"],
            .table-stack td.table-actions,
            .table-responsive-stack td.table-actions {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
            }

            .table-stack td[data-label="Hành động"]::before,
            .table-responsive-stack td[data-label="Hành động"]::before,
            .table-stack td.table-actions::before,
            .table-responsive-stack td.table-actions::before {
                margin-bottom: 0.5rem;
            }

            .table-stack td[data-label="Hành động"] .d-flex,
            .table-responsive-stack td[data-label="Hành động"] .d-flex,
            .table-stack td.table-actions .d-flex,
            .table-responsive-stack td.table-actions .d-flex {
                justify-content: flex-start;
                flex-wrap: wrap;
            }
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #000;
            font-weight: 600;
            padding: 0.6rem 1.25rem;
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
            padding: 0.5em 0.85em;
            font-weight: 600;
            border-radius: 6px;
        }

        /* Sidebar Toggle Mobile */
        .sidebar-toggle {
            width: 40px;
            height: 40px;
            display: none;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
            background: #fff;
            color: var(--text-main);
            margin-right: 1.25rem;
            transition: all 0.2s;
        }

        .sidebar-toggle:hover {
            background: #F8FAFC;
            color: var(--primary);
        }

        /* Responsive UI */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: flex;
            }
        }

        @media (max-width: 640px) {
            .content-wrapper {
                padding: 1.5rem;
            }

            .header {
                padding: 0 1.25rem;
            }
        }

        /* Animation */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
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
                <i class="fas fa-clone"></i> Tin tức & Hoạt động
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
        $(document).ready(function() {
            const sidebar = $('#sidebar');
            const overlay = $('#sidebarOverlay');
            const toggle = $('#sidebarToggle');
            const sidebarNav = $('.sidebar-nav');
            const activeLink = $('.sidebar-nav .nav-link.active');

            function toggleSidebar() {
                sidebar.toggleClass('show');
                overlay.toggleClass('show');
            }

            toggle.click(function(e) {
                e.stopPropagation();
                toggleSidebar();
            });

            overlay.click(function() {
                toggleSidebar();
            });

            // Close sidebar when clicking outside on mobile
            $(document).click(function(e) {
                if ($(window).width() < 992) {
                    if (!sidebar.is(e.target) && sidebar.has(e.target).length === 0 && !toggle.is(e
                            .target)) {
                        sidebar.removeClass('show');
                        overlay.removeClass('show');
                    }
                }
            });

            // Persistent Sidebar Scroll Position
            const savedScrollPos = localStorage.getItem('sidebar-scroll');
            if (savedScrollPos !== null) {
                sidebarNav.scrollTop(savedScrollPos);
            } else if (activeLink.length) {
                // If no saved position, ensure active link is visible
                activeLink[0].scrollIntoView({
                    block: 'center'
                });
            }

            // Save scroll position before navigation
            $('.sidebar-nav .nav-link').on('click', function() {
                localStorage.setItem('sidebar-scroll', sidebarNav.scrollTop());
            });

            // Cleanup on resize
            $(window).on('resize', function() {
                if ($(window).width() >= 992) {
                    sidebar.removeClass('show');
                    overlay.removeClass('show');
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
