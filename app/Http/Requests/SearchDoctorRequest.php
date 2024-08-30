<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchDoctorRequest extends FormRequest
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
            'gender'      =>  'sometimes|array|in:male,female',
            'specialty'   =>  'sometimes|exists:specializations,id',
            'services'    =>  'sometimes|exists:services,id',
            'experience'  =>  'sometimes|array|in:"1-5","5-10"',
            'rating'      =>  'sometimes|array|in:1,2,3,4,5',
            'languages'   =>  'sometimes|exists:languages,id',
            'searchKey'   =>  'sometimes|string',
        ];
    }
}
