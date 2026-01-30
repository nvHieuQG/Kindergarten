@props(['title', 'active'])

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s" style="{{ isset($settings['hero_image']) ? 'background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.05)), url(' . asset('storage/' . $settings['hero_image']) . '); background-position: center center; background-repeat: no-repeat; background-size: cover;' : '' }}">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4">{{ $title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">{{ $active }}</li>
            </ol>
        </nav>
    </div>
   
</div>
<!-- Page Header End -->
