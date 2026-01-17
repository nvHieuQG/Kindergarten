@extends('admin.layouts.app')

@section('title', 'Bảng điều khiển')
@section('page-title', 'Bảng điều khiển')

@section('content')
    <div class="row g-4 mb-5 animate-up">
        <div class="col-12">
            <div
                class="p-4 rounded-4 bg-white border border-primary border-opacity-10 shadow-sm d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="fw-bold mb-1">Chào mừng trở lại, {{ auth()->user()->name }}! 👋</h3>
                    <p class="text-muted mb-0">Hôm nay là {{ now()->translatedFormat('l, d/m/Y') }}. Đây là tóm tắt tình hình
                        nhà trường.</p>
                </div>
                <div class="d-none d-md-block">
                    <a href="{{ route('home') }}" target="_blank"
                        class="btn btn-outline-primary fw-semibold px-4 rounded-pill">
                        <i class="fas fa-external-link-alt me-2"></i>Xem trang chủ
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <!-- Posts Stats -->
        <div class="col-md-6 col-lg-3 animate-up" style="animation-delay: 0.1s">
            <div class="stat-card">
                <div class="stat-icon-wrapper bg-primary bg-opacity-10 text-primary">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="text-muted small fw-semibold text-uppercase letter-spacing-1 mb-1">Bài viết</div>
                <h2 class="fw-bold mb-2">{{ $stats['total_posts'] }}</h2>
                <div class="d-flex align-items-center">
                    <span
                        class="badge bg-success bg-opacity-10 text-success small border-0 me-2">{{ $stats['published_posts'] }}</span>
                    <span class="text-muted small">Đã xuất bản</span>
                </div>
            </div>
        </div>

        <!-- Teachers Stats -->
        <div class="col-md-6 col-lg-3 animate-up" style="animation-delay: 0.2s">
            <div class="stat-card">
                <div class="stat-icon-wrapper bg-success bg-opacity-10 text-success">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="text-muted small fw-semibold text-uppercase letter-spacing-1 mb-1">Giáo viên</div>
                <h2 class="fw-bold mb-2">{{ $stats['total_teachers'] }}</h2>
                <div class="d-flex align-items-center">
                    <span
                        class="badge bg-success bg-opacity-10 text-success small border-0 me-2">{{ $stats['active_teachers'] }}</span>
                    <span class="text-muted small">Đang công tác</span>
                </div>
            </div>
        </div>

        <!-- Enrollments Stats -->
        <div class="col-md-6 col-lg-3 animate-up" style="animation-delay: 0.3s">
            <div class="stat-card">
                <div class="stat-icon-wrapper bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-id-card"></i>
                </div>
                <div class="text-muted small fw-semibold text-uppercase letter-spacing-1 mb-1">Yêu cầu tư vấn</div>
                <h2 class="fw-bold mb-2">{{ $stats['total_enrollments'] }}</h2>
                <div class="d-flex align-items-center">
                    <span
                        class="badge bg-warning bg-opacity-10 text-warning small border-0 me-2">{{ $stats['pending_enrollments'] }}</span>
                    <span class="text-muted small">Đang chờ xử lý</span>
                </div>
            </div>
        </div>

        <!-- Contacts Stats -->
        <div class="col-md-6 col-lg-3 animate-up" style="animation-delay: 0.4s">
            <div class="stat-card">
                <div class="stat-icon-wrapper bg-danger bg-opacity-10 text-danger">
                    <i class="fas fa-comment-dots"></i>
                </div>
                <div class="text-muted small fw-semibold text-uppercase letter-spacing-1 mb-1">Tin nhắn mới</div>
                <h2 class="fw-bold mb-2">{{ $stats['unread_contacts'] }}</h2>
                <div class="d-flex align-items-center">
                    <span
                        class="badge bg-danger bg-opacity-10 text-danger small border-0 me-2">{{ $stats['total_contacts'] }}</span>
                    <span class="text-muted small">Tổng số tin nhắn</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Enrollments -->
        <div class="col-lg-8 animate-up" style="animation-delay: 0.5s">
            <div class="card border-0 shadow-sm h-100">
                <div
                    class="card-header bg-white border-bottom border-light py-3 d-flex align-items-center justify-content-between">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-id-card me-2 text-primary"></i>Yêu cầu tư vấn mới nhất</h6>
                    <a href="{{ route('admin.enrollments.index') }}"
                        class="btn btn-sm btn-light text-primary fw-semibold rounded-pill px-3">Xem tất cả</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Tên Trẻ / Phụ Huynh</th>
                                    <th>Số điện thoại</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentEnrollments as $enrollment)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">{{ $enrollment->child_name }}</div>
                                            <div class="text-muted small">PH: {{ $enrollment->parent_name }}</div>
                                        </td>
                                        <td>{{ $enrollment->parent_phone }}</td>
                                        <td>
                                            @php
                                                $statusClasses = [
                                                    'pending' => 'bg-warning bg-opacity-10 text-warning border-0',
                                                    'reviewing' => 'bg-info bg-opacity-10 text-info border-0',
                                                    'approved' => 'bg-success bg-opacity-10 text-success border-0',
                                                    'rejected' => 'bg-danger bg-opacity-10 text-danger border-0',
                                                ];
                                                $statusTexts = [
                                                    'pending' => 'Chờ duyệt',
                                                    'reviewing' => 'Đang xem xét',
                                                    'approved' => 'Đã duyệt',
                                                    'rejected' => 'Từ chối',
                                                ];
                                            @endphp
                                            <span
                                                class="badge {{ $statusClasses[$enrollment->status] ?? 'bg-secondary' }}">
                                                {{ $statusTexts[$enrollment->status] ?? $enrollment->status }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.enrollments.show', $enrollment) }}"
                                                class="btn btn-icon btn-light btn-sm rounded-circle">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <div class="mb-2"><i class="fas fa-folder-open fa-3x opacity-20"></i></div>
                                            Chưa có yêu cầu tư vấn nào
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="col-lg-4 animate-up" style="animation-delay: 0.6s">
            <div class="card border-0 shadow-sm h-100">
                <div
                    class="card-header bg-white border-bottom border-light py-3 d-flex align-items-center justify-content-between">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-newspaper me-2 text-success"></i>Tin tức vừa đăng</h6>
                    <a href="{{ route('admin.posts.index') }}"
                        class="btn btn-sm btn-light text-success fw-semibold rounded-pill px-3">Tất cả</a>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse($recentPosts as $post)
                            <div class="list-group-item border-light py-3">
                                <div class="d-flex w-100 justify-content-between mb-1">
                                    <h6 class="mb-1 fw-semibold text-truncate" style="max-width: 200px;">
                                        {{ $post->title }}</h6>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span
                                        class="badge {{ $post->status == 'published' ? 'bg-success' : 'bg-warning' }} bg-opacity-10 text-{{ $post->status == 'published' ? 'success' : 'warning' }} border-0 px-2 py-1 small">
                                        {{ $post->status == 'published' ? 'Công khai' : 'Bản nháp' }}
                                    </span>
                                    <a href="{{ route('admin.posts.edit', $post) }}"
                                        class="text-primary small fw-semibold text-decoration-none">Chỉnh sửa</a>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 text-center text-muted">
                                Chưa có bài viết nào.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
