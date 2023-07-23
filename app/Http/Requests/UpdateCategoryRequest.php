<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
        $id =$this->route()->parameters['category']->id;
        return [
            'category_name' => ['required' ,'string' ,'min:3' ,'max:255' ,"unique:categories,name,$id" ],
            'description' => ['required' ,'string' ,'min:10' ,'max:1000'],
            'parent_id' => ['nullable', 'int', 'exists:categories,id'],
            'image' => ['image', 'max:1048576', 'dimensions:min_width=100,min_height=100',],
            'status' => 'required|in:active,inactive',
        ];
    }
}
