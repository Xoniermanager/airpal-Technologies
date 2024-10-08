<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Foundation\Http\FormRequest;

class StorePatientRegistrationRequest extends FormRequest
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
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:users',
            'phone'        => 'required|digits_between:8,12',
            'password'     => 'required|string|min:8|max:30',
            'gender'       => 'required|string',
        ];
    }
}
