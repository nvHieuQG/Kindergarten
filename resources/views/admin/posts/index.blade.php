@extends('admin.layouts.app')

@section('title', 'Quản lý bài viết')
@section('page-title', 'Quản lý bài viết')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Danh sách bài viết</h4>
                <p class="text-muted mb-0">Quản lý tin tức và hoạt động của trường</p>
            </div>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Bài viết mới
            </a>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.posts.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" name="search" class="form-control border-start-0 ps-0"
                            placeholder="Tìm kiếm bài viết..." value="{{ request('search') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <select name="category" class="form-select">
                        <option value="">Tất cả danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Tất cả trạng thái</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Đã xuất bản
                        </option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Bản nháp</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <div class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-secondary w-100">
                            <i class="fas fa-filter me-1"></i> Lọc
                        </button>
                        @if (request()->hasAny(['search', 'category', 'status']))
                            <a href="{{ route('admin.posts.index') }}"
                                class="btn btn-outline-secondary w-100 mt-2 mt-md-0 btn-sm">
                                <i class="fas fa-undo me-1"></i> Reset
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 table-stack">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-3" style="width: 40px;">#</th>
                            <th style="width: 35%;">Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th>Thống kê</th>
                            <th>Tác giả</th>
                            <th class="text-end pe-3">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td class="ps-3 text-muted" data-label="#">
                                    {{ $loop->iteration + ($posts->currentPage() - 1) * $posts->perPage() }}</td>
                                <td data-label="Tiêu đề">
                                    <div class="d-flex align-items-center">
                                        @if ($post->featured_image)
                                            <img src="{{ Storage::url($post->featured_image) }}"
                                                class="rounded me-3 post-thumbnail" alt="Thumbnail">
                                        @else
                                            <div
                                                class="bg-light rounded me-3 d-flex align-items-center justify-content-center post-thumbnail">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <a href="{{ route('admin.posts.edit', $post) }}"
                                                class="text-decoration-none fw-bold text-dark d-block mb-1 text-truncate post-title">
                                                {{ $post->title }}
                                            </a>
                                            <small class="text-muted d-block">
                                                <i class="far fa-clock me-1"></i>
                                                {{ $post->created_at->format('d/m/Y H:i') }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Danh mục">
                                    <span
                                        class="badge bg-info bg-opacity-10 text-info border border-info rounded-pill px-3">
                                        {{ $post->category->name }}
                                    </span>
                                </td>
                                <td data-label="Trạng thái">
                                    @if ($post->status == 'published')
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success border border-success rounded-pill px-3">
                                            <i class="fas fa-check-circle me-1"></i> Đã xuất bản
                                        </span>
                                    @else
                                        <span
                                            class="badge bg-warning bg-opacity-10 text-warning border border-warning rounded-pill px-3">
                                            <i class="fas fa-pen-nib me-1"></i> Bản nháp
                                        </span>
                                    @endif
                                </td>
                                <td data-label="Thống kê">
                                    <div class="d-flex align-items-center text-muted small">
                                        <span class="me-3" title="Lượt xem">
                                            <i class="fas fa-eye me-1"></i> {{ number_format($post->views) }}
                                        </span>
                                    </div>
                                </td>
                                <td data-label="Tác giả">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle sm bg-primary text-white me-2">
                                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                        </div>
                                        <span class="small">{{ $post->user->name }}</span>
                                    </div>
                                </td>
                                <td class="text-end pe-3" data-label="Hành động">
                                    <div class="btn-group">
                                        <a href="{{ route('blog.show', $post->slug) }}" target="_blank"
                                            class="btn btn-white btn-sm border" title="Xem trước">
                                            <i class="fas fa-external-link-alt text-muted"></i>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post) }}"
                                            class="btn btn-white btn-sm border" title="Chỉnh sửa">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                        <button type="button" class="btn btn-white btn-sm border"
                                            onclick="if(confirm('Bạn có chắc chắn muốn xóa bài viết này không? Hành động này không thể hoàn tác.')) { document.getElementById('delete-post-{{ $post->id }}').submit(); }"
                                            title="Xóa">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </div>
                                    <form id="delete-post-{{ $post->id }}"
                                        action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="empty-state">
                                        <div class="mb-3">
                                            <i class="fas fa-file-alt fa-3x text-muted opacity-50"></i>
                                        </div>
                                        <h5 class="text-muted mb-2">Không tìm thấy bài viết nào</h5>
                                        <p class="text-muted mb-4 small">Thử thay đổi bộ lọc hoặc tạo bài viết mới</p>
                                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus me-1"></i> Tạo bài viết ngay
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if ($posts->hasPages())
            <div class="card-footer bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="small text-muted">
                        Hiển thị {{ $posts->firstItem() ?? 0 }} - {{ $posts->lastItem() ?? 0 }} trong tổng số
                        {{ $posts->total() }} bài viết
                    </div>
                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <style>
        .avatar-circle.sm {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: bold;
        }

        .btn-white {
            background-color: #fff;
            color: #444;
        }

        .btn-white:hover {
            background-color: #f8f9fa;
            color: #222;
        }

        .post-thumbnail {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .post-title {
            max-width: 250px;
        }

        /* Stack Table Responsive */
        @media screen and (max-width: 992px) {
            .table-stack thead {
                display: none;
            }

            .table-stack tbody tr {
                display: block;
                margin-bottom: 1rem;
                background-color: #fff;
                border: 1px solid #e9ecef;
                border-radius: 0.5rem;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            }

            .table-stack td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid #f8f9fa;
                padding: 0.75rem 1rem !important;
                text-align: right;
            }

            .table-stack td:last-child {
                border-bottom: 0;
                justify-content: flex-end;
                /* Action icons right aligned */
            }

            .table-stack td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                color: #6c757d;
                text-transform: uppercase;
                font-size: 0.75rem;
                margin-right: 1rem;
                text-align: left;
            }

            /* Adjust specific elements for mobile */
            .post-title {
                max-width: 100%;
                /* Full width on mobile */
            }

            .post-thumbnail {
                width: 40px;
                height: 40px;
            }

            .table-stack td[data-label="Tiêu đề"] {
                display: block;
                /* Tiêu đề cần không gian rộng hơn */
                text-align: left;
            }

            .table-stack td[data-label="Tiêu đề"]::before {
                display: block;
                margin-bottom: 0.5rem;
            }
        }
    </style>
@endsection
