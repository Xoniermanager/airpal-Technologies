<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentQueriesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'booking_id' => 'required|integer|exists:booking_slots,id',
        ];


        foreach ($this->request->all() as $key => $value) {
            if (preg_match('/^question_\d+$/', $key)) {
                if (is_array($value)) {
                    $rules[$key] = 'array|min:1'; // Ensure at least one checkbox is selected
                } else {
                    $rules[$key] = 'required|string'; // For text and radio inputs
                }
            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'doctor_id.required' => 'Doctor ID is required.',
            'doctor_id.integer' => 'Doctor ID must be an integer.',
            'doctor_id.exists' => 'Doctor ID must exist in the doctors table.',
            'patient_id.required' => 'Patient ID is required.',
            'patient_id.integer' => 'Patient ID must be an integer.',
            'patient_id.exists' => 'Patient ID must exist in the patients table.',
        ];

        foreach ($this->request->all() as $key => $value) {
            if (preg_match('/^question_\d+$/', $key)) {
                if (is_array($value)) {
                    $messages[$key . '.array'] = 'The question must be an array.';
                    $messages[$key . '.min'] = 'You must select at least one option for this question.';
                } else {
                    $messages[$key . '.required'] = 'This question is required.';
                    $messages[$key . '.string'] = 'The question must be a string.';
                }
            }
        }

        return $messages;
    }
}
