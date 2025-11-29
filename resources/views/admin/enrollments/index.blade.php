@extends('admin.layouts.app')

@section('title', 'Đăng ký')
@section('page-title', 'Quản lý đăng ký')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Tên trẻ</th>
                        <th>Phụ huynh</th>
                        <th>Chương trình</th>
                        <th>Ngày</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enrollment)
                    <tr>
                        <td><strong>{{ $enrollment->child_name }}</strong></td>
                        <td>
                            {{ $enrollment->parent_name }}<br>
                            <small class="text-muted">{{ $enrollment->parent_phone }}</small>
                        </td>
                        <td>{{ $enrollment->program ?? 'N/A' }}</td>
                        <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                        <td>
                            <span class="badge 
                                @if($enrollment->status == 'approved') bg-success
                                @elseif($enrollment->status == 'pending') bg-warning
                                @elseif($enrollment->status == 'reviewing') bg-info
                                @else bg-danger
                                @endif">
                                @if($enrollment->status == 'approved') Đã duyệt
                                @elseif($enrollment->status == 'pending') Chờ xử lý
                                @elseif($enrollment->status == 'reviewing') Đang xem xét
                                @else Từ chối
                                @endif
                            </span>
                        </td>
                        <td class="table-actions">
                            <a href="{{ route('admin.enrollments.show', $enrollment) }}" class="btn btn-sm btn-info text-white" title="Xem chi tiết">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.enrollments.destroy', $enrollment) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa đăng ký này?')">
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
                            <i class="fas fa-user-graduate fa-3x mb-3 d-block"></i>
                            <p>Chưa có đăng ký nào.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($enrollments->hasPages())
    <div class="card-footer bg-white">
        {{ $enrollments->links() }}
    </div>
    @endif
</div>
@endsection
