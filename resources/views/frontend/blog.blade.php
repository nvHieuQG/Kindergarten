@extends('layouts.babycare')

@section('title', 'Blog -  Hoa Hướng Dương')

@section('content')
    <x-page-header title="Blog của chúng tôi" active="Blog" />

<!-- Blog Start-->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Tin tức & Blog mới nhất</h4>
            <h1 class="mb-5 display-3">Đọc tin tức & Blog mới nhất của chúng tôi</h1>
        </div>
        <div class="row g-5 justify-content-center">
            @forelse($posts as $post)
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('assets/img/blog-1.jpg') }}" alt="{{ $post->title }}">
                        <div class="category-badge">{{ $post->category->name ?? 'Tin tức' }}</div>
                    </div>
                    <div class="blog-content">
                        <a href="{{ route('blog.show', $post->slug) }}" class="blog-title">{{ $post->title }}</a>
                        <p class="blog-excerpt">{{ $post->excerpt }}</p>
                        
                        <div class="author-info">
                            <img src="{{ asset('assets/img/program-teacher.jpg') }}" class="author-img" alt="Admin">
                            <div>
                                <h6 class="author-name">{{ $post->user->name ?? 'Cán bộ trường' }}</h6>
                                <small class="text-muted">Tác giả</small>
                            </div>
                        </div>
                    </div>
                    <div class="blog-meta">
                        <span><i class="fas fa-calendar-alt"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                        <span><i class="fas fa-eye"></i>{{ $post->views }} lượt xem</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Không tìm thấy bài viết nào.</p>
            </div>
            @endforelse

            <div class="col-12 d-flex justify-content-center mt-5">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
<!-- Blog End-->
@endsection
