@extends('admin.layouts.app')

@section('title', 'Quản lý bình luận')
@section('page-title', 'Quản lý bình luận')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 20%;">Tác giả</th>
                        <th style="width: 40%;">Bình luận</th>
                        <th style="width: 20%;">Trên bài viết</th>
                        <th style="width: 10%;">Trạng thái</th>
                        <th style="width: 10%;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                    <tr>
                        <td>
                            <strong>{{ $comment->name }}</strong><br>
                            <small class="text-muted">{{ $comment->email }}</small><br>
                            <small class="text-muted">{{ $comment->created_at->format('M d, Y') }}</small>
                        </td>
                        <td>
                            <p class="mb-0 text-break">{{ Str::limit($comment->content, 100) }}</p>
                            @if(strlen($comment->content) > 100)
                                <button type="button" class="btn btn-link btn-sm p-0" data-bs-toggle="modal" data-bs-target="#commentModal{{ $comment->id }}">
                                    Đọc thêm
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="commentModal{{ $comment->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Bình luận bởi {{ $comment->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $comment->content }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if($comment->post)
                                <a href="{{ route('admin.posts.edit', $comment->post) }}" target="_blank">
                                    {{ Str::limit($comment->post->title, 30) }}
                                </a>
                            @else
                                <span class="text-muted">Bài viết đã xóa</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge 
                                @if($comment->status == 'approved') bg-success
                                @elseif($comment->status == 'pending') bg-warning
                                @else bg-danger
                                @endif">
                                @if($comment->status == 'approved') Đã duyệt
                                @elseif($comment->status == 'pending') Chờ duyệt
                                @else Spam
                                @endif
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                @if($comment->status != 'approved')
                                <form action="{{ route('admin.comments.status', $comment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-sm btn-success" title="Duyệt">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                @endif

                                @if($comment->status != 'spam')
                                <form action="{{ route('admin.comments.status', $comment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="spam">
                                    <button type="submit" class="btn btn-sm btn-warning" title="Đánh dấu Spam">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </form>
                                @endif

                                <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Xóa bình luận này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="fas fa-comments fa-3x mb-3 d-block"></i>
                            <p>Không tìm thấy bình luận nào.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($comments->hasPages())
    <div class="card-footer bg-white">
        {{ $comments->links() }}
    </div>
    @endif
</div>
@endsection
