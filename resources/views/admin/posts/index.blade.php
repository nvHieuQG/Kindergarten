@extends('admin.layouts.app')

@section('title', 'Quản lý bài viết')
@section('page-title', 'Quản lý bài viết')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Tất cả bài viết</h4>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Bài viết mới
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Tác giả</th>
                        <th>Trạng thái</th>
                        <th>Lượt xem</th>
                        <th>Ngày</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>
                            <strong>{{ Str::limit($post->title, 50) }}</strong>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $post->category->name }}</span>
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <span class="badge {{ $post->status == 'published' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($post->status) }}
                            </span>
                        </td>
                        <td>{{ $post->views }}</td>
                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                        <td class="table-actions">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn không?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                            <p>Chưa có bài viết nào. Hãy tạo bài viết đầu tiên!</p>
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i> Tạo bài viết
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($posts->hasPages())
    <div class="card-footer bg-white">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
