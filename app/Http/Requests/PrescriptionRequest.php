<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionRequest extends FormRequest
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
            'booking_slot_id' => 'required|string|exists:booking_slots,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required|string',
            'medicine_detail' => 'required|array',
            'medicine_detail.*' => 'required|array',
            'medicine_detail.*.medicine_name' => 'required',
            'medicine_detail.*.quantity' => 'required',
            'medicine_detail.*.frequency' => 'required',
            'medicine_detail.*.meal_status' => 'required|boolean',
            'advice' => 'array',
            'test' => 'array',
            'test.*' => 'array',
            'test.*.name' => 'nullable|string',
            'test.*.description' => 'nullable|string',
            'follow_up' => 'nullable|date',
            'diagnosis' => 'nullable|string'
        ];
    }
}
