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
        $awardId = $this->input('award_id');
        
        $rules = [
            'awards' => 'required|array',
            'awards.*.year' => 'required',
            'awards.*.description' => 'nullable|string',
            'awards.*.certificates' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ];

        foreach ($this->input('awards', []) as $index => $award) {
            $rules["awards.$index.name"] = [
                'required',
                Rule::unique('doctor_awards', 'award_id')
                    ->where(function ($query) use ($userId) {
                        return $query->where('user_id', $userId);
                    })
                    ->ignore($award['id'] ?? null),
            ];
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'awards.*.name.unique' => 'This award has already been added for this user.',
            'awards.*.name.required'  => 'Please select award name.',
            'awards.*.year.required'  => 'Please provide year.',
            'awards.*.description.required'=> 'Please provide description.',
            'awards.*.certificates.mimes'      => 'The certificate must be a file of type: jpeg, jpg , bmp, png, gif, svg, or pdf.',
            'awards.*.certificates.max'        => 'The certificate may not be greater than 2048 kilobytes.',
            
        ];
    }
}
