<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


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
            'email'        => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user_id),
            ],
            'gender' => 'required|in:Male,Female',
            'blood_group' => 'sometimes',
            'password' => 'sometimes',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
            'address' => 'required|array',
            'address.street' => 'required|string',
            'address.city' => 'required|string',
            'address.country' => 'required|exists:countries,id',
            'address.states' => 'required|exists:states,id',
            'address.pincode' => 'required',
        ];
    }
    function messages()
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'last_name.string' => 'The last name must be a valid string.',
            'dob.date' => 'The date of birth must be a valid date.',
            'phone.required' => 'The phone number field is required.',
            'email.required' => 'The email address field is required.',
            'email.email' => 'The email address must be a valid email.',
            'gender.required' => 'The gender field is required.',
            'gender.in' => 'The selected gender is invalid. Please choose either Male or Female.',
            'blood_group.sometimes' => 'The blood group field is optional but must be valid when provided.',
            'password.sometimes' => 'The password field is optional but must be valid when provided.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif.',
            'image.max' => 'The image size must not exceed 2MB.',
            'address.required' => 'The address field is required and must be an array.',
            'address.street.required' => 'The street address is required.',
            'address.street.string' => 'The street address must be a valid string.',
            'address.city.required' => 'The city field is required.',
            'address.city.string' => 'The city must be a valid string.',
            'address.country.required' => 'The country field is required.',
            'address.country.exists' => 'The selected country is invalid. Please select a valid country.',
            'address.states.required' => 'The state field is required.',
            'address.states.exists' => 'The selected state is invalid. Please select a valid state.',
            'address.pincode.required' => 'The pincode field is required.'
        ];
    }
}
