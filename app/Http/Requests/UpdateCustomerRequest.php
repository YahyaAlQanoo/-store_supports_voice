<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id =$this->route()->parameters['customer'];
        
        return [
            'name' => ['required' ,'string' ,'min:3' ,'max:255' ,"unique:users,name,$id" ],
            'email' => ['required' ,'email' ,"unique:users,email,$id"],
            'phone' => ['nullable'],
            'avatar' => ['image', 'max:1048576', 'dimensions:min_width=100,min_height=100'],
        ];
    }
}
