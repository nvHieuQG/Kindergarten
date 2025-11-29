@extends('admin.layouts.app')

@section('title', 'Enrollments')
@section('page-title', 'Enrollments Management')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Child Name</th>
                        <th>Parent</th>
                        <th>Program</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
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
                                {{ ucfirst($enrollment->status) }}
                            </span>
                        </td>
                        <td class="table-actions">
                            <a href="{{ route('admin.enrollments.show', $enrollment) }}" class="btn btn-sm btn-info text-white" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.enrollments.destroy', $enrollment) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this enrollment?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="fas fa-user-graduate fa-3x mb-3 d-block"></i>
                            <p>No enrollments yet.</p>
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
