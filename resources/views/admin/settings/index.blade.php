@extends('admin.layouts.app')

@section('title', 'Cấu hình Website')
@section('page-title', 'Cấu hình Website')

@section('content')
    <div class="row animate-up">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <!-- Header Section -->
                <div class="card-header bg-white border-bottom border-light p-0">
                    <div class="p-4 d-flex align-items-center justify-content-between bg-primary bg-opacity-10">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon-wrapper bg-white text-primary mb-0 me-3 shadow-sm"
                                style="width: 48px; height: 48px;">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-0 text-dark">Thiết lập hệ thống</h4>
                                <p class="text-muted small mb-0">Quản lý toàn bộ thông tin hiển thị và cấu hình kĩ thuật</p>
                            </div>
                        </div>
                    </div>

                    <!-- Modern Horizontal Tabs -->
                    <ul class="nav nav-tabs custom-modern-tabs px-4 border-0 bg-white" id="settingTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                                type="button" role="tab">
                                <i class="fas fa-id-card me-2"></i>Chung & Liên hệ
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="hero-tab" data-bs-toggle="tab" data-bs-target="#hero"
                                type="button" role="tab">
                                <i class="fas fa-tv me-2"></i>Trang Chủ (Hero)
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about"
                                type="button" role="tab">
                                <i class="fas fa-info-circle me-2"></i>Về Chúng Tôi
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other"
                                type="button" role="tab">
                                <i class="fas fa-images me-2"></i>Thống kê & Thư viện
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-0 bg-light bg-opacity-50">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab-content" id="settingTabsContent">
                            <!-- Tab 1: General & Contact -->
                            <div class="tab-pane fade show active p-4 p-md-5" id="general" role="tabpanel">
                                <div class="row g-4">
                                    <div class="col-lg-7">
                                        <div class="settings-block bg-white p-4 rounded-4 shadow-sm h-100">
                                            <h6 class="fw-bold text-dark mb-4 d-flex align-items-center">
                                                <span class="bg-primary bg-opacity-10 p-2 rounded-3 me-2"><i
                                                        class="fas fa-globe text-primary small"></i></span>
                                                Thông tin cơ bản
                                            </h6>
                                            <div class="mb-4">
                                                <label
                                                    class="form-label small fw-bold text-secondary text-uppercase letter-spacing-1">Tên
                                                    Trường / Website</label>
                                                <input type="text" class="form-control premium-input shadow-none"
                                                    name="site_name"
                                                    value="{{ old('site_name', $settings['site_name'] ?? '') }}" required>
                                            </div>
                                            <div class="mb-0">
                                                <label
                                                    class="form-label small fw-bold text-secondary text-uppercase letter-spacing-1">Google
                                                    Maps Iframe</label>
                                                <textarea class="form-control premium-input shadow-none font-monospace" name="google_maps" rows="5"
                                                    style="font-size: 0.8rem;">{{ old('google_maps', $settings['google_maps'] ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="settings-block bg-white p-4 rounded-4 shadow-sm h-100">
                                            <h6 class="fw-bold text-dark mb-4 d-flex align-items-center">
                                                <span class="bg-primary bg-opacity-10 p-2 rounded-3 me-2"><i
                                                        class="fas fa-phone-alt text-primary small"></i></span>
                                                Kênh liên hệ chính
                                            </h6>
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-secondary text-uppercase">Số
                                                    điện thoại</label>
                                                <input type="text" class="form-control premium-input shadow-none"
                                                    name="site_phone"
                                                    value="{{ old('site_phone', $settings['site_phone'] ?? '') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    class="form-label small fw-bold text-secondary text-uppercase">Email</label>
                                                <input type="email" class="form-control premium-input shadow-none"
                                                    name="site_email"
                                                    value="{{ old('site_email', $settings['site_email'] ?? '') }}">
                                            </div>
                                            <div class="mb-0">
                                                <label class="form-label small fw-bold text-secondary text-uppercase">Địa
                                                    chỉ trụ sở</label>
                                                <textarea class="form-control premium-input shadow-none" name="site_address" rows="2">{{ old('site_address', $settings['site_address'] ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="settings-block bg-white p-4 rounded-4 shadow-sm mt-2">
                                            <h6 class="fw-bold text-dark mb-4 d-flex align-items-center">
                                                <span class="bg-primary bg-opacity-10 p-2 rounded-3 me-2"><i
                                                        class="fas fa-hashtag text-primary small"></i></span>
                                                Mạng xã hội & Tương tác
                                            </h6>
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label
                                                        class="form-label small fw-bold text-secondary text-uppercase"><i
                                                            class="fab fa-facebook text-primary me-1"></i>Facebook</label>
                                                    <input type="url" class="form-control premium-input shadow-none"
                                                        name="social_facebook"
                                                        value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label
                                                        class="form-label small fw-bold text-secondary text-uppercase"><i
                                                            class="fab fa-youtube text-danger me-1"></i>Youtube</label>
                                                    <input type="url" class="form-control premium-input shadow-none"
                                                        name="social_youtube"
                                                        value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label
                                                        class="form-label small fw-bold text-secondary text-uppercase"><i
                                                            class="fab fa-instagram text-info me-1"></i>Instagram</label>
                                                    <input type="url" class="form-control premium-input shadow-none"
                                                        name="social_instagram"
                                                        value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label
                                                        class="form-label small fw-bold text-secondary text-uppercase"><i
                                                            class="fas fa-comment-dots text-success me-1"></i>Zalo
                                                        Number</label>
                                                    <input type="text" class="form-control premium-input shadow-none"
                                                        name="zalo_number"
                                                        value="{{ old('zalo_number', $settings['zalo_number'] ?? '') }}">
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <label
                                                        class="form-label small fw-bold text-secondary text-uppercase">Facebook
                                                        Page ID (Để hiển thị Chat Messenger & Fanpage Widget)</label>
                                                    <input type="text" class="form-control premium-input shadow-none"
                                                        name="facebook_page_id"
                                                        value="{{ old('facebook_page_id', $settings['facebook_page_id'] ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 2: Hero Section -->
                            <div class="tab-pane fade p-4 p-md-5" id="hero" role="tabpanel">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div
                                            class="settings-block bg-white p-4 rounded-4 shadow-sm h-100 border-start border-4 border-primary">
                                            <h6 class="fw-bold text-dark mb-4">Nội dung văn bản</h6>
                                            <div class="mb-4">
                                                <label class="form-label small fw-bold text-secondary text-uppercase">Tiêu
                                                    đề chính (Title)</label>
                                                <input type="text"
                                                    class="form-control premium-input shadow-none border-primary border-opacity-10 fw-bold"
                                                    name="hero_title"
                                                    value="{{ old('hero_title', $settings['hero_title'] ?? '') }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label small fw-bold text-secondary text-uppercase">Tiêu
                                                    đề phụ (Subtitle)</label>
                                                <textarea class="form-control premium-input shadow-none" name="hero_subtitle" rows="3">{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                                            </div>
                                            <div class="mb-0">
                                                <label class="form-label small fw-bold text-secondary text-uppercase">Tiêu
                                                    đề Form Đăng ký</label>
                                                <input type="text" class="form-control premium-input shadow-none"
                                                    name="hero_form_title"
                                                    value="{{ old('hero_form_title', $settings['hero_form_title'] ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="settings-block bg-white p-4 rounded-4 shadow-sm h-100">
                                            <h6 class="fw-bold text-dark mb-4">Ảnh nền biểu ngữ</h6>
                                            <div
                                                class="image-upload-wrapper p-3 rounded-4 border-2 border-dashed border-light text-center bg-light bg-opacity-50">
                                                <div class="image-preview-wrapper mb-3">
                                                    @if (isset($settings['hero_image']))
                                                        <img src="{{ asset('storage/' . $settings['hero_image']) }}"
                                                            class="img-fluid rounded-3 shadow-sm border border-white border-4 preview-image"
                                                            style="max-height: 200px;">
                                                    @else
                                                        <div class="py-5 text-muted opacity-25">
                                                            <i class="fas fa-image fa-4x"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="px-5">
                                                    <input type="file"
                                                        class="form-control premium-input bg-white shadow-none preview-input"
                                                        name="hero_image" data-preview="hero" accept="image/*">
                                                    <p class="text-muted extra-small mt-2 mb-0">Tỉ lệ khuyên dùng 16:9 (Vd:
                                                        1920x1080px)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 3: About Us -->
                            <div class="tab-pane fade p-4 p-md-5" id="about" role="tabpanel">
                                <div
                                    class="settings-block bg-white p-4 rounded-4 shadow-sm border-start border-4 border-primary mb-4">
                                    <h6 class="fw-bold text-dark mb-4">Nội dung giới thiệu chi tiết</h6>
                                    <div class="mb-4">
                                        <label class="form-label small fw-bold text-secondary text-uppercase">Tiêu đề (Giới
                                            thiệu)</label>
                                        <input type="text" class="form-control premium-input shadow-none"
                                            name="about_title"
                                            value="{{ old('about_title', $settings['about_title'] ?? '') }}" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label small fw-bold text-secondary text-uppercase">Nội dung văn
                                            bản</label>
                                        <textarea class="form-control premium-input shadow-none" name="about_content" rows="10" required>{{ old('about_content', $settings['about_content'] ?? '') }}</textarea>
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label small fw-bold text-secondary text-uppercase"><i
                                                class="fab fa-youtube text-danger me-1"></i>Link Video giới thiệu (ID
                                            Youtube)</label>
                                        <input type="url" class="form-control premium-input shadow-none"
                                            name="about_video"
                                            value="{{ old('about_video', $settings['about_video'] ?? '') }}"
                                            placeholder="https://www.youtube.com/watch?v=...">
                                    </div>
                                </div>

                                <div class="settings-block bg-white p-4 rounded-4 shadow-sm mt-4">
                                    <h6 class="fw-bold text-dark mb-4">Danh sách đặc điểm nổi bật (6 điểm)</h6>
                                    <div class="row g-3">
                                        @for ($i = 1; $i <= 6; $i++)
                                            <div class="col-md-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2 fw-bold text-primary opacity-50">#{{ $i }}
                                                    </div>
                                                    <input type="text" name="about_feature_{{ $i }}"
                                                        class="form-control premium-input shadow-none"
                                                        placeholder="Nhập đặc điểm..."
                                                        value="{{ old('about_feature_' . $i, $settings['about_feature_' . $i] ?? '') }}">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 4: Other Settings & Gallery -->
                            <div class="tab-pane fade p-4 p-md-5" id="other" role="tabpanel">
                                <h6 class="fw-bold text-dark mb-4"><i class="fas fa-chart-line text-primary me-2"></i>Số
                                    liệu thống kê chân trang</h6>
                                <div class="row g-4 mb-5">
                                    <div class="col-md-3">
                                        <div
                                            class="stat-edit-card p-4 rounded-4 bg-white shadow-sm text-center border-bottom border-4 border-primary">
                                            <label class="text-uppercase small fw-bold text-muted mb-3 d-block">Năm kinh
                                                nghiệm</label>
                                            <input type="number"
                                                class="form-control premium-input shadow-none text-center fw-bold fs-4"
                                                name="stats_exp"
                                                value="{{ old('stats_exp', $settings['stats_exp'] ?? 10) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div
                                            class="stat-edit-card p-4 rounded-4 bg-white shadow-sm text-center border-bottom border-4 border-primary">
                                            <label class="text-uppercase small fw-bold text-muted mb-3 d-block">Số giáo
                                                viên</label>
                                            <input type="number"
                                                class="form-control premium-input shadow-none text-center fw-bold fs-4"
                                                name="stats_teachers"
                                                value="{{ old('stats_teachers', $settings['stats_teachers'] ?? 50) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div
                                            class="stat-edit-card p-4 rounded-4 bg-white shadow-sm text-center border-bottom border-4 border-primary">
                                            <label class="text-uppercase small fw-bold text-muted mb-3 d-block">Số học
                                                sinh</label>
                                            <input type="number"
                                                class="form-control premium-input shadow-none text-center fw-bold fs-4"
                                                name="stats_students"
                                                value="{{ old('stats_students', $settings['stats_students'] ?? 500) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div
                                            class="stat-edit-card p-4 rounded-4 bg-white shadow-sm text-center border-bottom border-4 border-primary">
                                            <label class="text-uppercase small fw-bold text-muted mb-3 d-block">% Hài
                                                lòng</label>
                                            <input type="number"
                                                class="form-control premium-input shadow-none text-center fw-bold fs-4"
                                                name="stats_satisfaction"
                                                value="{{ old('stats_satisfaction', $settings['stats_satisfaction'] ?? 100) }}">
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-5 opacity-10">

                                <h6 class="fw-bold text-dark mb-4"><i
                                        class="fas fa-camera-retro text-primary me-2"></i>Thư viện ảnh chân trang (6 ảnh)
                                </h6>
                                <div class="row g-3">
                                    @for ($i = 1; $i <= 6; $i++)
                                        <div class="col-md-4">
                                            <div class="bg-white p-3 rounded-4 shadow-sm h-100">
                                                <div class="mb-3 rounded-3 overflow-hidden bg-light text-center d-flex align-items-center justify-content-center image-preview-wrapper"
                                                    style="height: 120px;">
                                                    @if (isset($settings['gallery_image_' . $i]))
                                                        <img src="{{ asset('storage/' . $settings['gallery_image_' . $i]) }}"
                                                            class="img-fluid h-100 w-100 object-fit-cover shadow-sm border border-white border-2 preview-image">
                                                    @else
                                                        <i class="fas fa-image fa-3x text-muted opacity-25"></i>
                                                    @endif
                                                </div>
                                                <label class="small text-muted mb-2 d-block">CHỌN ẢNH
                                                    #{{ $i }}</label>
                                                <input type="file"
                                                    class="form-control premium-input shadow-none preview-input"
                                                    name="gallery_image_{{ $i }}" accept="image/*">
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <!-- Floating Sticky Bottom Actions -->
                        <div
                            class="bg-white p-4 px-5 border-top d-flex justify-content-between align-items-center shadow-lg">
                            <div class="text-muted small">
                                <i class="fas fa-info-circle me-1 text-primary"></i> Đã thực hiện thay đổi? Hãy nhấn lưu để
                                áp dụng.
                            </div>
                            <button type="submit"
                                class="btn btn-primary px-5 py-3 fw-bold rounded-pill shadow-sm transition-all hover-scale">
                                <i class="fas fa-save me-2"></i>LƯU TẤT CẢ TÙY CHỈNH
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Premium Input Styling - Visible & Clean */
        .premium-input {
            background-color: #ffffff;
            /* White background for better contrast */
            border: 2px solid #e2e8f0;
            /* Clearly visible border */
            padding: 0.75rem 1rem;
            border-radius: 12px;
            color: #1e293b;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-input:focus {
            background-color: #ffffff;
            border-color: var(--primary);
            /* Highlight on focus */
            box-shadow: 0 0 0 5px rgba(245, 158, 11, 0.1) !important;
            outline: none;
        }

        /* Keep background subtle for labels or blocks if needed */
        .bg-light-subtle {
            background-color: #f8fafc;
        }

        /* Tabs Custom Styling */
        .custom-modern-tabs .nav-link {
            padding: 1.5rem 2rem;
            color: #64748b;
            font-weight: 600;
            border: none;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .custom-modern-tabs .nav-link:hover {
            color: var(--primary);
            background-color: rgba(245, 158, 11, 0.05);
        }

        .custom-modern-tabs .nav-link.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
            background: transparent;
        }

        /* Additional UI Refinements */
        .settings-block {
            border-radius: 20px;
        }

        .letter-spacing-1 {
            letter-spacing: 0.05rem;
        }

        .extra-small {
            font-size: 0.7rem;
        }

        .hover-scale:hover {
            transform: scale(1.02);
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .animate-up {
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        document.querySelectorAll('.preview-input').forEach(input => {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    const container = this.closest('.settings-block, .bg-white').querySelector(
                        '.image-preview-wrapper');

                    reader.onload = function(e) {
                        let img = container.querySelector('.preview-image');

                        // Create image element if it doesn't exist
                        if (!img) {
                            img = document.createElement('img');
                            img.className =
                                'img-fluid rounded-3 shadow-sm border border-white border-2 preview-image';

                            // Apply specific styles based on container type
                            if (container.style.height === '120px') {
                                img.classList.add('h-100', 'w-100', 'object-fit-cover');
                            } else {
                                img.style.maxHeight = '200px';
                                img.classList.add('border-4');
                            }

                            container.innerHTML = '';
                            container.appendChild(img);
                        }

                        img.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
