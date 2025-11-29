@extends('admin.layouts.app')

@section('title', 'Enrollment Details')
@section('page-title', 'Enrollment Details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Child Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Child Name</label>
                        <p>{{ $enrollment->child_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Date of Birth</label>
                        <p>{{ $enrollment->child_dob ? \Carbon\Carbon::parse($enrollment->child_dob)->format('M d, Y') : 'N/A' }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Gender</label>
                        <p>{{ ucfirst($enrollment->child_gender) }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Program Interested</label>
                        <p>{{ $enrollment->program ?? 'General Enrollment' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Parent Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Parent Name</label>
                        <p>{{ $enrollment->parent_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Phone</label>
                        <p><a href="tel:{{ $enrollment->parent_phone }}">{{ $enrollment->parent_phone }}</a></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Email</label>
                        <p><a href="mailto:{{ $enrollment->parent_email }}">{{ $enrollment->parent_email }}</a></p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Address</label>
                        <p>{{ $enrollment->address }}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="fw-bold text-muted">Message/Notes</label>
                    <p class="bg-light p-3 rounded">{{ $enrollment->message ?? 'No message provided.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Status & Actions</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.enrollments.status', $enrollment) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label">Current Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $enrollment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewing" {{ $enrollment->status == 'reviewing' ? 'selected' : '' }}>Reviewing</option>
                            <option value="approved" {{ $enrollment->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $enrollment->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Admin Notes</label>
                        <textarea name="admin_notes" class="form-control" rows="4" placeholder="Internal notes...">{{ $enrollment->admin_notes }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Status</button>
                </form>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('admin.enrollments.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>
</div>
@endsection
