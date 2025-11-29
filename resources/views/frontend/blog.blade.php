@extends('layouts.babycare')

@section('title', 'Blog - BabyCare')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4">Our Blog</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">Blog</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Start-->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Latest News & Blog</h4>
            <h1 class="mb-5 display-3">Read Our Latest News & Blog</h1>
        </div>
        <div class="row g-5 justify-content-center">
            @forelse($posts as $post)
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="blog-item rounded-bottom">
                    <div class="blog-img overflow-hidden position-relative img-border-radius">
                        <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('assets/img/blog-1.jpg') }}" class="img-fluid w-100" alt="Image" style="height: 250px; object-fit: cover;">
                    </div>
                    <div class="d-flex justify-content-between px-4 py-3 bg-light border-bottom border-primary blog-date-comments">
                        <small class="text-dark"><i class="fas fa-calendar me-1 text-dark"></i> {{ $post->created_at->format('d M Y') }}</small>
                        <small class="text-dark"><i class="fas fa-comment-alt me-1 text-dark"></i> Comments ({{ $post->comments_count ?? 0 }})</small>
                    </div>
                    <div class="blog-content d-flex align-items-center px-4 py-3 bg-light">
                        <div class="overflow-hidden rounded-circle rounded-top border border-primary">
                            <img src="{{ asset('assets/img/program-teacher.jpg') }}" class="img-fluid rounded-circle p-2 rounded-top" alt="Image" style="width: 70px; height: 70px; border-style: dotted; border-color: var(--bs-primary) !important;">
                        </div>
                        <div class="ms-3">
                            <h6 class="text-primary">{{ $post->user->name ?? 'Admin' }}</h6>
                            <p class="text-muted">{{ $post->category->name ?? 'Uncategorized' }}</p>
                        </div>
                    </div>
                    <div class="px-4 pb-4 bg-light rounded-bottom">
                        <div class="blog-text-inner">
                            <a href="#" class="h4">{{ Str::limit($post->title, 40) }}</a>
                            <p class="mt-3 mb-4">{{ Str::limit($post->excerpt, 80) }}</p>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary text-white px-4 py-2 mb-3 btn-border-radius">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No blog posts found.</p>
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
