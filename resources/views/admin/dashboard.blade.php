@extends('admin.layouts.app')

@section('title', 'Bảng điều khiển')
@section('page-title', 'Bảng điều khiển')

@section('content')
<div class="row g-4 mb-4">
    <!-- Posts Stats -->
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small mb-1">Tổng số bài viết</div>
                    <h3 class="mb-0">{{ $stats['total_posts'] }}</h3>
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> {{ $stats['published_posts'] }} đã xuất bản
                    </small>
                </div>
                <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Teachers Stats -->
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small mb-1">Tổng số giáo viên</div>
                    <h3 class="mb-0">{{ $stats['total_teachers'] }}</h3>
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> {{ $stats['active_teachers'] }} đang hoạt động
                    </small>
                </div>
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Enrollments Stats -->
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small mb-1">Tuyển sinh</div>
                    <h3 class="mb-0">{{ $stats['total_enrollments'] }}</h3>
                    <small class="text-warning">
                        <i class="fas fa-clock"></i> {{ $stats['pending_enrollments'] }} đang chờ
                    </small>
                </div>
                <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Contacts Stats -->
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small mb-1">Liên hệ</div>
                    <h3 class="mb-0">{{ $stats['total_contacts'] }}</h3>
                    <small class="text-danger">
                        <i class="fas fa-envelope"></i> {{ $stats['unread_contacts'] }} chưa đọc
                    </small>
                </div>
                <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Items -->
<div class="row g-4">
    <!-- Recent Posts -->
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0"><i class="fas fa-newspaper me-2 text-primary"></i>Bài viết gần đây</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 table-responsive-stack">
                        <thead class="table-light">
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Trạng thái</th>
                                <th>Ngày</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPosts as $post)
                            <tr>
                                <td data-label="Tiêu đề">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-decoration-none">
                                        {{ Str::limit($post->title, 40) }}
                                    </a>
                                </td>
                                <td data-label="Trạng thái">
                                    <span class="badge {{ $post->status == 'published' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td data-label="Ngày"><small>{{ $post->created_at->diffForHumans() }}</small></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Chưa có bài viết nào
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($recentPosts->count() > 0)
            <div class="card-footer bg-white text-center">
                <a href="{{ route('admin.posts.index') }}" class="text-decoration-none">Xem tất cả bài viết <i class="fas fa-arrow-right ms-1"></i></a>
            </div>
            @endif
        </div>
    </div>

    <!-- Recent Enrollments -->
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0"><i class="fas fa-user-plus me-2 text-warning"></i>Tuyển sinh gần đây</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 table-responsive-stack">
                        <thead class="table-light">
                            <tr>
                                <th>Tên trẻ</th>
                                <th>Phụ huynh</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentEnrollments as $enrollment)
                            <tr>
                                <td data-label="Tên trẻ">
                                    <a href="{{ route('admin.enrollments.show', $enrollment) }}" class="text-decoration-none">
                                        {{ $enrollment->child_name }}
                                    </a>
                                </td>
                                <td data-label="Phụ huynh"><small>{{ $enrollment->parent_name }}</small></td>
                                <td data-label="Trạng thái">
                                    <span class="badge 
                                        @if($enrollment->status == 'approved') bg-success
                                        @elseif($enrollment->status == 'pending') bg-warning
                                        @elseif($enrollment->status == 'reviewing') bg-info
                                        @else bg-danger
                                        @endif">
                                        {{ $enrollment->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Chưa có đơn tuyển sinh nào
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($recentEnrollments->count() > 0)
            <div class="card-footer bg-white text-center">
                <a href="{{ route('admin.enrollments.index') }}" class="text-decoration-none">Xem tất cả đơn tuyển sinh <i class="fas fa-arrow-right ms-1"></i></a>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="row g-4 mt-4">
    <!-- Recent Contacts -->
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0"><i class="fas fa-envelope me-2 text-danger"></i>Liên hệ gần đây</h6>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($recentContacts as $contact)
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">{{ $contact->name }}</h6>
                            <small class="text-muted">{{ $contact->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1"><strong>{{ $contact->subject }}</strong></p>
                        <small class="text-muted">{{ Str::limit($contact->message, 60) }}</small>
                        <span class="badge bg-{{ $contact->status == 'unread' ? 'danger' : 'success' }} ms-2">{{ $contact->status }}</span>
                    </a>
                    @empty
                    <div class="list-group-item text-center py-4 text-muted">
                        <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                        Chưa có liên hệ nào
                    </div>
                    @endforelse
                </div>
            </div>
            @if($recentContacts->count() > 0)
            <div class="card-footer bg-white text-center">
                <a href="{{ route('admin.contacts.index') }}" class="text-decoration-none">Xem tất cả liên hệ <i class="fas fa-arrow-right ms-1"></i></a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
