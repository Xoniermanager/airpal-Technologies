<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialMedia extends FormRequest
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
            'doctor_id'             => 'sometimes|exists:users,id,role,2',
            'social'                =>  'array',
            'social.*.link'         =>  'nullable|url',
            'social.*.social_media_type_id' =>  'required|exists:social_media_types,id'
        ];
    }
}
