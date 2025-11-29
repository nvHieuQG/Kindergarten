@extends('layouts.babycare')

@section('title', 'Tuyển sinh - BabyCare')

@section('content')
    <x-page-header title="Tuyển sinh" active="Tuyển sinh" />

<!-- Enrollment Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Tuyển sinh</h4>
            <h1 class="mb-5 display-3">Tham gia lớp học của chúng tôi</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                <p class="text-center mb-5">Vui lòng điền vào biểu mẫu bên dưới để đăng ký cho con bạn tham gia các chương trình của chúng tôi. Chúng tôi sẽ liên hệ với bạn sớm để xác nhận chi tiết.</p>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('enrollment.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tên trẻ</label>
                            <input type="text" name="child_name" class="form-control border py-3" placeholder="Tên trẻ" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ngày sinh</label>
                            <input type="date" name="child_dob" class="form-control border py-3" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Giới tính</label>
                            <select name="child_gender" class="form-select border py-3" required>
                                <option value="" selected disabled>Chọn giới tính</option>
                                <option value="male">Nam</option>
                                <option value="female">Nữ</option>
                                <option value="other">Khác</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Chương trình quan tâm</label>
                            <select name="program" class="form-select border py-3">
                                <option value="" selected disabled>Chọn chương trình</option>
                                <option value="Baby Care">Chăm sóc trẻ</option>
                                <option value="English Class">Lớp tiếng Anh</option>
                                <option value="Art Class">Lớp nghệ thuật</option>
                                <option value="Music Class">Lớp âm nhạc</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tên phụ huynh</label>
                            <input type="text" name="parent_name" class="form-control border py-3" placeholder="Tên phụ huynh" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Số điện thoại phụ huynh</label>
                            <input type="tel" name="parent_phone" class="form-control border py-3" placeholder="Số điện thoại phụ huynh" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" name="address" class="form-control border py-3" placeholder="Địa chỉ">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tin nhắn bổ sung</label>
                            <textarea name="message" class="form-control border" rows="5" placeholder="Bất kỳ yêu cầu đặc biệt hoặc câu hỏi nào?"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary w-100 py-3 btn-border-radius" type="submit">Gửi đăng ký</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Enrollment End -->
@endsection
