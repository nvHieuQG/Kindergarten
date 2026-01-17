@extends('layouts.babycare')

@section('title', $post->title . ' - Hoa Hướng Dương')

@section('content')
    <x-page-header :title="$post->title" active="Chi tiết bài viết" />

    <!-- Post Detail Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container py-5">
            <div class="row g-5 justify-content-center">
                <!-- Main Content -->
                <div class="col-lg-9">
                    <!-- Post Content Card -->
                    <div class="bg-white rounded-4 shadow-sm overflow-hidden p-4 p-md-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        
                        <!-- Post Header -->
                        <div class="text-center mb-5">
                            <h1 class="display-6 fw-bold mb-3 text-dark">{{ $post->title }}</h1>
                            <div class="d-flex justify-content-center text-muted small">
                                <span class="me-3"><i class="far fa-calendar-alt me-1"></i> {{ $post->created_at->format('d/m/Y') }}</span>
                                <span class="me-3"><i class="far fa-user me-1"></i> {{ $post->user->name ?? 'Admin' }}</span>
                                <span class="me-3"><i class="far fa-eye me-1"></i> {{ number_format($post->views) }} lượt xem</span>
                                <span><i class="far fa-folder-open me-1"></i> {{ $post->category->name ?? 'Tin tức' }}</span>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        @if($post->featured_image)
                        <div class="mb-5 rounded-4 overflow-hidden position-relative" style="max-height: 500px;">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                 class="img-fluid w-100 object-fit-cover" 
                                 alt="{{ $post->title }}">
                        </div>
                        @else 
                        <!-- If no image, maybe show a default or skip -->
                        <div class="mb-5 rounded-4 overflow-hidden position-relative" style="max-height: 500px;">
                             <img src="{{ asset('assets/img/blog-1.jpg') }}" class="img-fluid w-100 object-fit-cover" alt="Default Image">
                        </div>
                        @endif

                        <!-- Excerpt (Lead Text) -->
                        @if($post->excerpt)
                        <p class="lead fw-medium text-dark fst-italic mb-4 px-lg-5 text-center">{{ $post->excerpt }}</p>
                        @endif

                        <!-- Post Content -->
                        <div class="post-content fs-6 lh-lg text-dark">
                            {!! $post->content !!}
                        </div>

                        <!-- Share & Tags -->
                        <div class="mt-5 pt-4 border-top">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex align-items-center mb-3 mb-md-0">
                                    <span class="fw-bold me-3">Chia sẻ:</span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle me-2" style="width: 35px; height: 35px; line-height: 25px;"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" target="_blank" class="btn btn-outline-info btn-sm rounded-circle me-2" style="width: 35px; height: 35px; line-height: 25px;"><i class="fab fa-twitter"></i></a>
                                    <button onclick="copyToClipboard('{{ route('blog.show', $post->slug) }}')" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 35px; height: 35px; line-height: 25px;"><i class="fa fa-link"></i></button>
                                </div>
                                <a href="{{ route('blog') }}" class="btn btn-link text-decoration-none text-muted"><i class="fa fa-arrow-left me-1"></i> Quay lại tin tức</a>
                            </div>
                        </div>
                    </div>

                    <!-- Related/Recent Posts (Moved to bottom, simplified) -->
                    @if($recentPosts->count() > 0)
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <h4 class="mb-4 fw-bold text-dark">Bài viết liên quan</h4>
                        <div class="row g-4">
                            @foreach($recentPosts as $recent)
                            <div class="col-md-4">
                                <div class="bg-white rounded-4 shadow-sm h-100 overflow-hidden">
                                    <div class="position-relative" style="height: 180px;">
                                        <a href="{{ route('blog.show', $recent->slug) }}" class="d-block w-100 h-100">
                                            <img src="{{ $recent->featured_image ? asset('storage/' . $recent->featured_image) : asset('assets/img/blog-1.jpg') }}" 
                                                class="img-fluid w-100 h-100 object-fit-cover transition-hover" alt="{{ $recent->title }}">
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <small class="text-muted d-block mb-1"><i class="fa fa-calendar-alt me-1"></i> {{ $recent->created_at->format('d/m/Y') }}</small>
                                        <a href="{{ route('blog.show', $recent->slug) }}" class="h6 text-decoration-none text-dark fw-bold d-block text-truncate">{{ $recent->title }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Post Detail End -->

    <!-- Custom Styles -->
    <style>
        .post-content img { max-width: 100%; height: auto; border-radius: 10px; margin: 20px 0; }
        .post-content h2, .post-content h3 { margin-top: 25px; margin-bottom: 15px; color: #2c3e50; font-weight: bold; }
        .post-content p { margin-bottom: 15px; }
        .post-content ul, .post-content ol { padding-left: 20px; margin-bottom: 15px; }
        .post-content blockquote { border-left: 4px solid #FE6F61; padding: 15px 20px; background: #f8f9fa; margin: 20px 0; border-radius: 4px; font-style: italic; }
        .object-fit-cover { object-fit: cover; }
    </style>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Đã copy link bài viết!');
            }, function(err) {
                console.error('Không thể copy: ', err);
            });
        }
    </script>
@endsection
