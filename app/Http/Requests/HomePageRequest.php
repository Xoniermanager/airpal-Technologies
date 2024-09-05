<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomePageRequest extends FormRequest
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
                // 'homepage_banner_section.image'    => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
                // 'homepage_banner_section.title'    => 'sometimes|string|max:50',
                // 'homepage_banner_section.subtitle' => 'sometimes|string|max:50',
                // 'homepage_banner_section.btntext'  => 'sometimes|string|max:30',
                // 'homepage_banner_section.btnlink'  => 'sometimes|string|max:50|url',

                
            ];
   
        
    }
}
