<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:255',
                'unique:posts,title',
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
            'excerpt' => [
                'nullable',
                'string',
                'max:500',
            ],
            'content' => [
                'required',
                'string',
                'min:10',
            ],
            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpeg,jpg,png,gif,webp',
                'max:2048', // 2MB
            ],
            'status' => [
                'required',
                'in:draft,published',
            ],
            'published_at' => [
                'nullable',
                'date',
                'after_or_equal:today',
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
            'title.required' => 'Vui lòng nhập tiêu đề bài viết.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'title.unique' => 'Tiêu đề này đã tồn tại. Vui lòng chọn tiêu đề khác.',
            
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
            
            'excerpt.max' => 'Tóm tắt không được vượt quá 500 ký tự.',
            
            'content.required' => 'Vui lòng nhập nội dung bài viết.',
            'content.min' => 'Nội dung phải có ít nhất 10 ký tự.',
            
            'featured_image.image' => 'File phải là ảnh.',
            'featured_image.mimes' => 'Ảnh phải có định dạng: JPG, PNG, GIF, WEBP.',
            'featured_image.max' => 'Kích thước ảnh không được vượt quá 2MB.',
            
            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in' => 'Trạng thái không hợp lệ.',
            
            'published_at.date' => 'Ngày xuất bản không hợp lệ.',
            'published_at.after_or_equal' => 'Ngày xuất bản không được là ngày trong quá khứ.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'tiêu đề',
            'category_id' => 'danh mục',
            'excerpt' => 'tóm tắt',
            'content' => 'nội dung',
            'featured_image' => 'ảnh đại diện',
            'status' => 'trạng thái',
            'published_at' => 'ngày xuất bản',
        ];
    }
}
