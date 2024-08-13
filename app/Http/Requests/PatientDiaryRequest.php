<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use App\Traits\ExceptionHandle;

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
}
