<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteConfigRequest extends FormRequest
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
            
            // 'config' => 'required|array',
            // 'config.*.' => 'array|in:"site_name","site_url","admin_email","admin_phone" ,"website_logo","website_favicon","website_description" ',
            // 'config.*.name' => 'required',
            // 'config.*.value' => 'required'

            'config' => 'required|array',
            'config.*.' => 'array|in:"website_name","website_url","admin_email","admin_phone","website_description"',
            'config.*.name' => 'required',
            'config.*.value' => 'required',
            'config.website_logo.name' =>  'string',
            'config.website_logo.value' =>  'nullable|mimes:jpeg,jpg,bmp,png,gif,svg,pdf|max:2048',

            'config.website_favicon.name' =>  'string',
            'config.website_favicon.value' =>  'nullable|mimes:jpeg,jpg,bmp,png,gif,svg,pdf|max:2048',
        ];
    }
}
