<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorPersonalDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    use ExceptionHandle;
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
            'first_name'   => 'required',
            'last_name'    => 'required',
            'display_name' => 'sometimes|required',
            'gender'       => 'sometimes|required',
            'phone'        => 'required',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->doctor_id), 
            ],
            'languages'    => 'sometimes|required',
            'password'     => 'sometimes|required|string',
            'image'        => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'specialities' => 'sometimes|required',
            'description'  => 'sometimes|required|string',
            'services'     => 'sometimes|required',
            'doctor_id'    => 'sometimes|exists:users,id'
        ];
    }
}
 