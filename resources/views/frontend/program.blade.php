@extends('layouts.babycare')

@section('title', 'Chương trình học - Hoa Hướng Dương')

@section('content')
    <x-page-header title="Chương trình học" active="Chương trình" />

    <!-- Program Start -->
    <div class="container-fluid program py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Chương trình đào tạo</h4>
                <h1 class="mb-5 display-3">Môi trường phát triển toàn diện</h1>
            </div>
            
            <div class="row g-5">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="program-item rounded bg-light p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="btn-lg-square bg-primary text-white rounded-circle"><i class="fa fa-baby"></i></div>
                            <h4 class="ms-3 mb-0">Lớp Nhà Trẻ</h4>
                        </div>
                        <p>Dành cho bé từ 12 - 36 tháng tuổi. Tập trung vào việc rèn luyện thói quen tự lập cơ bản và kỹ năng vận động tinh.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="program-item rounded bg-light p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="btn-lg-square bg-secondary text-white rounded-circle"><i class="fa fa-palette"></i></div>
                            <h4 class="ms-3 mb-0">Lớp Nghệ Thuật</h4>
                        </div>
                        <p>Kích thích sự sáng tạo thông qua hội họa, thủ công và các hoạt động tạo hình sinh động.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="program-item rounded bg-light p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="btn-lg-square bg-primary text-white rounded-circle"><i class="fa fa-music"></i></div>
                            <h4 class="ms-3 mb-0">Lớp Âm Nhạc</h4>
                        </div>
                        <p>Giúp bé cảm thụ âm nhạc, phát triển thính giác và sự tự tin thông qua các bài hát và trò chơi âm nhạc.</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <p class="mb-4">Bạn cần thêm thông tin về lịch học và lộ trình giáo dục?</p>
                <a href="{{ route('contact') }}" class="btn btn-primary px-5 py-3 btn-border-radius">Liên hệ tư vấn</a>
            </div>
        </div>
    </div>
    <!-- Program End -->
@endsection
