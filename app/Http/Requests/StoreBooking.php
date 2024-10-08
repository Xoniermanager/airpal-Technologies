<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Foundation\Http\FormRequest;

class StoreBooking extends FormRequest
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
            'doctor_id'          => ['required', 'exists:users,id'],
            'booking_date'       => ['required', 'date'],
            'booking_slot_time'  => ['required'],
            'insurance'          => ['boolean'],
            'description'        => ['required', 'max:255'],
            'symptoms'           => ['string', 'nullable'],
            'image'              => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator){
            if(!$validator->failed()){
                $data = $validator->getData();
                $slotTimes = explode(' - ', $data['booking_slot_time']);
                $exists = \DB::table('booking_slots')
                    ->where('doctor_id', $data['doctor_id'])
                    ->where('booking_date', $data['booking_date'])
                    ->where('slot_start_time', $slotTimes[0])
                    ->where('slot_end_time', $slotTimes[1])
                    ->where('status','!=','cancelled')
                    ->exists();
                if ($exists) {
                    $validator->errors()->add('appointment','The selected appointment slot is already booked.');
                }
            }
        });
    }
}
