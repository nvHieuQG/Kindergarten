<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:255',
            ],
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.regex' => 'Định dạng email không đúng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 255 ký tự.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => strtolower(trim($this->email ?? '')),
        ]);
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');
        $remember = $this->boolean('remember');

        // Log login attempt
        Log::info('Login attempt', [
            'email' => $credentials['email'],
            'ip' => $this->ip(),
            'user_agent' => $this->userAgent(),
        ]);

        // Attempt authentication
        if (!Auth::attempt($credentials, $remember)) {
            RateLimiter::hit($this->throttleKey());

            // Log failed login
            Log::warning('Failed login attempt', [
                'email' => $credentials['email'],
                'ip' => $this->ip(),
                'reason' => 'Invalid credentials',
            ]);

            throw ValidationException::withMessages([
                'email' => 'Email hoặc mật khẩu không chính xác.',
            ]);
        }

        // Check if user is active
        $user = Auth::user();
        if (!$user->is_active) {
            Auth::logout();
            RateLimiter::hit($this->throttleKey());

            // Log inactive account attempt
            Log::warning('Login attempt with inactive account', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $this->ip(),
            ]);

            throw ValidationException::withMessages([
                'email' => 'Tài khoản của bạn đã bị vô hiệu hóa. Vui lòng liên hệ quản trị viên.',
            ]);
        }

        // Clear rate limiter on successful login
        RateLimiter::clear($this->throttleKey());

        // Log successful login
        Log::info('Successful login', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => $this->ip(),
        ]);
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        $maxAttempts = 3; // Giảm từ 5 xuống 3 lần thử
        $decayMinutes = 5; // Khóa trong 5 phút

        if (!RateLimiter::tooManyAttempts($this->throttleKey(), $maxAttempts)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());
        $minutes = ceil($seconds / 60);

        // Log rate limit hit
        Log::warning('Login rate limit exceeded', [
            'email' => $this->string('email'),
            'ip' => $this->ip(),
            'seconds_remaining' => $seconds,
        ]);

        throw ValidationException::withMessages([
            'email' => "Bạn đã nhập sai quá nhiều lần. Vui lòng thử lại sau {$minutes} phút.",
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')) . '|' . $this->ip());
    }
}