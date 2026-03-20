@extends('layouts.babycare')

@section('title', 'Tin tức - Hoa Hướng Dương')
@section('meta_description', 'Cập nhật những hoạt động, tin tức và sự kiện nổi bật tại Trường Mầm Non Hoa Hướng Dương.')

@section('content')
    <x-page-header title="Tin tức & Sự kiện" active="Tin tức" />

    <!-- Blog Section Start -->
    <div class="container-fluid py-5" style="background: linear-gradient(135deg, #FFF9F0 0%, #FFFBF5 100%);">
        <div class="container py-5">
            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Section Header -->
                    <div class="mb-5">
                        <h2 class="display-5 fw-bold mb-3" style="color: #2c3e50;">
                            <span style="border-bottom: 4px solid var(--bs-primary); padding-bottom: 8px;">Tin tức</span>
                            mới nhất
                        </h2>
                        <p class="text-muted fs-5">Cập nhật những hoạt động và sự kiện nổi bật tại trường</p>
                    </div>

                    <!-- Blog Grid -->
                    <div class="row g-4">
                        @forelse($posts as $post)
                            <div class="col-md-6">
                                <article class="modern-blog-card">
                                    <!-- Image -->
                                    <div class="blog-image-wrapper">
                                        <a href="{{ route('blog.show', $post->slug) }}">
                                            <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('assets/img/blog-1.jpg') }}"
                                                alt="{{ $post->title }}" class="blog-image" loading="lazy">
                                        </a>
                                        <div class="category-tag">
                                            <i class="fas fa-tag me-1"></i>{{ $post->category->name ?? 'Tin tức' }}
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="blog-card-body">
                                        <!-- Meta Info -->
                                        <div class="blog-meta-top mb-3">
                                            <span class="meta-item">
                                                <i class="far fa-calendar-alt text-primary"></i>
                                                {{ $post->created_at->format('d/m/Y') }}
                                            </span>
                                            <span class="meta-item">
                                                <i class="far fa-eye text-primary"></i>
                                                {{ $post->views }}
                                            </span>
                                            <span class="meta-item">
                                                <i class="far fa-clock text-primary"></i>
                                                {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} phút đọc
                                            </span>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="blog-card-title">
                                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>

                                        <!-- Excerpt -->
                                        <p class="blog-excerpt">{{ Str::limit($post->excerpt, 120) }}</p>

                                        <!-- Author & Read More -->
                                        <div class="blog-footer">
                                            <div class="author-info-small">
                                                <img src="{{ asset('assets/img/program-teacher.jpg') }}"
                                                    alt="{{ $post->user->name ?? 'Tác giả' }}" loading="lazy">
                                                <span>{{ $post->user->name ?? 'Admin' }}</span>
                                            </div>
                                            <a href="{{ route('blog.show', $post->slug) }}" class="read-more-link">
                                                Đọc tiếp <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                                    <h4 class="text-muted">Chưa có bài viết nào</h4>
                                    <p class="text-muted">Vui lòng quay lại sau</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if ($posts->hasPages())
                        <div class="mt-5 d-flex justify-content-center">
                            {{ $posts->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Search Box -->
                    <div class="sidebar-widget">
                        <h5 class="widget-title">
                            <i class="fas fa-search me-2"></i>Tìm kiếm
                        </h5>
                        <form action="{{ route('blog') }}" method="GET" class="search-form">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm bài viết..."
                                    value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-widget">
                        <h5 class="widget-title">
                            <i class="fas fa-folder me-2"></i>Danh mục
                        </h5>
                        <ul class="category-list">
                            <li>
                                <a href="{{ route('blog') }}" class="{{ !request('category') ? 'active' : '' }}">
                                    <span>Tất cả</span>
                                    <span class="count">{{ $posts->total() }}</span>
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('blog', ['category' => $category->slug]) }}"
                                        class="{{ request('category') == $category->slug ? 'active' : '' }}">
                                        <span>{{ $category->name }}</span>
                                        <span class="count">{{ $category->posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Popular Posts -->
                    <div class="sidebar-widget">
                        <h5 class="widget-title">
                            <i class="fas fa-fire me-2"></i>Bài viết phổ biến
                        </h5>
                        <div class="popular-posts">
                            @foreach ($popularPosts as $popularPost)
                                <div class="popular-post-item">
                                    <a href="{{ route('blog.show', $popularPost->slug) }}" class="popular-post-image">
                                        <img src="{{ $popularPost->featured_image ? asset('storage/' . $popularPost->featured_image) : asset('assets/img/blog-1.jpg') }}"
                                            alt="{{ $popularPost->title }}" loading="lazy">
                                    </a>
                                    <div class="popular-post-content">
                                        <a href="{{ route('blog.show', $popularPost->slug) }}" class="popular-post-title">
                                            {{ Str::limit($popularPost->title, 60) }}
                                        </a>
                                        <div class="popular-post-meta">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $popularPost->created_at->format('d/m/Y') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- CTA Banner -->
                    <div class="sidebar-widget cta-widget">
                        <div class="cta-content text-center">
                            <div class="cta-icon mb-3">
                                <i class="fas fa-graduation-cap fa-3x text-white"></i>
                            </div>
                            <h4 class="text-white mb-3">Đăng ký tuyển sinh</h4>
                            <p class="text-white mb-4">Đăng ký ngay để con bạn được học tập trong môi trường tốt nhất</p>
                            <a href="{{ route('home') }}#hero-header" class="btn btn-light btn-lg rounded-pill px-4">
                                <i class="fas fa-pencil-alt me-2"></i>Đăng ký ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section End -->

    @push('styles')
        <style>
            /* Modern Blog Card */
            .modern-blog-card {
                background: white;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .modern-blog-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
            }

            /* Blog Image */
            .blog-image-wrapper {
                position: relative;
                overflow: hidden;
                height: 220px;
            }

            .blog-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .modern-blog-card:hover .blog-image {
                transform: scale(1.1);
            }

            .category-tag {
                position: absolute;
                top: 16px;
                left: 16px;
                background: var(--bs-primary);
                color: white;
                padding: 6px 16px;
                border-radius: 20px;
                font-size: 13px;
                font-weight: 600;
                box-shadow: 0 4px 12px rgba(255, 179, 0, 0.3);
            }

            /* Blog Card Body */
            .blog-card-body {
                padding: 24px;
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            .blog-meta-top {
                display: flex;
                gap: 16px;
                flex-wrap: wrap;
            }

            .meta-item {
                font-size: 13px;
                color: #718096;
                display: flex;
                align-items: center;
                gap: 4px;
            }

            .meta-item i {
                font-size: 14px;
            }

            .blog-card-title {
                font-size: 1.25rem;
                font-weight: 600;
                line-height: 1.4;
                margin-bottom: 12px;
            }

            .blog-card-title a {
                color: #2c3e50;
                text-decoration: none;
                transition: color 0.3s;
            }

            .blog-card-title a:hover {
                color: var(--bs-primary);
            }

            .blog-excerpt {
                color: #718096;
                font-size: 15px;
                line-height: 1.6;
                margin-bottom: 20px;
                flex: 1;
            }

            /* Blog Footer */
            .blog-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-top: 16px;
                border-top: 1px solid #e2e8f0;
            }

            .author-info-small {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .author-info-small img {
                width: 36px;
                height: 36px;
                border-radius: 50%;
                object-fit: cover;
            }

            .author-info-small span {
                font-size: 14px;
                font-weight: 500;
                color: #4a5568;
            }

            .read-more-link {
                color: var(--bs-primary);
                font-weight: 600;
                font-size: 14px;
                text-decoration: none;
                transition: all 0.3s;
            }

            .read-more-link:hover {
                color: var(--bs-secondary);
                gap: 8px;
            }

            .read-more-link i {
                transition: transform 0.3s;
            }

            .read-more-link:hover i {
                transform: translateX(4px);
            }

            /* Sidebar Widgets */
            .sidebar-widget {
                background: white;
                border-radius: 16px;
                padding: 24px;
                margin-bottom: 24px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            }

            .widget-title {
                font-size: 1.1rem;
                font-weight: 700;
                color: #2c3e50;
                margin-bottom: 20px;
                padding-bottom: 12px;
                border-bottom: 2px solid var(--bs-primary);
                display: flex;
                align-items: center;
            }

            /* Search Form */
            .search-form .form-control {
                border: 2px solid #e2e8f0;
                border-right: none;
                padding: 12px 16px;
                font-size: 15px;
            }

            .search-form .form-control:focus {
                border-color: var(--bs-primary);
                box-shadow: none;
            }

            .search-form .btn {
                border: 2px solid var(--bs-primary);
                padding: 12px 20px;
            }

            /* Category List */
            .category-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .category-list li {
                margin-bottom: 8px;
            }

            .category-list a {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px 16px;
                background: #f7fafc;
                border-radius: 8px;
                color: #4a5568;
                text-decoration: none;
                transition: all 0.3s;
                font-weight: 500;
            }

            .category-list a:hover,
            .category-list a.active {
                background: var(--bs-primary);
                color: white;
            }

            .category-list .count {
                background: white;
                color: var(--bs-primary);
                padding: 4px 10px;
                border-radius: 12px;
                font-size: 13px;
                font-weight: 600;
            }

            .category-list a.active .count {
                background: white;
                color: var(--bs-primary);
            }

            /* Popular Posts */
            .popular-post-item {
                display: flex;
                gap: 12px;
                padding-bottom: 16px;
                margin-bottom: 16px;
                border-bottom: 1px solid #e2e8f0;
            }

            .popular-post-item:last-child {
                border-bottom: none;
                margin-bottom: 0;
                padding-bottom: 0;
            }

            .popular-post-image {
                flex-shrink: 0;
                width: 80px;
                height: 80px;
                border-radius: 8px;
                overflow: hidden;
            }

            .popular-post-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s;
            }

            .popular-post-item:hover .popular-post-image img {
                transform: scale(1.1);
            }

            .popular-post-content {
                flex: 1;
            }

            .popular-post-title {
                font-size: 14px;
                font-weight: 600;
                color: #2c3e50;
                text-decoration: none;
                display: block;
                margin-bottom: 8px;
                line-height: 1.4;
                transition: color 0.3s;
            }

            .popular-post-title:hover {
                color: var(--bs-primary);
            }

            .popular-post-meta {
                font-size: 12px;
                color: #a0aec0;
            }

            /* CTA Widget */
            .cta-widget {
                background: linear-gradient(135deg, var(--bs-primary) 0%, #FFA500 100%);
                position: relative;
                overflow: hidden;
            }

            .cta-widget::before {
                content: '';
                position: absolute;
                top: -50%;
                right: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            }

            .cta-content {
                position: relative;
                z-index: 1;
            }

            .cta-icon {
                width: 80px;
                height: 80px;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .blog-meta-top {
                    gap: 12px;
                }

                .meta-item {
                    font-size: 12px;
                }

                .blog-card-title {
                    font-size: 1.1rem;
                }
            }
        </style>
    @endpush
@endsection
