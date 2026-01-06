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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 64px;
            --primary: #FFC107; /* Sunflower Yellow */
            --primary-dark: #FFB300;
            --secondary: #4E342E; /* Dark Brown */
            --sidebar-bg: #4E342E; /* Dark Brown */
            --sidebar-hover: #3E2723; /* Darker Brown */
            --text-on-primary: #000000;
            --text-on-sidebar: #ffffff;
            --bg-light: #f3f4f6;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: var(--bg-light);
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar .logo {
            height: var(--header-height);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            background: rgba(0,0,0,0.2);
            color: var(--text-on-sidebar);
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .sidebar-nav {
            padding: 1rem 0;
            flex: 1;
            overflow-y: auto;
        }

        /* Custom Scrollbar for Sidebar */
        .sidebar-nav::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar-nav::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar-nav::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 3px;
        }

        .sidebar-nav .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 0.85rem 1.5rem;
            display: flex;
            align-items: center;
            transition: all 0.2s;
            border-left: 4px solid transparent;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .sidebar-nav .nav-link:hover {
            background: var(--sidebar-hover);
            color: var(--text-on-sidebar);
            padding-left: 1.75rem; /* Slide effect */
        }

        .sidebar-nav .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: var(--primary);
            border-left-color: var(--primary);
        }

        .sidebar-nav .nav-link i {
            width: 24px;
            margin-right: 0.75rem;
            font-size: 1.1rem;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
        }

        .header {
            height: var(--header-height);
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .content-wrapper {
            padding: 2rem;
            flex: 1;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid #f3f4f6;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        /* Mobile Toggle */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #4b5563;
            cursor: pointer;
            padding: 0;
            margin-right: 1rem;
        }

        /* Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
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
                display: block;
            }

            .sidebar-overlay.show {
                display: block;
                opacity: 1;
            }
        }

        /* Button Overrides */
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: var(--text-on-primary);
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: var(--text-on-primary);
        }

        /* Dropdown */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
        }
        
        .dropdown-item {
            padding: 0.5rem 1rem;
            font-weight: 500;
        }
        
        .dropdown-item:active {
            background-color: var(--primary);
            color: var(--text-on-primary);
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
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Bảng điều khiển
            </a>

            <div class="px-3 py-2 text-uppercase text-white-50 small fw-bold mt-2">Nội dung</div>

            <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i> Bài viết
            </a>

            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="fas fa-folder"></i> Danh mục
            </a>

            <a href="{{ route('admin.teachers.index') }}" class="nav-link {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i> Giáo viên
            </a>

            <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fas fa-concierge-bell"></i> Dịch vụ
            </a>

            <div class="px-3 py-2 text-uppercase text-white-50 small fw-bold mt-2">Quản lý</div>

            <a href="{{ route('admin.enrollments.index') }}" class="nav-link {{ request()->routeIs('admin.enrollments.*') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i> Tuyển sinh
            </a>

            <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Liên hệ
            </a>

            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Cấu hình
            </a>

            <hr class="mx-3 my-3" style="border-color: rgba(255,255,255,0.1);">

            <a href="{{ route('home') }}" class="nav-link" target="_blank">
                <i class="fas fa-external-link-alt"></i> Xem trang web
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
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
                <h5 class="mb-0 fw-bold text-secondary">@yield('page-title', 'Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center">
                <span class="me-3 d-none d-md-block fw-semibold text-secondary">Xin chào, {{ auth()->user()->name }}</span>
                <div class="dropdown">
                    <button class="btn btn-light rounded-circle shadow-sm" type="button" data-bs-toggle="dropdown" style="width: 40px; height: 40px; padding: 0;">
                        <i class="fas fa-user text-secondary"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-circle me-2 text-muted"></i> Hồ sơ</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i> Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content-wrapper">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 border-start border-success border-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 border-start border-danger border-4" role="alert">
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
                    if (!sidebar.is(e.target) && sidebar.has(e.target).length === 0 && !toggle.is(e.target)) {
                        sidebar.removeClass('show');
                        overlay.removeClass('show');
                    }
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
