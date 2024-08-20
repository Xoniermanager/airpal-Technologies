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
        $userId = $this->input('user_id');
        $rules = [
            'education' => 'required|array',
            'education.*.name' => 'required|string|max:255',
// 'education.*.course' => [
//         'required',
//         'string',
//         'max:255',
//         function ($attribute, $value, $fail) use ($userId) {
//             // Check for duplicates in the submitted data
//             $courseIds = array_map(function($education) {
//                 return $education['course'];
//             }, $this->input('education', []));
            
//             if (count($courseIds) !== count(array_unique($courseIds))) {
//                 $fail('Duplicate courses are not allowed in the submitted data.');
//             }

//             // Check for duplicates in the database
//             foreach ($this->input('education', []) as $index => $education) {
//                 $existingEntry = \App\Models\DoctorEducation::where('user_id', $userId)
//                     ->where('course_id', $education['course'])
//                     ->where('id', '!=', $education['id'] ?? null)
//                     ->first();
//                 if ($existingEntry) {
//                     $fail('The course has already been taken for this user.');
//                 }
//             }
//         }
//     ],
            'education.*.start_date' => 'required|date',
            'education.*.end_date' => 'required|date|after_or_equal:education.*.start_date',
            'education.*.certificates' => 'nullable|mimes:jpeg,jpg,bmp,png,gif,svg,pdf|max:2048',
            'user_id' => 'required'
        ];

        return $rules;
    }
    public function messages()
    {
        return [
            'education.required'                => 'Please select at least one education.',
            'education.*.name.required'         => 'Institute name is required.',
            'education.*.course.required'       => 'Please select course.',
            'education.*.course.unique' => 'This course has already been taken for this user.',
            'education.*.certificates.mimes'    => 'The certificate must be a file of type: jpeg, bmp, png, gif, svg, or pdf.',
            'education.*.certificates.max'      => 'The certificate may not be greater than 2048 kilobytes.',
            'education.*.start_date.required'   => 'Start time is required for all selected educations.',
            'education.*.start_time.date_format'=> 'Invalid start time format. Please provide time in HH:MM format.',
            'education.*.end_date.required'     => 'End time is required for all selected educations.',
            'education.*.end_date.date_format'  => 'Invalid end time format. Please provide time in HH:MM format.',
            'education.*.end_date.after'        => 'End time must be after the start time for all selected days.'
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
