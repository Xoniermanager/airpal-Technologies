<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
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
        $id = $this->input('id'); // Get the ID from the form data
        return [
            // 'name' => 'required|unique:specializations',
            'id'   => 'required',
            'name'          => [
                'required',
                'string',
                 Rule::unique('services')->ignore($id),
            ],
        ];
    }
}
