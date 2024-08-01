<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
                "doctor"            => "required|exists:users,id",
                "specialty"         => "required|exists:specializations,id",
                "answer_type"       => "required|in:multiple,optional,text",
                "question"          => "required|string",
                'options'           => 'required_if:answer_type,==,optional,multiple|array',
                'options.*.value'   => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'options.*.value.required'    => 'Options is required.',
        ];
    }
}
