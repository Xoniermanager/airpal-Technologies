<?php

namespace App\Http\Requests;

use App\Traits\ExceptionHandle;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorPersonalDetailRequest extends FormRequest
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

            'first_name'   => 'required',
            'last_name'    => 'required',  
            'display_name' => 'sometimes|required',
            'gender'       => 'sometimes|required',
            'phone'        => 'required',
            'email'        => 'required|email',
            'languages'    => 'sometimes|required',
            'password'     => 'sometimes|required|string',
            'image'        => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'specialities' => 'sometimes|required',
            'description'  => 'sometimes|required|string',
            'services'     => 'sometimes|required',



            // 'first_name'   => 'required',
            // 'last_name'    => 'required',  
            // 'display_name' => 'required',
            // 'gender'       => 'required',
            // 'phone'        => 'required',
            // 'email'        => 'required|email',
            // 'name'         => 'required',
            // 'password'     => 'sometimes|required|string',
            // 'image'        => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'specialities' => 'required',
            // 'description'  => 'required|string',
            // 'services'     => 'required',
        ];
    }
    
}