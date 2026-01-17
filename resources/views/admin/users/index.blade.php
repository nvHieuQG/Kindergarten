@extends('admin.layouts.app')

@section('title', 'Quản lý Admin')
@section('page-title', 'Quản lý Tài khoản Admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-primary fw-bold"><i class="fas fa-users-cog me-2"></i>Danh sách Admin</h5>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                    <i class="fas fa-plus me-1"></i> Thêm mới
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 table-stack">
                        <thead class="bg-light text-secondary">
                            <tr>
                                <th class="ps-4">Họ tên</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th class="text-end pe-4">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td class="ps-4" data-label="Họ tên">
                                    <div class="d-flex align-items-center">
                                        <div class="{{ $user->is_active ? 'bg-primary bg-opacity-10 text-primary' : 'bg-danger bg-opacity-10 text-danger' }} rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            <i class="fas {{ $user->is_active ? 'fa-user' : 'fa-user-lock' }}"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark">{{ $user->name }}</h6>
                                            @if($user->id === auth()->id())
                                                <span class="badge bg-success" style="font-size: 0.7rem;">Bạn</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Email">{{ $user->email }}</td>
                                <td data-label="Trạng thái">
                                    @if($user->is_active)
                                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Hoạt động</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">Vô hiệu hóa</span>
                                    @endif
                                </td>
                                <td data-label="Ngày tạo">{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="text-end pe-4" data-label="Hành động">
                                    <div class="d-flex justify-content-end gap-2">
                                        @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.status', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm {{ $user->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}" 
                                                    title="{{ $user->is_active ? 'Vô hiệu hóa' : 'Kích hoạt' }}">
                                                <i class="fas {{ $user->is_active ? 'fa-ban' : 'fa-check' }}"></i>
                                            </button>
                                        </form>
                                        @endif

                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-outline-primary btn-sm" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="fas fa-user-slash fa-3x mb-3"></i>
                                    <p>Chưa có tài khoản nào khác.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($users->hasPages())
                <div class="p-3 border-top">
                    {{ $users->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
