@extends('admin.layouts.app')

@section('title', 'Chi tiết tin nhắn')
@section('page-title', 'Chi tiết tin nhắn')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Tin nhắn từ {{ $contact->name }}</h5>
                <span class="text-muted small">{{ $contact->created_at->format('M d, Y H:i A') }}</span>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="fw-bold text-muted d-block">Thông tin người gửi</label>
                    <div class="d-flex align-items-center mt-2">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                            {{ substr($contact->name, 0, 1) }}
                        </div>
                        <div>
                            <h6 class="mb-0">{{ $contact->name }}</h6>
                            <a href="mailto:{{ $contact->email }}" class="text-decoration-none">{{ $contact->email }}</a>
                            @if($contact->phone)
                                <span class="mx-2 text-muted">|</span>
                                <a href="tel:{{ $contact->phone }}" class="text-decoration-none">{{ $contact->phone }}</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="fw-bold text-muted">Chủ đề</label>
                    <p class="fs-5">{{ $contact->subject }}</p>
                </div>

                <div class="mb-4">
                    <label class="fw-bold text-muted">Nội dung tin nhắn</label>
                    <div class="bg-light p-4 rounded">
                        {!! nl2br(e($contact->message)) !!}
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Quay lại hộp thư
                    </a>
                    
                    <div>
                        <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-primary">
                            <i class="fas fa-reply me-1"></i> Trả lời qua Email
                        </a>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline ms-2" onsubmit="return confirm('Xóa tin nhắn này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-1"></i> Xóa
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
