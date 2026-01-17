<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success border-0 rounded-4 mb-4 small">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email">Email Admin</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" >
            @error('email')
                <div class="invalid-feedback fw-bold">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <label for="password" class="mb-0">Mật khẩu</label>
            </div>
            <input id="password" class="form-control @error('password') is-invalid @enderror"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••">
            @error('password')
                <div class="invalid-feedback fw-bold">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
            <label class="form-check-label text-muted small" for="remember_me">
                Ghi nhớ đăng nhập
            </label>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary text-white">
                <i class="fas fa-sign-in-alt me-2"></i> Đăng nhập ngay
            </button>
        </div>

        <div class="text-center mt-4">
            <a href="/" class="text-muted small text-decoration-none">
                <i class="fas fa-arrow-left me-1"></i> Quay về trang chủ
            </a>
        </div>
    </form>
</x-guest-layout>
