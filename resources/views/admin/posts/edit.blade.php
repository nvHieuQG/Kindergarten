@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa bài viết')
@section('page-title', 'Chỉnh sửa bài viết')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Chỉnh sửa: {{ $post->title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $post->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Danh mục <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                                required>
                                <option value="">Chọn danh mục</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tóm tắt</label>
                            <textarea name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nội dung <span class="text-danger">*</span></label>
                            <textarea name="content" id="editor" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ảnh đại diện</label>
                            @if ($post->featured_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Current Image"
                                        class="img-thumbnail" style="max-height: 200px;">
                                    <p class="small text-muted mt-1">Ảnh hiện tại</p>
                                </div>
                            @endif
                            <input type="file" name="featured_image"
                                class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
                            <small class="text-muted">Tải ảnh mới để thay thế ảnh hiện tại (Tối đa 2MB)</small>
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Trạng thái <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Bản
                                    nháp</option>
                                <option value="published"
                                    {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Đã xuất bản
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ngày xuất bản</label>
                            <input type="datetime-local" name="published_at"
                                class="form-control @error('published_at') is-invalid @enderror"
                                value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                            @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Cập nhật bài viết
                            </button>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-white">
                    <h6 class="mb-0">Thống kê bài viết</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><strong>Lượt xem:</strong> {{ $post->views }}</li>
                        <li class="mb-2"><strong>Tác giả:</strong> {{ $post->user->name }}</li>
                        <li class="mb-2"><strong>Ngày tạo:</strong> {{ $post->created_at->format('d/m/Y') }}</li>
                        <li><strong>Cập nhật:</strong> {{ $post->updated_at->diffForHumans() }}</li>
                    </ul>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="mb-0">Vùng nguy hiểm</h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-2">Xóa bài viết này vĩnh viễn</p>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này không? Hành động này không thể hoàn tác.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash me-1"></i> Xóa bài viết
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', '|',
                        'link', 'bulletedList', 'numberedList', '|',
                        'blockQuote', 'insertTable', '|',
                        'imageUpload', 'mediaEmbed', '|',
                        'undo', 'redo'
                    ]
                },
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Đoạn văn',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Tiêu đề 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Tiêu đề 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Tiêu đề 3',
                            class: 'ck-heading_heading3'
                        }
                    ]
                },
                image: {
                    toolbar: [
                        'imageTextAlternative', '|',
                        'imageStyle:inline',
                        'imageStyle:block',
                        'imageStyle:side'
                    ],
                    upload: {
                        types: ['jpeg', 'jpg', 'png', 'gif', 'webp']
                    }
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                },
                mediaEmbed: {
                    previewsInData: true
                },
                placeholder: 'Nhập nội dung bài viết tại đây...',
                language: 'vi'
            })
            .then(editor => {
                window.editor = editor;

                // Handle upload errors
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return {
                        upload: () => {
                            return loader.file.then(file => {
                                // Check file size (2MB)
                                if (file.size > 2 * 1024 * 1024) {
                                    return Promise.reject('Kích thước ảnh không được vượt quá 2MB');
                                }

                                // Check file type
                                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png',
                                    'image/gif', 'image/webp'
                                ];
                                if (!allowedTypes.includes(file.type)) {
                                    return Promise.reject(
                                        'Chỉ chấp nhận ảnh định dạng: JPG, PNG, GIF, WEBP');
                                }

                                return new Promise((resolve, reject) => {
                                    const data = new FormData();
                                    data.append('upload', file);
                                    data.append('_token', '{{ csrf_token() }}');

                                    fetch('{{ route('admin.posts.upload') }}', {
                                            method: 'POST',
                                            body: data
                                        })
                                        .then(response => response.json())
                                        .then(result => {
                                            if (result.uploaded) {
                                                resolve({
                                                    default: result.url
                                                });
                                            } else {
                                                reject(result.error.message ||
                                                    'Không thể tải ảnh lên');
                                            }
                                        })
                                        .catch(error => {
                                            reject('Lỗi kết nối. Vui lòng thử lại.');
                                        });
                                });
                            });
                        }
                    };
                };

                console.log('CKEditor initialized successfully');
            })
            .catch(error => {
                console.error('CKEditor initialization error:', error);
                alert('Không thể khởi tạo trình soạn thảo. Vui lòng tải lại trang.');
            });
    </script>
@endpush
