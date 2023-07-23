<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|string|max:255|min:3',
            'description' => ['required' ,'string' ,'min:10' ,'max:1000'],
            'category_id' => 'required|exists:categories,id',
            'image' => 'image', 
            'price' => 'numeric|min:0',
 
         ];
    }
}
