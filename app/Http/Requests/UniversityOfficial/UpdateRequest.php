<?php

namespace App\Http\Requests\UniversityOfficial;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'official_name' => 'nullable|string|min:3|max:250',
            'official_position' => 'nullable|string|min:3|max:250',
            'official_contactnum' => 'nullable|string|min:8|max:11',
            'official_email' => 'nullable|string|min:3|max:250',
        ];
    }
}
