<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBooking extends FormRequest
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
            'patient_id'         => ['required', 'exists:users,id'],
            'doctor_id'          => ['required', 'exists:users,id'],
            'booking_date'       => ['required', 'date'],
            'booking_slot_time'  => ['required'],
            'insurance'          => ['boolean'],
            'description'        => ['required','max:255'],
            'symptoms'           => ['string','nullable'],
            'image'              => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ];
    }
}
