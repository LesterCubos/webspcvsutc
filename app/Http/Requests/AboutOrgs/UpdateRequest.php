<?php

namespace App\Http\Requests\AboutOrgs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'org_name' => 'nullable|string|min:3|max:250',
            'desc' => 'nullable|string|min:3|max:6000',
            'type' => 'nullable|string|min:3|max:250',
            'org_members' => 'nullable|string|min:3|max:6000',
        ];
    }
}
