<?php

namespace App\Http\Requests\AboutOrgs;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            
            'org_name' => 'required|string|min:3|max:250',
            'desc' => 'required|string|min:3|max:6000',
            'type' => 'required|string|min:3|max:250',
            'org_members' => 'required|string|min:3|max:6000',
            'org_logo' => 'required|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
