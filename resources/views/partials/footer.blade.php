<div class="container-fluid footer pt-5 pb-4 mt-0 bg-white border-top border-primary border-4 wow fadeIn"
    data-wow-delay="0.1s">
    <div class="container pb-3">
        <div class="row g-4">
            <!-- Col 1: Brand & Contact -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-item h-100">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                            <i class="fas fa-sun text-primary fs-3"></i>
                        </div>
                        <h4 class="fw-extrabold mb-0 text-dark text-uppercase letter-spacing-1">
                            {{ $settings['site_name'] ?? 'Hoa Hướng Dương' }}
                        </h4>
                    </div>
                    <p class="mb-4 text-muted" style="font-size: 14px; line-height: 1.8;">
                        Hệ thống mầm non chất lượng cao, nơi bé yêu được nuôi dưỡng toàn diện về trí tuệ và tâm hồn
                        trong môi trường an toàn, tràn đầy tình thương.
                    </p>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-2 rounded-circle me-3 text-primary shadow-sm"
                                style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-map-marker-alt small"></i>
                            </div>
                            <span class="text-muted small">{{ $settings['site_address'] ?? 'Hà Nội, Việt Nam' }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-2 rounded-circle me-3 text-primary shadow-sm"
                                style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-phone-alt small"></i>
                            </div>
                            <span class="text-muted small">Hotline: <strong
                                    class="text-dark">{{ $settings['site_phone'] ?? '0123 456 789' }}</strong></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-2 rounded-circle me-2 text-primary shadow-sm"
                                style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-envelope small"></i>
                            </div>
                            <span class="text-muted small">{{ $settings['site_email'] ?? 'info@example.com' }}</span>
                        </div>
                    </div>
                    <div class="d-flex mt-4 pt-2">
                        @if (isset($settings['social_facebook']))
                            <a class="btn btn-primary btn-sm-square me-2 rounded-circle hover-lift shadow-sm"
                                href="{{ $settings['social_facebook'] }}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if (isset($settings['social_youtube']))
                            <a class="btn btn-danger btn-sm-square me-2 rounded-circle hover-lift shadow-sm"
                                href="{{ $settings['social_youtube'] }}"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if (isset($settings['social_instagram']))
                            <a class="btn btn-info btn-sm-square me-2 rounded-circle hover-lift shadow-sm"
                                href="{{ $settings['social_instagram'] }}"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-item ps-lg-4">
                    <h5 class="text-dark mb-4 fw-bold position-relative pb-2">
                        Danh Mục
                        <span class="position-absolute bottom-0 start-0 bg-primary"
                            style="width: 30px; height: 3px; border-radius: 10px;"></span>
                    </h5>
                    <div class="d-flex flex-column gap-3">
                        <a href="/"
                            class="text-muted text-decoration-none transition-hover small d-flex align-items-center">
                            <i class="fas fa-angle-right text-primary me-2"></i>Trang chủ</a>
                        <a href="#about"
                            class="text-muted text-decoration-none transition-hover small d-flex align-items-center">
                            <i class="fas fa-angle-right text-primary me-2"></i>Về chúng tôi</a>
                        <a href="#services"
                            class="text-muted text-decoration-none transition-hover small d-flex align-items-center">
                            <i class="fas fa-angle-right text-primary me-2"></i>Dịch vụ</a>
                        <a href="#blog"
                            class="text-muted text-decoration-none transition-hover small d-flex align-items-center">
                            <i class="fas fa-angle-right text-primary me-2"></i>Tin tức</a>
                        <a href="#team"
                            class="text-muted text-decoration-none transition-hover small d-flex align-items-center">
                            <i class="fas fa-angle-right text-primary me-2"></i>Giáo viên</a>
                    </div>
                </div>
            </div>

            <!-- Col 3: Photo Gallery -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h5 class="text-dark mb-4 fw-bold position-relative pb-2">
                        Thư viện ảnh
                        <span class="position-absolute bottom-0 start-0 bg-primary"
                            style="width: 30px; height: 3px; border-radius: 10px;"></span>
                    </h5>
                    <div class="row g-2">
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="col-4">
                                @php
                                    $imgPath = $settings['gallery_image_' . $i] ?? 'assets/img/galary-' . $i . '.jpg';
                                    $imgUrl = Str::startsWith($imgPath, 'assets/')
                                        ? asset($imgPath)
                                        : asset('storage/' . $imgPath);
                                @endphp
                                <div class="footer-galary-img rounded-3 overflow-hidden shadow-sm border border-light">
                                    <a href="{{ $imgUrl }}" data-lightbox="footer-gallery">
                                        <img src="{{ $imgUrl }}"
                                            class="img-fluid w-100 h-100 object-fit-cover transition-all"
                                            style="aspect-ratio: 1/1;" alt="Gallery Image {{ $i }}">
                                    </a>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Col 4: Map -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h5 class="text-dark mb-4 fw-bold position-relative pb-2">
                        Bản Đồ
                        <span class="position-absolute bottom-0 start-0 bg-primary"
                            style="width: 30px; height: 3px; border-radius: 10px;"></span>
                    </h5>
                    @if (isset($settings['google_maps']) && $settings['google_maps'])
                        <div class="rounded-4 overflow-hidden border border-light shadow-sm"
                            style="width: 100%; height: 180px;">
                            {!! $settings['google_maps'] !!}
                        </div>
                    @else
                        <div class="bg-light rounded-4 d-flex align-items-center justify-content-center"
                            style="height: 180px;">
                            <p class="text-muted small mb-0"><i class="fas fa-map-marked-alt me-2"></i>Chưa cấu hình bản
                                đồ.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
