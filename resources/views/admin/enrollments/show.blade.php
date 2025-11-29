@extends('admin.layouts.app')

@section('title', 'Chi tiết đăng ký')
@section('page-title', 'Chi tiết đăng ký')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Thông tin trẻ</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Tên trẻ</label>
                        <p>{{ $enrollment->child_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Ngày sinh</label>
                        <p>{{ $enrollment->child_dob ? \Carbon\Carbon::parse($enrollment->child_dob)->format('M d, Y') : 'N/A' }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Giới tính</label>
                        <p>{{ $enrollment->child_gender == 'male' ? 'Nam' : ($enrollment->child_gender == 'female' ? 'Nữ' : 'Khác') }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Chương trình quan tâm</label>
                        <p>{{ $enrollment->program ?? 'Đăng ký chung' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Thông tin phụ huynh</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Tên phụ huynh</label>
                        <p>{{ $enrollment->parent_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Số điện thoại</label>
                        <p><a href="tel:{{ $enrollment->parent_phone }}">{{ $enrollment->parent_phone }}</a></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Email</label>
                        <p><a href="mailto:{{ $enrollment->parent_email }}">{{ $enrollment->parent_email }}</a></p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Địa chỉ</label>
                        <p>{{ $enrollment->address }}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="fw-bold text-muted">Tin nhắn/Ghi chú</label>
                    <p class="bg-light p-3 rounded">{{ $enrollment->message ?? 'Không có tin nhắn.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Trạng thái & Hành động</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.enrollments.status', $enrollment) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label">Trạng thái hiện tại</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $enrollment->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="reviewing" {{ $enrollment->status == 'reviewing' ? 'selected' : '' }}>Đang xem xét</option>
                            <option value="approved" {{ $enrollment->status == 'approved' ? 'selected' : '' }}>Đã duyệt</option>
                            <option value="rejected" {{ $enrollment->status == 'rejected' ? 'selected' : '' }}>Từ chối</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ghi chú của quản trị viên</label>
                        <textarea name="admin_notes" class="form-control" rows="4" placeholder="Ghi chú nội bộ...">{{ $enrollment->admin_notes }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Cập nhật trạng thái</button>
                </form>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('admin.enrollments.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Quay lại danh sách
            </a>
        </div>
    </div>
</div>
@endsection
