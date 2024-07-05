<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        $userId = $this->input('user_id');
        $rules = [
            'experience' => 'required|array',
            'experience.*.job_title' => 'required|string|max:255',
            'experience.*.location' => 'required|string|max:255',
            'experience.*.hospital' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($userId) {
                    // Check for duplicates in the submitted data
                    $hospitalIds = array_map(function ($experience) {
                        return $experience['hospital'];
                    }, $this->input('experience', []));

                    if (count($hospitalIds) !== count(array_unique($hospitalIds))) {
                        $fail('Duplicate hospitals are not allowed in the submitted data.');
                    }

                    // Check for duplicates in the database
                    foreach ($this->input('experience', []) as $index => $experience) {
                        $existingEntry = \App\Models\DoctorExperience::where('user_id', $userId)
                            ->where('hospital_id', $experience['hospital'])
                            ->where('id', '!=', $experience['id'] ?? null)
                            ->first();
                        if ($existingEntry) {
                            $fail("The hospital has already been taken for this user at index $index.");
                        }
                    }
                }
            ],
            'experience.*.description' => 'nullable|string',
            'experience.*.certificates' => 'nullable|mimes:jpeg,jpg,bmp,png,gif,svg,pdf|max:2048',
            'experience.*.start_date' => 'required|date_format:Y-m-d',
            'experience.*.end_date' => 'required|date_format:Y-m-d|after_or_equal:experience.*.start_date',
            'user_id' => 'required'
        ];

        return $rules;
    }
    public function messages()
    {
        return [

            'experience.*.job_title.required'     => 'Please provide job title.',
            'experience.*.location.required'      => 'Location is required for all selected experiences.',
            'experience.*.start_date.required'    => 'Please provide start date.',
            'experience.*.hospital.unique' => 'This hospital experience has already been added for this user.',
            'education.*.certificates.mimes'      => 'The certificate must be a file of type: jpeg, bmp, png, gif, svg, or pdf.',
            'education.*.certificates.max'        => 'The certificate may not be greater than 2048 kilobytes.',
            'experience.*.start_date.date_format' => 'Invalid start Date format. Please provide date in : Y-m-d format.',
            'experience.*.hospital.required'      => 'Hospital is required for all selected experiences.',
            'experience.*.end_date.date_format'   => 'Invalid end Date format. Please provide date in Y-m-d format.',
            'experience.*.end_date.required'      => 'Please provide end date.',
            'experience.*.end_date.after_or_equal' => 'End date must be after or equal to the start date for all selected experiences.'

        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new \Illuminate\Http\JsonResponse([
            'status' => 'error',
            'message' => $validator->errors()->first()
        ], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
