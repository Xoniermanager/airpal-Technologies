<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorExperienceRequest extends FormRequest
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
             "experience"               => 'required|array',
             'experience.job_title.*'   => 'required|string',
             'experience.description.*' => 'required|string',
             'experience.location.*'    => 'required|string',
             'experience.hospital.*'    => 'required|array',
             'experience.start_date.*'  => 'required|date_format:m/d/Y',
             'experience.end_date.*'    => 'required|date_format:m/d/Y',
             'user_id'                  => 'required'
        ];
    }
}
