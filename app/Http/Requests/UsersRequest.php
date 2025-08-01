<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'fulllname' => 'required|string|max:255',
            'gender' => 'required|string',
            'phone' => 'required|string|max:255',
            'Email' => 'required|email|unique:users,email',
            'address' => 'required|string',
            'status' => 'required|string|in:pending,active,inactive',

            
        ];
    }
}
     