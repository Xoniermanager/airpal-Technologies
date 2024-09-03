<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentConfigRequest extends FormRequest
{
    use ExceptionHandle;
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
        $data = $this->all();

        return [
            "doctor_id" => [
                'required',
                // Rule::unique('doctor_slots', 'user_id')->ignore($data['doctor_id'] ?? ''),
            ],
            "slot_duration" => "required|integer",
            "cleanup_interval" => "nullable|integer", 
            "start_month" => "nullable|integer|min:1|max:30",
            "start_slots_from_date" => "nullable|date", 
            "stop_slots_date" => "nullable|date|after_or_equal:start_slots_from_date",
        ];
     }

}
