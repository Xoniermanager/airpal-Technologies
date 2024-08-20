<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ExceptionHandle;


class PatientProfileDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    use ExceptionHandle;

    public function authorize()
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
            'first_name' => 'required',
            'last_name' => 'string',
            'dob' => 'date',
            'phone' => 'required',
            'email' => 'required|email',
            'gender' => 'required|in:Male,Female',
            'blood_group' => 'sometimes',
            'password' => 'sometimes',
            'image_url' => 'mimes:jpeg,jpg,png,gif|sometimes|max:10000',
            'address' => 'required|array',
            'address.street' => 'required|string',
            'address.city' => 'required|string',
            'address.country' => 'required|exists:countries,id',
            'address.states' => 'required|exists:states,id',
            'address.pincode' => 'required',
        ];
    }
}
