@extends('admin.layouts.app')

@section('title', 'Quản lý Cơ sở')
@section('page-title', 'Quản lý Cơ sở')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Danh sách các cơ sở</h4>
    <a href="{{ route('admin.branches.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Thêm cơ sở mới
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle table-responsive-stack">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">STT</th>
                        <th>Tên cơ sở</th>
                        <th>Địa chỉ</th>
                        <th>Liên hệ</th>
                        <th>Trạng thái</th>
                        <th style="width: 150px;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($branches as $branch)
                    <tr>
                        <td data-label="STT">{{ $branch->order }}</td>
                        <td data-label="Tên cơ sở"><strong>{{ $branch->name }}</strong></td>
                        <td data-label="Địa chỉ">{{ $branch->address }}</td>
                        <td data-label="Liên hệ">
                            @if($branch->phone)
                                <div><i class="fas fa-phone fa-sm text-primary me-2"></i>{{ $branch->phone }}</div>
                            @endif
                            @if($branch->email)
                                <div><i class="fas fa-envelope fa-sm text-primary me-2"></i>{{ $branch->email }}</div>
                            @endif
                        </td>
                        <td data-label="Trạng thái">
                            @if($branch->status)
                                <span class="badge bg-success">Hoạt động</span>
                            @else
                                <span class="badge bg-danger">Tạm dừng</span>
                            @endif
                        </td>
                        <td data-label="Hành động" class="table-actions">
                            <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-sm btn-warning" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.branches.destroy', $branch) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa cơ sở này không?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="fas fa-school fa-3x mb-3 d-block"></i>
                            <p>Chưa có cơ sở nào được thêm vào hệ thống.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($branches->hasPages())
    <div class="card-footer bg-white">
        {{ $branches->links() }}
    </div>
    @endif
</div>
@endsection
