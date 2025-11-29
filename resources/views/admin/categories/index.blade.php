@extends('admin.layouts.app')

@section('title', 'Categories')
@section('page-title', 'Categories Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">All Categories</h4>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> New Category
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Posts Count</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td><code>{{ $category->slug }}</code></td>
                        <td><span class="badge bg-info">{{ $category->posts_count }} posts</span></td>
                        <td>{{ $category->created_at->format('M d, Y') }}</td>
                        <td class="table-actions">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" {{ $category->posts_count > 0 ? 'disabled title=Cannot delete category with posts' : '' }}>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="fas fa-folder-open fa-3x mb-3 d-block text-muted"></i>
                            <p>No categories yet</p>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Category</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($categories->hasPages())
    <div class="card-footer bg-white">
        {{ $categories->links() }}
    </div>
    @endif
</div>
@endsection
