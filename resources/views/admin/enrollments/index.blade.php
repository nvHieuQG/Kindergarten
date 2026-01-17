@extends('admin.layouts.app')

@section('title', 'Quản lý đăng ký')
@section('page-title', 'Yêu cầu tư vấn')

@section('content')
    <div class="row mb-4 animate-up">
        <div class="col-md-12">
            <div
                class="p-4 rounded-4 bg-white border border-light shadow-sm d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="fw-bold mb-1">Danh sách đăng ký tư vấn</h4>
                    <p class="text-muted small mb-0">Theo dõi và phản hồi các yêu cầu từ phụ huynh</p>
                </div>
                <div class="stat-icon-wrapper bg-primary bg-opacity-10 text-primary mb-0 shadow-none"
                    style="width: 45px; height: 45px;">
                    <i class="fas fa-id-card"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm animate-up" style="animation-delay: 0.1s">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Thông tin bé</th>
                            <th>Thông tin phụ huynh</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th class="text-end pe-4">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($enrollments as $enrollment)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center me-3"
                                            style="width: 42px; height: 42px;">
                                            <i class="fas fa-child"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $enrollment->child_name }}</div>
                                            <div class="text-muted small">Năm sinh:
                                                {{ $enrollment->child_dob_year ?? 'N/A' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">{{ $enrollment->parent_name }}</div>
                                    <div class="small text-muted"><i
                                            class="fas fa-phone-alt me-1 text-primary"></i>{{ $enrollment->parent_phone }}
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-medium text-dark">{{ $enrollment->created_at->format('d/m/Y') }}</div>
                                    <div class="text-muted extra-small">{{ $enrollment->created_at->format('H:i') }}
                                        ({{ $enrollment->created_at->diffForHumans() }})</div>
                                </td>
                                <td>
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-warning bg-opacity-10 text-warning border-0',
                                            'reviewing' => 'bg-info bg-opacity-10 text-info border-0',
                                            'approved' => 'bg-success bg-opacity-10 text-success border-0',
                                            'rejected' => 'bg-danger bg-opacity-10 text-danger border-0',
                                        ];
                                        $statusLabels = [
                                            'pending' => 'Chờ xử lý',
                                            'reviewing' => 'Đang tư vấn',
                                            'approved' => 'Đã nhập học',
                                            'rejected' => 'Từ chối',
                                        ];
                                    @endphp
                                    <span
                                        class="badge {{ $statusClasses[$enrollment->status] ?? 'bg-secondary bg-opacity-10 text-secondary' }} px-3 py-2">
                                        {{ $statusLabels[$enrollment->status] ?? $enrollment->status }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.enrollments.show', $enrollment) }}"
                                            class="btn btn-icon btn-light btn-sm rounded-circle" title="Xem & Xử lý">
                                            <i class="fas fa-eye text-primary"></i>
                                        </a>
                                        <form action="{{ route('admin.enrollments.destroy', $enrollment) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa đăng ký này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon btn-light btn-sm rounded-circle"
                                                title="Xóa">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-inbox fa-3x mb-3 d-block opacity-20"></i>
                                    <p class="mb-0">Hiện tại chưa có đơn đăng ký nào.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if ($enrollments->hasPages())
            <div class="card-footer bg-white border-top border-light py-3">
                {{ $enrollments->links() }}
            </div>
        @endif
    </div>
@endsection
