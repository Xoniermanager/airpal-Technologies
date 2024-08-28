<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAppointmentsRequest extends FormRequest
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
            'key'       =>  'required|in:all,today,upcoming,cancelled,confirmed,completed',
            'doctorId'  =>  'required|exists:users,id',
            'searchKey' =>  'string|max:255|nullable',
            'dateSearch' =>  'date|nullable',
        ];
    }
}
