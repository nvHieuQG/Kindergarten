<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class ThrottleFormSubmissions
{
    protected RateLimiter $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    /**
     * Handle an incoming request.
     *
     * Rate limit form submissions to prevent spam:
     * - 5 requests per minute from the same IP
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $maxAttempts = 5, int $decayMinutes = 1): Response
    {
        $key = 'form_submission_' . $request->ip();

        if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
            $seconds = $this->limiter->availableIn($key);

            return redirect()->back()
                ->withInput()
                ->with('error', "Bạn đã gửi quá nhiều yêu cầu. Vui lòng thử lại sau {$seconds} giây.");
        }

        $this->limiter->hit($key, $decayMinutes * 60);

        return $next($request);
    }
}
