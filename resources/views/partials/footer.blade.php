<div class="container-fluid footer py-5 mt-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="footer-item">
                    <h4 class="fw-bold mb-3 text-primary">Hoa Hướng Dương</h4>
                    <p class="mb-4">Chúng tôi cung cấp môi trường giáo dục tốt nhất cho con bạn. Hãy để chúng tôi đồng hành cùng sự phát triển của bé.</p>
                    <div class="border border-primary p-3 rounded bg-light">
                        <h5 class="mb-3">Bản tin</h5>
                        <div class="position-relative mx-auto border border-primary rounded" style="max-width: 400px;">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Email của bạn">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2 text-white">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="footer-item">
                    <div class="d-flex flex-column p-4 ps-5 text-dark border border-primary" 
                    style="border-radius: 50% 20% / 10% 40%;">
                        <p>Thứ Hai: 8am đến 5pm</p>
                        <p>Thứ Ba: 8am đến 5pm</p>
                        <p>Thứ Tư: 8am đến 5pm</p>
                        <p>Thứ Năm: 8am đến 5pm</p>
                        <p>Thứ Sáu: 8am đến 5pm</p>
                        <p>Thứ Bảy: 8am đến 5pm</p>
                        <p class="mb-0">Chủ Nhật: Đóng cửa</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="footer-item">
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">ĐỊA CHỈ</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a href="" class="text-body mb-4"><i class="fa fa-map-marker-alt text-primary me-2"></i> {{ $settings['site_address'] ?? '104 Tháp Bắc, New York, USA' }}</a>
                        <a href="" class="text-start rounded-0 text-body mb-4"><i class="fa fa-phone-alt text-primary me-2"></i> {{ $settings['site_phone'] ?? '(+012) 3456 7890 123' }}</a>
                        <a href="" class="text-start rounded-0 text-body mb-4"><i class="fas fa-envelope text-primary me-2"></i> {{ $settings['site_email'] ?? 'exampleemail@gmail.com' }}</a>
                        <a href="" class="text-start rounded-0 text-body mb-4"><i class="fa fa-clock text-primary me-2"></i> Dịch vụ 26/7</a>
                        <div class="footer-icon d-flex">
                            @if(isset($settings['social_facebook'])) <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href="{{ $settings['social_facebook'] }}"><i class="fab fa-facebook-f"></i></a> @endif
                            @if(isset($settings['social_youtube'])) <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href="{{ $settings['social_youtube'] }}"><i class="fab fa-youtube"></i></a> @endif
                            @if(isset($settings['social_instagram'])) <a href="{{ $settings['social_instagram'] }}" class="btn btn-primary btn-sm-square me-3 rounded-circle text-white"><i class="fab fa-instagram"></i></a> @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="footer-item">
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">THƯ VIỆN ẢNH</h4>
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="footer-galary-img rounded-circle border border-primary">
                                <img src="{{ asset('assets/img/galary-1.jpg') }}" class="img-fluid rounded-circle p-2" alt="">
                            </div>
                       </div>
                       <div class="col-4">
                            <div class="footer-galary-img rounded-circle border border-primary">
                                <img src="{{ asset('assets/img/galary-2.jpg') }}" class="img-fluid rounded-circle p-2" alt="">
                            </div>
                       </div>
                        <div class="col-4">
                            <div class="footer-galary-img rounded-circle border border-primary">
                                <img src="{{ asset('assets/img/galary-3.jpg') }}" class="img-fluid rounded-circle p-2" alt="">
                            </div>
                       </div>
                        <div class="col-4">
                            <div class="footer-galary-img rounded-circle border border-primary">
                                <img src="{{ asset('assets/img/galary-4.jpg') }}" class="img-fluid rounded-circle p-2" alt="">
                            </div>
                       </div>
                        <div class="col-4">
                            <div class="footer-galary-img rounded-circle border border-primary">
                                <img src="{{ asset('assets/img/galary-5.jpg') }}" class="img-fluid rounded-circle p-2" alt="">
                            </div>
                       </div>
                        <div class="col-4">
                            <div class="footer-galary-img rounded-circle border border-primary">
                                <img src="{{ asset('assets/img/galary-6.jpg') }}" class="img-fluid rounded-circle p-2" alt="">
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<div class="container-fluid copyright py-4" style="background: #111;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>{{ $settings['site_name'] ?? 'Hoa Hướng Dương' }}</a>, {{ date('Y') }}. Mọi quyền được bảo lưu.</span>
            </div>
            <div class="col-md-6 my-auto text-center text-md-end text-white">
                Chuyên nghiệp - Tận tâm - Yêu thương
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->
