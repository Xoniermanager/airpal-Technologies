<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Foundation\Http\FormRequest;

class GetSelectedChatHistoryRequest extends FormRequest
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
        return [
            'receiver_user_id'  =>  'required|integer|exists:users,id',
            'read_status'       =>  'boolean'
        ];
    }
}
