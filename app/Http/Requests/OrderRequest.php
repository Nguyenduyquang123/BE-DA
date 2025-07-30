<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        'gender' => 'required|string|in:Anh,Chị', 
        'fulllname' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'city' => 'required|string',
        'address' => 'required|string|max:255',
        'payment_method' => 'required|string|in:Cash on Delivery,Online Payment,Installment',

        'products' => 'required|array|min:1',
        'products.*.product_id' => 'required|integer|exists:products,id',
        'products.*.quantity' => 'required|integer|min:1',
        'products.*.price' => 'required|numeric|min:0',
    ];
    }
}
