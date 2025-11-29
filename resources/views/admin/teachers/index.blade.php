@extends('admin.layouts.app')

@section('title', 'Quản lý giáo viên')
@section('page-title', 'Quản lý giáo viên')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Tất cả giáo viên</h4>
    <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Giáo viên mới
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">Ảnh</th>
                        <th>Tên</th>
                        <th>Chức vụ</th>
                        <th>Trạng thái</th>
                        <th>Thứ tự</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $teacher)
                    <tr>
                        <td>
                            @if($teacher->photo)
                                <img src="{{ asset('storage/' . $teacher->photo) }}" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user text-secondary"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $teacher->name }}</strong>
                            @if($teacher->email)
                                <br><small class="text-muted">{{ $teacher->email }}</small>
                            @endif
                        </td>
                        <td>{{ $teacher->position }}</td>
                        <td>
                            <span class="badge {{ $teacher->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $teacher->is_active ? 'Hoạt động' : 'Không hoạt động' }}
                            </span>
                        </td>
                        <td>{{ $teacher->order }}</td>
                        <td class="table-actions">
                            <a href="{{ route('admin.teachers.edit', $teacher) }}" class="btn btn-sm btn-warning" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa giáo viên này không?')">
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
                            <i class="fas fa-chalkboard-teacher fa-3x mb-3 d-block"></i>
                            <p>Chưa có giáo viên nào. Hãy thêm thành viên vào đội ngũ!</p>
                            <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i> Thêm giáo viên
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($teachers->hasPages())
    <div class="card-footer bg-white">
        {{ $teachers->links() }}
    </div>
    @endif
</div>
@endsection
