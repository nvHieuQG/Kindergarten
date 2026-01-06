@extends('admin.layouts.app')

@section('title', 'Quản lý Dịch vụ')
@section('page-title', 'Quản lý Dịch vụ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Danh sách dịch vụ</h4>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Thêm dịch vụ
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 100px;">Hình ảnh</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Icon</th>
                        <th style="width: 150px;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td>
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="{{ $service->icon ?? 'fas fa-image' }} fa-2x text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $service->title }}</strong></td>
                        <td>{{ Str::limit($service->description, 50) }}</td>
                        <td>
                            @if($service->icon)
                                <i class="{{ $service->icon }} fa-lg text-primary"></i> <small class="text-muted ms-1">{{ $service->icon }}</small>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="table-actions">
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-warning" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa dịch vụ này không?')">
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
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                            <p>Chưa có dịch vụ nào.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($services->hasPages())
    <div class="card-footer bg-white">
        {{ $services->links() }}
    </div>
    @endif
</div>
@endsection
