<?php

namespace App\Http\Requests\StudentInformation;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'dateOfBirth' => 'nullable|date',
            'gender' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'citizenship' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'municipality' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'highschool' => 'nullable|string|max:255',
            'guardian' => 'nullable|string|max:255',
            'mobilePhone' => 'nullable|string|min:8','max:11',
        ];
    }
}
