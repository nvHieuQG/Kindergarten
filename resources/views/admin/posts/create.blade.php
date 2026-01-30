@extends('admin.layouts.app')

@section('title', 'Tạo bài viết')
@section('page-title', 'Tạo bài viết mới')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Thông tin bài viết</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" required>
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
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                            <textarea name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt') }}</textarea>
                            <small class="text-muted">Tóm tắt ngắn (tùy chọn)</small>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nội dung <span class="text-danger">*</span></label>
                            <textarea name="content" id="editor" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ảnh đại diện</label>
                            <input type="file" name="featured_image"
                                class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
                            <small class="text-muted">Tối đa 2MB (JPG, PNG, GIF)</small>
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Trạng thái <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Bản nháp</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Đã xuất bản
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
                                value="{{ old('published_at') }}">
                            <small class="text-muted">Để trống để sử dụng ngày hiện tại khi xuất bản</small>
                            @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Tạo bài viết
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
                    <h6 class="mb-0">Mẹo xuất bản</h6>
                </div>
                <div class="card-body">
                    <ul class="small mb-0">
                        <li>Sử dụng tiêu đề rõ ràng, mô tả</li>
                        <li>Chọn danh mục phù hợp</li>
                        <li>Thêm ảnh đại diện để tăng tương tác</li>
                        <li>Viết tóm tắt hấp dẫn cho bản xem trước</li>
                        <li>Chế độ bản nháp cho phép xem trước khi xuất bản</li>
                    </ul>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="mb-0">Cần danh mục?</h6>
                </div>
                <div class="card-body">
                    <p class="small mb-2">Quản lý danh mục bài viết</p>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-folder me-1"></i> Quản lý danh mục
                    </a>
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
