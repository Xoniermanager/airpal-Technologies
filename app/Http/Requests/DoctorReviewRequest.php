<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Foundation\Http\FormRequest;

class DoctorReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    use ExceptionHandle;

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
            'doctor_id' => 'required|exists:users,id,role,2',
            'review' => 'required|string',
            'rating' => 'required|numeric|min:0.5|max:5'
        ];
    }
}
