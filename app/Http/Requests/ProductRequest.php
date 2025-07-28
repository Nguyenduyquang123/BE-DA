<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'old_price' => 'required|numeric',
            'image_url' => 'nullable', 
            'slide' => 'boolean',
            'installment' => 'boolean',
            'discounted' => 'boolean',
            'desciption' => 'nullable|string',
            'specifications' => 'nullable|string',
            'slug' => 'nullable|string',
            'status' => 'required|string|in:pending,active,inactive',
        ];
    }
}
