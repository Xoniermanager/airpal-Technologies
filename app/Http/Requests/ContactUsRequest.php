<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'name'  => 'required|string|max:255',
            'phone' => [
                'required',
                'regex:/^[0-9]{10,15}$/',
            ],
            'services' => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'comment'  => 'required|string|max:1000',
        ];
    }
}