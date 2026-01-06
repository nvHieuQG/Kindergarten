@extends('admin.layouts.app')

@section('title', 'Cấu hình Website')
@section('page-title', 'Cấu hình Website')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2 text-primary"></i>Thông tin Về Chúng Tôi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="about_title" class="form-label">Tiêu đề giới thiệu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('about_title') is-invalid @enderror" id="about_title" name="about_title" value="{{ old('about_title', $settings['about_title'] ?? '') }}" required>
                        @error('about_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="about_content" class="form-label">Nội dung giới thiệu <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('about_content') is-invalid @enderror" id="about_content" name="about_content" rows="6" required>{{ old('about_content', $settings['about_content'] ?? '') }}</textarea>
                        @error('about_content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hero_image" class="form-label">Hình ảnh Banner (Trang chủ)</label>
                        <input type="file" class="form-control @error('hero_image') is-invalid @enderror" id="hero_image" name="hero_image" accept="image/*">
                        <div class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i> Để ảnh hiển thị đẹp và sắc nét, vui lòng chọn ảnh có độ phân giải tối thiểu <strong>1920x1080 pixels</strong>.
                        </div>
                        @if(isset($settings['hero_image']) && $settings['hero_image'])
                            <div class="mt-2">
                                <p class="mb-1 text-muted">Hình ảnh hiện tại:</p>
                                <img src="{{ asset('storage/' . $settings['hero_image']) }}" alt="Hero Image" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        @endif
                        @error('hero_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">
                    <h5 class="mb-3"><i class="fas fa-address-card me-2 text-primary"></i>Thông tin liên hệ</h5>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="site_address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="site_address" name="site_address" value="{{ old('site_address', $settings['site_address'] ?? '') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="site_phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="site_phone" name="site_phone" value="{{ old('site_phone', $settings['site_phone'] ?? '') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="site_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="site_email" name="site_email" value="{{ old('site_email', $settings['site_email'] ?? '') }}">
                        </div>
                    </div>

                    <hr class="my-4">
                    <h5 class="mb-3"><i class="fas fa-share-alt me-2 text-primary"></i>Mạng xã hội</h5>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="social_facebook" class="form-label"><i class="fab fa-facebook text-primary me-1"></i> Facebook</label>
                            <input type="url" class="form-control" id="social_facebook" name="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" placeholder="https://facebook.com/...">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="social_youtube" class="form-label"><i class="fab fa-youtube text-danger me-1"></i> Youtube</label>
                            <input type="url" class="form-control" id="social_youtube" name="social_youtube" value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}" placeholder="https://youtube.com/...">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="social_instagram" class="form-label"><i class="fab fa-instagram text-danger me-1"></i> Instagram</label>
                            <input type="url" class="form-control" id="social_instagram" name="social_instagram" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}" placeholder="https://instagram.com/...">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Lưu cấu hình
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
