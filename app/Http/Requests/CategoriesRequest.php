<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
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
            'slug' => 'required|string|max:255',
            'status' => 'required'
        ];
    }
     public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục không được để trống.',
            'slug.required' => 'Slug không được để trống.',
            'status.required' => 'Vui lòng chọn trạng thái.',
        ];
    }
}
