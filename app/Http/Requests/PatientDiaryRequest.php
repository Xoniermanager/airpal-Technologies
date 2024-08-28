<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
 use App\Traits\ExceptionHandle;

class PatientDiaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // use ExceptionHandle;

    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'morning_breakfast' => 'required|boolean',
            'afternoon_lunch' => 'required|boolean',
            'night_dinner' => 'required|boolean',
            'morning_medicine' => 'required|boolean',
            'afternoon_medicine' => 'required|boolean',
            'night_medicine' => 'required|boolean',
            'reason_morning_breakfast' => 'required_if:morning_breakfast,==,0',
            'reason_afternoon_lunch' => 'required_if:afternoon_lunch,==,0',
            'reason_night_dinner' => 'required_if:night_dinner,==,0',
            'reason_morning_medicine' => 'required_if:morning_medicine,==,0',
            'reason_afternoon_medicine' => 'required_if:afternoon_medicine,==,0',
            'reason_night_medicine' => 'required_if:night_medicine,==,0',
            'total_sleep_hr' => 'required|decimal:0,2',
            'oxygen_level' => 'nullable|required|decimal:0,2',
            'weight' => 'nullable|required|decimal:0,2',
            'glucose' => 'nullable|sometimes|decimal:0,2',
            'pulse_rate' => 'nullable|sometimes|decimal:0,2',
            'bp' => 'nullable|sometimes|decimal:0,2',
            'avg_body_temp' => 'nullable|sometimes|decimal:0,2',
            'avg_heart_beat' => 'nullable|sometimes|decimal:0,2',
            'note' => 'required|string',
            'health_progress' => 'required|in:Feeling Good,Feeling Better,Not Good,No Changes At All',
            'side_effect' => 'nullable|sometimes|string',
            'improvement' => 'nullable|sometimes|string'
        ];
    }

        public function messages()
        {
            return [
                'morning_breakfast.required' => 'Please indicate whether you had breakfast in the morning.',
                'afternoon_lunch.required' => 'Please indicate whether you had lunch in the afternoon.',
                'night_dinner.required' => 'Please indicate whether you had dinner at night.',
                'morning_medicine.required' => 'Please indicate whether you took your morning medicine.',
                'afternoon_medicine.required' => 'Please indicate whether you took your afternoon medicine.',
                'night_medicine.required' => 'Please indicate whether you took your night medicine.',

                'reason_morning_breakfast.required_if' => 'Please provide a reason if you did not have breakfast in the morning.',
                'reason_afternoon_lunch.required_if' => 'Please provide a reason if you did not have lunch in the afternoon.',
                'reason_night_dinner.required_if' => 'Please provide a reason if you did not have dinner at night.',
                'reason_morning_medicine.required_if' => 'Please provide a reason if you did not take your morning medicine.',
                'reason_afternoon_medicine.required_if' => 'Please provide a reason if you did not take your afternoon medicine.',
                'reason_night_medicine.required_if' => 'Please provide a reason if you did not take your night medicine.',

                'total_sleep_hr.required' => 'Please enter the total hours of sleep.',
                'total_sleep_hr.decimal' => 'The total sleep hours must be a decimal value with up to two decimal places.',

                'oxygen_level.required' => 'Please enter the oxygen level.',
                'oxygen_level.decimal' => 'The oxygen level must be a decimal value with up to two decimal places.',

                'weight.required' => 'Please enter your weight.',
                'weight.decimal' => 'The weight must be a decimal value with up to two decimal places.',

                'glucose.decimal' => 'The glucose level must be a decimal value with up to two decimal places.',
                'pulse_rate.decimal' => 'The pulse rate must be a decimal value with up to two decimal places.',
                'bp.decimal' => 'The blood pressure must be a decimal value with up to two decimal places.',
                'avg_body_temp.decimal' => 'The average body temperature must be a decimal value with up to two decimal places.',
                'avg_heart_beat.decimal' => 'The average heart beat must be a decimal value with up to two decimal places.',

                'note.required' => 'Please provide a note.',
                'note.string' => 'The note must be a valid string.',

                'health_progress.required' => 'Please select your health progress.',
                'health_progress.in' => 'The selected health progress is invalid. It must be one of the following: Feeling Good, Feeling Better, Not Good, No Changes At All.',

                'side_effect.string' => 'The side effect must be a valid string.',
                'improvement.string' => 'The improvement note must be a valid string.',
            ];
        }


}
