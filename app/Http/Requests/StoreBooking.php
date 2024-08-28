<?php

namespace App\Http\Requests;

use DB;
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
        // return [
        //     'patient_id'         => ['required', 'exists:users,id'],
        //     'doctor_id'          => ['required', 'exists:users,id'],
        //     'booking_date'       => ['required', 'date'],
        //     'booking_slot_time'  => ['required'],
        //     'insurance'          => ['boolean'],
        //     'description'        => ['required','max:255'],
        //     'symptoms'           => ['string','nullable'],
        //     'image'              => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        // ];
        return [
            'patient_id'         => ['required', 'exists:users,id'],
            'doctor_id'          => ['required', 'exists:users,id'],
            'booking_date'       => ['required', 'date'],
            'booking_slot_time'  => ['required'],
            'insurance'          => ['boolean'],
            'description'        => ['required', 'max:255'],
            'symptoms'           => ['string', 'nullable'],
            'image'              => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            // Custom rule to prevent duplicate entries
            'appointment'       => [
                function ($attribute, $value, $fail) {
                    $slotTimes = explode(' - ', request('booking_slot_time'));
                    $exists = \DB::table('booking_slots')
                        ->where('patient_id', request('patient_id'))
                        ->where('doctor_id', request('doctor_id'))
                        ->where('booking_date', request('booking_date'))
                        ->where('slot_start_time', $slotTimes[0])
                        ->where('slot_end_time', $slotTimes[1])
                        ->exists();
    
                    if ($exists) {
                        $fail('The selected appointment slot is already booked.');
                    }
                },
            ],
    
        ];
        
    }
}
