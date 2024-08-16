<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalRecordRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'              => 'required|string',
            'date'              => 'required|date',
            'description'       => 'required|string',
            'file'              => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf|max:2048',
            'booking_slot_id'   => 'exists:booking_slots,id|nullable',
        ];
    }
}
