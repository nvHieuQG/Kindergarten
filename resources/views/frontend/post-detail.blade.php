@extends('layouts.babycare')

@section('title', $post->title . ' - Hoa Hướng Dương')

@section('content')
    <x-page-header :title="$post->title" active="Chi tiết bài viết" />

    <!-- Post Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Post Content -->
                    <div class="mb-5 wow fadeIn" data-wow-delay="0.1s">
                        <div class="overflow-hidden img-border-radius mb-4">
                            <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('assets/img/blog-1.jpg') }}" class="img-fluid w-100" alt="{{ $post->title }}">
                        </div>
                        <div class="d-flex mb-4">
                            <small class="me-3 text-muted"><i class="fa fa-user text-primary me-2"></i>{{ $post->user->name ?? 'Admin' }}</small>
                            <small class="me-3 text-muted"><i class="fa fa-folder text-primary me-2"></i>{{ $post->category->name ?? 'Tin tức' }}</small>
                            <small class="me-3 text-muted"><i class="fa fa-calendar text-primary me-2"></i>{{ $post->created_at->format('d/m/Y') }}</small>
                            <small class="me-3 text-muted"><i class="fa fa-eye text-primary me-2"></i>{{ $post->views }} lượt xem</small>
                        </div>
                        <h1 class="display-5 mb-4">{{ $post->title }}</h1>
                        <style>
                            .post-content img { max-width: 100%; height: auto; border-radius: 10px; }
                            .post-content figure.media { width: 100%; margin: 20px 0; }
                            .post-content figure.media iframe { width: 100%; min-height: 400px; border-radius: 10px; }
                            .post-content table { width: 100%; border-collapse: collapse; margin-bottom: 1rem; }
                            .post-content table td, .post-content table th { border: 1px solid #dee2e6; padding: .75rem; }
                        </style>
                        <div class="post-content">
                            {!! $post->content !!}
                        </div>
                    </div>

                    <!-- Author Box -->
                    <div class="d-flex bg-light p-4 rounded mb-5 wow fadeIn" data-wow-delay="0.1s">
                        <img src="{{ asset('assets/img/program-teacher.jpg') }}" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="" style="width: 100px; height: 100px;">
                        <div class="ms-4">
                            <h4 class="text-primary">{{ $post->user->name ?? 'Cán bộ nhà trường' }}</h4>
                            <p class="mb-0 text-muted">Chào mừng bạn đến với chuyên mục Tin tức & Thông báo của trường mầm non Hoa Hướng Dương. Chúng tôi luôn cập nhật những thông tin mới nhất về hoạt động và chương trình học của các con.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Sidebar -->
                    <div class="wow fadeIn" data-wow-delay="0.1s">
                        <!-- Search Form -->
                        <div class="mb-5">
                            <form action="{{ route('blog') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control p-3" placeholder="Tìm kiếm bài viết...">
                                    <button type="submit" class="btn btn-primary px-3"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Recent Post -->
                        <div class="mb-5">
                            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Bài viết gần đây</h4>
                            @foreach($recentPosts as $recent)
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ $recent->featured_image ? asset('storage/' . $recent->featured_image) : asset('assets/img/blog-1.jpg') }}" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;" alt="">
                                <div class="ms-3">
                                    <a href="{{ route('blog.show', $recent->slug) }}" class="h6 mb-2 d-block">{{ Str::limit($recent->title, 40) }}</a>
                                    <small class="text-muted"><i class="fa fa-calendar text-primary me-2"></i>{{ $recent->created_at->format('d/m/Y') }}</small>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Sidebar Banner -->
                        <div class="bg-primary img-border-radius p-4 text-center">
                            <h4 class="text-white mb-3">Bạn cần tư vấn?</h4>
                            <p class="text-white mb-4">Hãy đăng ký nhập học để chúng tôi có thể tư vấn chi tiết hơn cho bạn về chương trình học.</p>
                            <a href="{{ route('enrollment') }}" class="btn btn-light px-4 py-2 btn-border-radius">Đăng ký ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Detail End -->
@endsection
