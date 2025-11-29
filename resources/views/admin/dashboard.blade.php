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

    <!-- Events Stats -->
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small mb-1">Tổng số sự kiện</div>
                    <h3 class="mb-0">{{ $stats['total_events'] }}</h3>
                    <small class="text-info">
                        <i class="fas fa-calendar-alt"></i> {{ $stats['upcoming_events'] }} sắp tới
                    </small>
                </div>
                <div class="stat-icon bg-info bg-opacity-10 text-info">
                    <i class="fas fa-calendar-alt"></i>
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
</div>

<div class="row g-4 mb-4">
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

    <!-- Comments Stats -->
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small mb-1">Bình luận</div>
                    <h3 class="mb-0">{{ $stats['total_comments'] }}</h3>
                    <small class="text-warning">
                        <i class="fas fa-clock"></i> {{ $stats['pending_comments'] }} đang chờ
                    </small>
                </div>
                <div class="stat-icon bg-secondary bg-opacity-10 text-secondary">
                    <i class="fas fa-comments"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small mb-1">Thao tác nhanh</div>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm mt-2">
                        <i class="fas fa-plus"></i> Bài viết mới
                    </a>
                </div>
                <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                    <i class="fas fa-plus-circle"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small mb-1">Trang web</div>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm mt-2" target="_blank">
                        <i class="fas fa-external-link-alt"></i> Xem trang web
                    </a>
                </div>
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-globe"></i>
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
                    <table class="table table-hover mb-0">
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
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-decoration-none">
                                        {{ Str::limit($post->title, 40) }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge {{ $post->status == 'published' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td><small>{{ $post->created_at->diffForHumans() }}</small></td>
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
                    <table class="table table-hover mb-0">
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
                                <td>
                                    <a href="{{ route('admin.enrollments.show', $enrollment) }}" class="text-decoration-none">
                                        {{ $enrollment->child_name }}
                                    </a>
                                </td>
                                <td><small>{{ $enrollment->parent_name }}</small></td>
                                <td>
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

<div class="row g-4 mt-2">
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

    <!-- Pending Comments -->
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0"><i class="fas fa-comments me-2 text-warning"></i>Bình luận đang chờ</h6>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($pendingComments as $comment)
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">{{ $comment->name }}</h6>
                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1"><small>Trên bài: <strong>{{ $comment->post->title }}</strong></small></p>
                        <p class="mb-2">{{ Str::limit($comment->content, 80) }}</p>
                        <div>
                            <form method="POST" action="{{ route('admin.comments.approve', $comment) }}" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-success"><i class="fas fa-check"></i> Duyệt</button>
                            </form>
                            <form method="POST" action="{{ route('admin.comments.reject', $comment) }}" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-warning"><i class="fas fa-times"></i> Từ chối</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="list-group-item text-center py-4 text-muted">
                        <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                        Không có bình luận đang chờ
                    </div>
                    @endforelse
                </div>
            </div>
            @if($pendingComments->count() > 0)
            <div class="card-footer bg-white text-center">
                <a href="{{ route('admin.comments.index') }}" class="text-decoration-none">Xem tất cả bình luận <i class="fas fa-arrow-right ms-1"></i></a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
