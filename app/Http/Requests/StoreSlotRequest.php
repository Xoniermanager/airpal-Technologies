<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreSlotRequest extends FormRequest
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
        $data = $this->all();

        return [
            // "doctor_id" => [
            //     'required',
            //     Rule::unique('doctor_slots', 'user_id')->ignore($data['doctor_id']),
            // ],
            "slot_duration" => "required|integer",
            "cleanup_interval" => "nullable|integer", 
            "start_month" => "nullable|integer|min:1|max:30",
            "start_slots_from_date" => "nullable|date", 
            "stop_slots_date" => "nullable|date|after_or_equal:start_slots_from_date",
        ];
    }
    public function messages()
{
    return [
        "doctor_id" => "Slot is already created againt this doctor",
        "slot_duration.required" => "The slot duration field is required.",
        "cleanup_interval.required" => "The cleanup interval field is required.",
        "start_month.required" => "The start month field is required.",
        "start_month.integer" => "Please enter a valid integer.",
        "start_month.min" => "Please enter a value between 1 and 30.",
        "start_month.max" => "Please enter a value between 1 and 30.",
        "end_month.required_with" => "The end month field is required if start month is entered.",
        "end_month.integer" => "Please enter a valid integer.",
        "end_month.min" => "Please enter a value between 1 and 30.",
        "end_month.max" => "Please enter a value between 1 and 30.",
        // "exception_day_id.required" => "The exception day field is required.",
        // "slots_in_advance.required" => "The slots in advance field is required.",
        "start_slots_from_date.required" => "The start slots from date field is required.",
        "start_slots_from_date.date" => "The start slots from date must be a valid date.",
        "stop_slots_date.required" => "The stop slots date field is required.",
        "stop_slots_date.date" => "The stop slots date must be a valid date.",
        "stop_slots_date.after_or_equal" => "Stop slots date must be greater than or equal to the start slots date."
    ];
}
}
