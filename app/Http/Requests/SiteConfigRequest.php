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
        // return [

        //     'config' => 'required|array',
        //     'config.*.' => 'array|in:"website_name","website_url","admin_email","admin_phone","website_description","copyright","admin_address"',
        //     'config.*.name' => 'required',
        //     'config.*.value' => 'required',
        //     'config.website_logo.name' =>  'string',
        //     'config.website_logo.value' =>  'nullable|mimes:jpeg,jpg,bmp,png,gif,svg,pdf|max:2048',

        //     'config.website_favicon.name' =>  'string',
        //     'config.website_favicon.value' =>  'nullable|mimes:jpeg,jpg,bmp,png,gif,svg,pdf|max:2048',
        // ];


        return [

            // site configs 
            'config' => 'required|array',
            'config.*.' => 'array|in:"website_name","website_url","admin_email","admin_phone","website_description","copyright","admin_address","Paypal_Config"',
            'config.*.name' => 'required|string',
            'config.*.value' => 'required', 
        
            // Logo and Favicon validation (optional)
            'config.website_logo.name' => 'string',
            'config.website_logo.value' => 'nullable|mimes:jpeg,jpg,bmp,png,gif,svg,pdf|max:2048',
            'config.website_favicon.name' => 'string',
            'config.website_favicon.value' => 'nullable|mimes:jpeg,jpg,bmp,png,gif,svg,pdf|max:2048',

            'config.profile_status.name' => 'string',
            'config.profile_status.value' => 'nullable',
        
            // PayPal fields - make them nullable if not used
            'config.PAYPAL_SANDBOX_CLIENT_ID.value' => 'nullable|string', 
            'config.PAYPAL_SANDBOX_CLIENT_SECRET.value' => 'nullable|string', 
        
            'config.PAYPAL_LIVE_CLIENT_ID.value' => 'nullable|string', 
            'config.PAYPAL_LIVE_CLIENT_SECRET.value' => 'nullable|string', 
            'config.PAYPAL_LIVE_APP_ID.value' => 'nullable|string', 

            'config.PAYPAL_MODE.value' => 'required|string|in:sandbox,live',

            // social media links
            'config.facebook_link.value'  => 'nullable|url',
            'config.instagram_link.value' => 'nullable|url',
            'config.twitter_link.value'   => 'nullable|url',
            'config.linkedin_link.value'  => 'nullable|url',
        ];
        


    }
    public function messages()
    {
        return [
            'config.required' => 'The configuration data is required.',
            'config.array' => 'The configuration data must be an array.',

            'config.*.in' => 'Invalid configuration key provided. Allowed keys are: "website_name", "website_url", "admin_email", "admin_phone", "website_description", "copyright", "admin_address".',
            'config.*.name.required' => 'Each configuration must have a name.',
            'config.*.value.required' => 'Each configuration must have a value.',

            'config.website_logo.name.string' => 'The website logo name must be a string.',
            'config.website_logo.value.mimes' => 'The website logo must be a file of type: jpeg, jpg, bmp, png, gif, svg, or pdf.',
            'config.website_logo.value.max' => 'The website logo must not be larger than 2 MB.',

            'config.website_favicon.name.string' => 'The website favicon name must be a string.',
            'config.website_favicon.value.mimes' => 'The website favicon must be a file of type: jpeg, jpg, bmp, png, gif, svg, or pdf.',
            'config.website_favicon.value.max' => 'The website favicon must not be larger than 2 MB.',
        ];
    }
}
