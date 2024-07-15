<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorAwardRequest extends FormRequest
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
            'awards' => 'required|array',
            'awards.*.year' => 'required',
            'awards.*.description' => 'nullable|string',
            'awards.*.certificates' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            // 'awards.*.name' => [
            //     'required',
            //     function ($attribute, $value, $fail) use ($userId) {
            //         // Check for duplicates in the submitted data
            //         $awardNames = array_map(function($award) {
            //             return $award['name'];
            //         }, $this->input('awards', []));
        
            //         if (count($awardNames) !== count(array_unique($awardNames))) {
            //             $fail('Duplicate award names are not allowed in the submitted data.');
            //         }
        
            //         // Check for duplicates in the database
            //         foreach ($this->input('awards', []) as $index => $award) {
            //             $existingEntry = \App\Models\DoctorAward::where('user_id', $userId)
            //                 ->where('award_id', $award['name'])
            //                 ->where('id', '!=', $award['id'] ?? null)
            //                 ->first();
            //             if ($existingEntry) {
            //                 $fail("The award has already been taken for this user at index $index.");
            //             }
            //         }
            //     },
            // ]
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'awards.*.name.unique' => 'This award has already been added for this user.',
            'awards.*.name.required' => 'Please select award name.',
            'awards.*.year.required' => 'Please provide year.',
            'awards.*.description.required' => 'Please provide description.',
            'awards.*.certificates.mimes' => 'The certificate must be a file of type: jpeg, jpg , bmp, png, gif, svg, or pdf.',
            'awards.*.certificates.max' => 'The certificate may not be greater than 2048 kilobytes.',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = $this->expectsJson() 
            ? new \Illuminate\Http\JsonResponse([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422)
            : redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
