<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorPaypalConfigRequest extends FormRequest
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
             'doctor_id' => 'required|exists:users,id',
             'PAYPAL_LIVE_CLIENT_ID' => 'string|max:200',
             'PAYPAL_LIVE_CLIENT_SECRET' => 'string|max:200',
             'PAYPAL_LIVE_APP_ID' => 'string|max:200',
        ];
    }
}
