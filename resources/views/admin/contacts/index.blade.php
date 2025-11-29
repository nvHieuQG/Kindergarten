@extends('admin.layouts.app')

@section('title', 'Tin nhắn liên hệ')
@section('page-title', 'Tin nhắn liên hệ')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Tên</th>
                        <th>Chủ đề</th>
                        <th>Ngày</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr class="{{ $contact->status == 'unread' ? 'fw-bold bg-light' : '' }}">
                        <td>
                            {{ $contact->name }}<br>
                            <small class="text-muted fw-normal">{{ $contact->email }}</small>
                        </td>
                        <td>{{ Str::limit($contact->subject, 50) }}</td>
                        <td>{{ $contact->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            <span class="badge {{ $contact->status == 'unread' ? 'bg-danger' : 'bg-secondary' }}">
                                {{ ucfirst($contact->status) == 'Unread' ? 'Chưa đọc' : 'Đã đọc' }}
                            </span>
                        </td>
                        <td class="table-actions">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-info text-white" title="Đọc tin nhắn">
                                <i class="fas fa-envelope-open"></i>
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa tin nhắn này?')">
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
                            <p>Không tìm thấy tin nhắn nào.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($contacts->hasPages())
    <div class="card-footer bg-white">
        {{ $contacts->links() }}
    </div>
    @endif
</div>
@endsection
