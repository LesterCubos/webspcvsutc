<?php

namespace App\Http\Requests\ContactInfo;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'campus_address' => 'required|string|min:3|max:6000',
            'campus_number' => 'required|string|min:8|max:11',
            'campus_email' => 'required|string|min:3|max:250',
        ];
    }
}
