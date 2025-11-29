@extends('admin.layouts.app')

@section('title', 'Quản lý sự kiện')
@section('page-title', 'Quản lý sự kiện')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Tất cả sự kiện</h4>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Sự kiện mới
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Sự kiện</th>
                        <th>Ngày & Giờ</th>
                        <th>Địa điểm</th>
                        <th>Trạng thái</th>
                        <th>Người tham gia</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}" class="rounded me-2" width="50" height="50" style="object-fit: cover;">
                                @else
                                    <div class="rounded bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center me-2" style="width: 50px; height: 50px;">
                                        <i class="fas fa-calendar-alt text-secondary"></i>
                                    </div>
                                @endif
                                <div>
                                    <strong>{{ Str::limit($event->title, 40) }}</strong>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div><i class="fas fa-calendar-day text-muted me-1"></i> {{ $event->start_date->format('M d, Y') }}</div>
                            <small class="text-muted"><i class="fas fa-clock me-1"></i> {{ $event->start_date->format('H:i') }}</small>
                        </td>
                        <td>{{ Str::limit($event->location, 30) }}</td>
                        <td>
                            <span class="badge 
                                @if($event->status == 'upcoming') bg-primary
                                @elseif($event->status == 'ongoing') bg-success
                                @elseif($event->status == 'completed') bg-secondary
                                @else bg-danger
                                @endif">
                                @if($event->status == 'upcoming') Sắp tới
                                @elseif($event->status == 'ongoing') Đang diễn ra
                                @elseif($event->status == 'completed') Đã hoàn thành
                                @else Đã hủy
                                @endif
                            </span>
                        </td>
                        <td>
                            @if($event->max_participants)
                                <span class="badge bg-info text-dark">0 / {{ $event->max_participants }}</span>
                            @else
                                <span class="badge bg-light text-dark">Không giới hạn</span>
                            @endif
                        </td>
                        <td class="table-actions">
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-warning" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa sự kiện này?')">
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
                            <i class="fas fa-calendar-times fa-3x mb-3 d-block"></i>
                            <p>Không tìm thấy sự kiện nào. Hãy lên kế hoạch cho sự kiện đầu tiên!</p>
                            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i> Tạo sự kiện
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($events->hasPages())
    <div class="card-footer bg-white">
        {{ $events->links() }}
    </div>
    @endif
</div>
@endsection
