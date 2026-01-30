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
            <label for="email" class="form-label">Email Admin <span class="text-danger">*</span></label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="admin@example.com"
                maxlength="255" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                title="Vui lòng nhập địa chỉ email hợp lệ">
            @error('email')
                <div class="invalid-feedback fw-bold">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <label for="password" class="mb-0 form-label">Mật khẩu <span class="text-danger">*</span></label>
            </div>
            <div class="position-relative">
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password"
                    name="password" required autocomplete="current-password" placeholder="••••••••" minlength="6"
                    maxlength="255" title="Mật khẩu phải có ít nhất 6 ký tự">
                <button type="button"
                    class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-muted p-0 pe-3"
                    onclick="togglePassword()" tabindex="-1" style="text-decoration: none;">
                    <i id="toggleIcon" class="fas fa-eye"></i>
                </button>
            </div>
            @error('password')
                <div class="invalid-feedback d-block fw-bold">{{ $message }}</div>
            @enderror
        </div>

        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const toggleIcon = document.getElementById('toggleIcon');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                }
            }
        </script>

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
