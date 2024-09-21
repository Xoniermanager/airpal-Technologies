<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Foundation\Http\FormRequest;

class GetBookingFeeAndCheckAuth extends FormRequest
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
            'booking_date'      =>  'required|date',
            'slot_start_time'   =>  'required',
            'slot_end_time'     =>  'required',
            'doctor_id'         =>  'required|exists:users,id,role,' . config('airpal.roles.doctor'),
        ];
    }
}
