<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use App\Models\State;


use Illuminate\Foundation\Http\FormRequest;

class UpdateStateRequest extends FormRequest
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
        $stateId = $this->route('state');
        return [
            'state_id'      => ['required', 'exists:states,id'],
            'country_id'    => ['required', 'exists:countries,id'],
            'name'          => [
                'required',
                'string',
                 Rule::unique('states')->ignore($stateId),
            ],
        ];
    }

}
