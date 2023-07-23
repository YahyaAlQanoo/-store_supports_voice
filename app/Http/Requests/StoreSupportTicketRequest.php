<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupportTicketRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:50|min:3',
            'description' => ['required' ,'string' ,'min:10' ,'max:1000'],
            'type' => ['required', Rule::in(['Info inquiry', 'Complaint','Partner request','Website problem'])],
            'priority' => ['required', Rule::in(['Low', 'Medium', 'High','Urgent'])],
        ];
    }
}
