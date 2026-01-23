<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Honeypot Rule - Dùng để chống spam bot
 *
 * Bot thường sẽ điền tất cả các field trong form, kể cả hidden field.
 * Honeypot là một hidden field mà người dùng thật không nhìn thấy và không điền.
 * Nếu field này có giá trị, request đến từ bot.
 */
class Honeypot implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Honeypot field phải trống - nếu có giá trị thì là bot
        if (!empty($value)) {
            // Log spam attempt (optional)
            \Illuminate\Support\Facades\Log::warning('Spam attempt detected via honeypot', [
                'ip' => request()->ip(),
                'field' => $attribute,
                'value' => $value,
            ]);

            $fail('Yêu cầu không hợp lệ.');
        }
    }
}
