<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorServiceDetailRequest extends FormRequest
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
            'specialities'                 => 'sometimes|exists:specializations,id',
            'services'                     => 'sometimes|exists:services,id',
            'common_health_concern'        => 'sometimes|exists:common_health_concerns,id',
            'user_id'                    => 'sometimes|exists:users,id'
        ];
    }
}
