<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Foundation\Http\FormRequest;

class GetValidDoctorIdRequest extends FormRequest
{
    use ExceptionHandle;
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
            'doctor_id'     =>  'required|exists:users,id,role,2',  
        ];
    }
}
