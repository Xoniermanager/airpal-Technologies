<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOurTeamRequest extends FormRequest
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
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png|max:4096',
            'name'  => 'required|string|max:100',
            'designation' => 'required|string|max:100',
            'description' => 'string|nullable',
            'id' => 'required|exists:our_teams,id'
        ];
    }
}
