<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorEducationRequest extends FormRequest
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
        //     'day'               => 'required|array|max:7',
        //     'day.*'             => 'required|array',
        //     'day.*.available'   => 'required|in:1',
        //     'day.*.start_time'  => 'required|date_format:H:i',
        //     'day.*.end_time'    => 'required|date_format:H:i|after:day.*.start_time'
        // ];

        return 
        [
            "education.*"               => 'required|array',
            'education.name.*'          => 'required|string',
            'education.course.*'        => 'required|string',
            'education.start_date.*'    => 'required|date_format:y/m/d',
            'education.end_date.*'      => 'required|date_format:y/m/d',
            // 'user_id'                   => 'required'
        ];
    }
}
