<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorWorkingHourRequest extends FormRequest
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
            // 'day'               => 'required|array|max:7',
            'day.*'             => 'required|array',
            'day.*.day_id'      => 'required|integer',
            'day.*.available'   => 'required|in:1',
            'day.*.start_time'  => 'required|date_format:H:i',
            'day.*.end_time'    => 'required|date_format:H:i|after:day.*.start_time'
        ];
          
    }
    public function messages()
    {
        return [
            // 'day.required'                => 'Please select at least one day.',
            'day.max'                     => 'You can select maximum 7 days.',
            'day.*.available.required'    => 'The availability for all days must be specified.',
            'day.*.available.in'          => 'Invalid availability value. Please provide a valid value.',
            'day.*.start_time.required'   => 'Start time is required for all selected days.',
            'day.*.start_time.date_format'=> 'Invalid start time format. Please provide time in HH:MM format.',
            'day.*.end_time.required'     => 'End time is required for all selected days.',
            'day.*.end_time.date_format'  => 'Invalid end time format. Please provide time in HH:MM format.',
            'day.*.end_time.after'        => 'End time must be after the start time for all selected days.'
        ];
    }
}
