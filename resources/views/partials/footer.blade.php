<div class="container-fluid footer pt-4 pb-2 mt-0 bg-light border-top border-primary border-4 wow fadeIn"
    data-wow-delay="0.1s">
    <div class="container py-0">
        <div class="row g-5">
            <!-- Col 1: Brand & Contact -->
            <div class="col-md-6 col-lg-3">
                <div class="footer-item">
                    <h4 class="fw-bold mb-4 text-primary text-uppercase">
                        {{ $settings['site_name'] ?? 'Hoa Hướng Dương' }}</h4>
                    <div class="d-flex flex-column align-items-start">
                        <p class="mb-2 text-muted small"><i
                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $settings['site_address'] ?? 'Hà Nội, Việt Nam' }}
                        </p>
                        <p class="mb-2 text-muted small"><i class="fa fa-phone-alt text-primary me-2"></i>Hotline: <span
                                class="fw-bold">{{ $settings['site_phone'] ?? '0123 456 789' }}</span></p>
                        <p class="mb-4 text-muted small"><i class="fas fa-envelope text-primary me-2"></i>Email:
                            {{ $settings['site_email'] ?? 'info@example.com' }}</p>

                        <div class="d-flex">
                            @if (isset($settings['social_facebook']))
                                <a class="btn btn-outline-primary btn-sm-square me-2 rounded-circle"
                                    href="{{ $settings['social_facebook'] }}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if (isset($settings['social_youtube']))
                                <a class="btn btn-outline-primary btn-sm-square me-2 rounded-circle"
                                    href="{{ $settings['social_youtube'] }}"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if (isset($settings['social_instagram']))
                                <a class="btn btn-outline-primary btn-sm-square me-2 rounded-circle"
                                    href="{{ $settings['social_instagram'] }}"><i class="fab fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="col-md-6 col-lg-3">
                <div class="footer-item">
                    <h5 class="text-primary mb-4 fw-bold">Danh Mục</h5>
                    <div class="d-flex flex-column align-items-start gap-2">
                        <a href="/" class="text-muted text-decoration-none transition-hover"><i
                                class="fas fa-chevron-right text-primary me-2 small"></i>Trang chủ</a>
                        <a href="#about" class="text-muted text-decoration-none transition-hover"><i
                                class="fas fa-chevron-right text-primary me-2 small"></i>Về chúng tôi</a>
                        <a href="#classes" class="text-muted text-decoration-none transition-hover"><i
                                class="fas fa-chevron-right text-primary me-2 small"></i>Chương trình học</a>
                        <a href="#teachers" class="text-muted text-decoration-none transition-hover"><i
                                class="fas fa-chevron-right text-primary me-2 small"></i>Đội ngũ giáo viên</a>
                    </div>
                </div>
            </div>

            <!-- Col 3: Map -->
            <div class="col-md-12 col-lg-6">
                <div class="footer-item">
                    <h5 class="text-primary mb-4 fw-bold">Bản Đồ</h5>
                    @if (isset($settings['google_maps']) && $settings['google_maps'])
                        <div class="rounded-3 overflow-hidden border border-white shadow-sm"
                            style="width: 100%; height: 220px;">
                            {!! $settings['google_maps'] !!}
                        </div>
                    @else
                        <p class="text-muted small">Chưa có bản đồ.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
