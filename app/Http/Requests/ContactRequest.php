<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => ['required', 'string', 'regex:/^(0)[0-9]{9}$/'],
            'message' => 'required|string',
            'subject' => 'nullable|string|max:255',
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
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số bắt đầu bằng số 0.',
            'message.required' => 'Vui lòng nhập nội dung cần tư vấn.',
            'email.email' => 'Email không hợp lệ.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Set default subject if not provided
        if (!$this->has('subject')) {
            $this->merge([
                'subject' => 'Tư vấn từ trang chủ',
            ]);
        }
    }
}

