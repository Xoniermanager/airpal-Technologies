<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorAwardRequest extends FormRequest
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
            'awards' => 'required|array',
            'awards.*.name' => 'required|string|max:255',
            'awards.*.year' => 'required|date',
            'awards.*.description' => 'required|string',
            'user_id'              => 'required'
        ];
    }
    public function messages()
    {
        return [
            'awards.*.name.required'  => 'Please select award name.',
            'awards.*.year.required'  => 'Please provide year.',
            'awards.*.description.required'=> 'Please provide description.',
        ];
    }
}
