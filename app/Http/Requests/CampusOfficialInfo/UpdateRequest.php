<?php

namespace App\Http\Requests\CampusOfficialInfo;

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
            'name' => 'nullable|string|min:3|max:250',
            'position' => 'nullable|string|min:3|max:250',
            'contact' => 'nullable|string|min:8|max:11',
            'email' => 'nullable|string|min:3|max:250',
        ];
    }
}
