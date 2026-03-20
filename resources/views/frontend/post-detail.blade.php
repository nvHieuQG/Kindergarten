@extends('layouts.babycare')

@section('title', $post->title . ' - Hoa Hướng Dương')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->content), 160))
@section('og_type', 'article')
@section('og_image', $post->featured_image ? asset('storage/' . $post->featured_image) :
    asset('assets/img/og-default.jpg'))

@section('content')
    <x-page-header :title="$post->title" active="Chi tiết bài viết" />

    <!-- Post Detail Start -->
    <div class="container-fluid py-5 bg-light-subtle">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Post Container -->
                    <div class="bg-white rounded-4 shadow-sm overflow-hidden p-3 p-md-5 mb-5 wow fadeInUp"
                        data-wow-delay="0.1s">

                        <!-- Post Meta Top -->
                        <div class="mb-4">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-3">
                                <i class="far fa-folder-open me-1"></i> {{ $post->category->name ?? 'Tin tức' }}
                            </span>
                            <h1 class="h2 fw-bold text-dark mb-3">{{ $post->title }}</h1>
                            <div class="d-flex align-items-center text-muted small">
                                <div class="d-flex align-items-center me-4">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2"
                                        style="width: 35px; height: 35px;">
                                        <i class="far fa-user text-secondary"></i>
                                    </div>
                                    <span>{{ $post->user->name ?? 'Admin' }}</span>
                                </div>
                                <div class="d-flex align-items-center me-4">
                                    <i class="far fa-calendar-alt me-2 text-primary"></i>
                                    <span>{{ $post->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="far fa-eye me-2 text-primary"></i>
                                    <span>{{ number_format($post->views) }} lượt xem</span>
                                </div>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        @if ($post->featured_image)
                            <div class="mb-5 rounded-4 overflow-hidden position-relative shadow-sm"
                                style="max-height: 500px;">
                                <img src="{{ asset('storage/' . $post->featured_image) }}"
                                    class="img-fluid w-100 object-fit-cover scale-hover" alt="{{ $post->title }}">
                            </div>
                        @else
                            <div class="mb-5 rounded-4 overflow-hidden position-relative shadow-sm"
                                style="max-height: 500px;">
                                <img src="{{ asset('assets/img/blog-1.jpg') }}"
                                    class="img-fluid w-100 object-fit-cover scale-hover" alt="Default Image">
                            </div>
                        @endif

                        <!-- Excerpt -->
                        @if ($post->excerpt)
                            <div class="bg-light p-4 rounded-3 border-start border-4 border-primary mb-5">
                                <p class="lead fw-medium text-dark fst-italic mb-0">{{ $post->excerpt }}</p>
                            </div>
                        @endif

                        <!-- Post Content -->
                        <div class="post-content fs-6 lh-lg text-dark mb-5 ck-content">
                            {!! preg_replace('#http://(127\.0\.0\.1|localhost):8000#', '', $post->content) !!}
                        </div>

                        <!-- Tags & Share -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap pt-4 border-top">
                            <div class="d-flex align-items-center">
                                <span class="fw-bold me-3 text-dark">Chia sẻ:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                                    target="_blank" class="btn btn-outline-primary btn-sm rounded-circle me-2 social-btn"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}"
                                    target="_blank" class="btn btn-outline-info btn-sm rounded-circle me-2 social-btn"><i
                                        class="fab fa-twitter"></i></a>
                                <button onclick="copyToClipboard('{{ route('blog.show', $post->slug) }}')"
                                    class="btn btn-outline-secondary btn-sm rounded-circle social-btn"><i
                                        class="fa fa-link"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Author Box -->
                    <div class="bg-white rounded-4 shadow-sm p-4 mb-5 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 80px; height: 80px;">
                                    <i class="fas fa-user-tie fa-2x"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h5 class="fw-bold text-dark mb-1">{{ $post->user->name ?? 'Ban Quản Trị' }}</h5>
                                <p class="text-muted small mb-2">Tác giả biên tập</p>
                                <p class="mb-0">Cảm ơn bạn đã đọc bài viết này. Hãy theo dõi chúng tôi để cập nhật thêm
                                    nhiều tin tức bổ ích nhé!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Related Posts (Mobile/Bottom) -->
                    <div class="d-lg-none mb-5">
                        <h4 class="mb-4 fw-bold text-dark border-start border-4 border-primary ps-3">Bài viết liên quan</h4>
                        <div class="row g-4">
                            @foreach ($recentPosts as $recent)
                                <div class="col-md-6">
                                    <div class="bg-white rounded-4 shadow-sm h-100 overflow-hidden">
                                        <a href="{{ route('blog.show', $recent->slug) }}" class="d-block position-relative"
                                            style="height: 200px;">
                                            <img src="{{ $recent->featured_image ? asset('storage/' . $recent->featured_image) : asset('assets/img/blog-1.jpg') }}"
                                                class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $recent->title }}"
                                                loading="lazy">
                                        </a>
                                        <div class="p-3">
                                            <h6 class="fw-bold mb-1"><a href="{{ route('blog.show', $recent->slug) }}"
                                                    class="text-dark text-decoration-none">{{ $recent->title }}</a></h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px; z-index: 900;">

                        <!-- Search Widget -->
                        <div class="bg-white rounded-4 shadow-sm p-4 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3">Tìm kiếm</h5>
                            <form action="{{ route('blog') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search"
                                        class="form-control border-end-0 py-2 rounded-start-pill ps-3"
                                        placeholder="Nhập từ khóa...">
                                    <button class="btn btn-primary text-white border-0 py-2 rounded-end-pill px-3"
                                        type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories Widget -->
                        <div class="bg-white rounded-4 shadow-sm p-4 mb-4 wow fadeInUp" data-wow-delay="0.4s">
                            <h5 class="fw-bold text-dark mb-3 border-start border-4 border-primary ps-3">Danh mục</h5>
                            <div class="d-flex flex-column">
                                @foreach ($categories as $category)
                                    <a href="{{ route('blog', ['category' => $category->slug]) }}"
                                        class="d-flex justify-content-between align-items-center text-decoration-none py-2 border-bottom border-light hover-text-primary transition-all">
                                        <span class="text-dark fw-medium"><i
                                                class="fas fa-caret-right me-2 text-primary"></i>
                                            {{ $category->name }}</span>
                                        <span
                                            class="badge bg-light text-secondary rounded-pill small border">{{ $category->posts_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="bg-white rounded-4 shadow-sm p-4 mb-4 wow fadeInUp" data-wow-delay="0.5s">
                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3">Bài viết mới nhất
                            </h5>
                            <div class="d-flex flex-column gap-3">
                                @foreach ($recentPosts as $recent)
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('blog.show', $recent->slug) }}"
                                            class="flex-shrink-0 me-3 rounded-3 overflow-hidden"
                                            style="width: 80px; height: 80px;">
                                            <img src="{{ $recent->featured_image ? asset('storage/' . $recent->featured_image) : asset('assets/img/blog-1.jpg') }}"
                                                class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $recent->title }}"
                                                loading="lazy">
                                        </a>
                                        <div>
                                            <small class="text-muted d-block mb-1"><i class="far fa-clock me-1"></i>
                                                {{ $recent->created_at->format('d/m/Y') }}</small>
                                            <a href="{{ route('blog.show', $recent->slug) }}"
                                                class="text-dark fw-bold text-decoration-none lh-sm line-clamp-2 hover-text-primary">{{ $recent->title }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Banner/Ad Widget (Placeholder) -->
                        <div class="rounded-4 overflow-hidden shadow-sm wow fadeInUp" data-wow-delay="0.6s">
                            <div class="bg-primary p-4 text-center text-white position-relative overflow-hidden">
                                <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25"
                                    style="background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,0.2) 10px, rgba(255,255,255,0.2) 20px);">
                                </div>
                                <h4 class="fw-bold mb-3 position-relative z-1">Đăng ký tư vấn ngay!</h4>
                                <p class="small mb-4 position-relative z-1 text-white-50">Nhận thông tin chi tiết về chương
                                    trình học và ưu đãi mới nhất.</p>
                                <a href="{{ route('home') }}#contact"
                                    class="btn bg-white text-primary fw-bold rounded-pill px-4 shadow-sm position-relative z-1">Liên
                                    hệ ngay</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Detail End -->

    <!-- Custom Styles -->
    <style>
        .bg-light-subtle {
            background-color: #f8fafc;
        }

        .post-content {
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
        }

        .post-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 24px 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Gắn CSS responsive cho các thẻ iframe (YouTube) */
        .post-content iframe {
            max-width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .post-content h2 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #1e293b;
            font-weight: 700;
            font-size: 1.75rem;
        }

        .post-content h3 {
            margin-top: 1.75rem;
            margin-bottom: 0.75rem;
            color: #334155;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .post-content p {
            margin-bottom: 1.25rem;
            color: #334155;
        }

        .post-content ul,
        .post-content ol {
            padding-left: 1.5rem;
            margin-bottom: 1.25rem;
            color: #334155;
        }

        .post-content li {
            margin-bottom: 0.5rem;
        }

        .post-content blockquote {
            border-left: 5px solid var(--primary);
            padding: 1.5rem;
            background: #fffbeb;
            margin: 2rem 0;
            border-radius: 0 12px 12px 0;
            font-style: italic;
            color: #4b5563;
        }

        .scale-hover {
            transition: transform 0.3s ease;
        }

        .scale-hover:hover {
            transform: scale(1.02);
        }

        .hover-bg-light:hover {
            background-color: #f1f5f9;
        }

        .hover-text-primary:hover {
            color: var(--primary) !important;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .transition-all {
            transition: all 0.2s ease;
        }
    </style>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // You might want to use a toast ideally, but alert is robust
                const btn = document.querySelector('button[onclick*="copyToClipboard"]');
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-check"></i>';
                btn.classList.replace('btn-outline-secondary', 'btn-success');

                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                    btn.classList.replace('btn-success', 'btn-outline-secondary');
                }, 2000);
            }, function(err) {
                console.error('Không thể copy: ', err);
            });
        }
    </script>
@endsection
