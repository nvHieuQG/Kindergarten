<?php

namespace App\Http\Requests;

use App\Rules\Honeypot;
use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
        $currentYear = date('Y');

        return [
            'child_name' => 'required|string|max:255',
            'child_dob_year' => 'required|integer|min:2018|max:' . $currentYear,
            'parent_name' => 'required|string|max:255',
            'parent_email' => 'nullable|email|max:255',
            'parent_phone' => ['required', 'string', 'regex:/^(0)[0-9]{9}$/'],
            'child_gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string|max:500',
            'program' => 'nullable|string|max:255',
            'preferred_start_date' => 'nullable|date|after_or_equal:today',
            'message' => 'nullable|string|max:1000',
            // Honeypot field để chống bot spam
            'company' => ['nullable', new Honeypot],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'child_name.required' => 'Vui lòng nhập họ tên bé.',
            'parent_name.required' => 'Vui lòng nhập họ tên phụ huynh.',
            'parent_phone.required' => 'Vui lòng nhập số điện thoại.',
            'parent_phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số bắt đầu bằng số 0.',
            'child_dob_year.required' => 'Vui lòng nhập năm sinh.',
            'child_dob_year.min' => 'Năm sinh không hợp lệ. Năm sinh phải từ 2018 trở lên.',
            'child_dob_year.max' => 'Năm sinh không hợp lệ. Năm sinh không được vượt quá năm hiện tại.',
            'parent_email.email' => 'Email không hợp lệ.',
            'preferred_start_date.after_or_equal' => 'Ngày bắt đầu mong muốn phải từ hôm nay trở đi.',
        ];
    }

    /**
     * Get validated data with child_dob converted from year.
     */
    public function validated($key = null, $default = null): array
    {
        $validated = parent::validated($key, $default);

        // Convert year to a valid date for child_dob
        if (isset($validated['child_dob_year'])) {
            $validated['child_dob'] = $validated['child_dob_year'] . '-01-01';
            unset($validated['child_dob_year']);
        }

        return $validated;
    }
}

