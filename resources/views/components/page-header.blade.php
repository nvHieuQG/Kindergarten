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
    <div class="custom-shape-divider-bottom-1689964567">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
</div>
<!-- Page Header End -->
