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
        return 
        [
            'education' => 'required|array',
            'education.*.name' => 'required|string|max:255',
            'education.*.course' => 'required|string|max:255',
            'education.*.start_date' => 'required|date',
            'education.*.end_date'   => 'required|date|after_or_equal:education.*.start_date',
            'education.*.certificates' =>'mimes:jpeg,jpg,bmp,png,gif,svg,pdf|max:2048',
            'user_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'education.required'                => 'Please select at least one education.',
            'education.*.name.required'         => 'Institute name is required.',
            'education.*.course.required'       => 'Please select course.',
            'education.*.certificates.mimes'    => 'The certificate must be a file of type: jpeg, bmp, png, gif, svg, or pdf.',
            'education.*.certificates.max'      => 'The certificate may not be greater than 2048 kilobytes.',
            'education.*.start_date.required'   => 'Start time is required for all selected educations.',
            'education.*.start_time.date_format'=> 'Invalid start time format. Please provide time in HH:MM format.',
            'education.*.end_date.required'     => 'End time is required for all selected educations.',
            'education.*.end_date.date_format'  => 'Invalid end time format. Please provide time in HH:MM format.',
            'education.*.end_date.after'        => 'End time must be after the start time for all selected days.'
        ];
    }

}
