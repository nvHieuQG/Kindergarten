@extends('admin.layouts.app')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
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
                                {{ ucfirst($contact->status) }}
                            </span>
                        </td>
                        <td class="table-actions">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-info text-white" title="Read Message">
                                <i class="fas fa-envelope-open"></i>
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                            <p>No messages found.</p>
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
