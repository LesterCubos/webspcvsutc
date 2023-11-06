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
            'first_name' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'student_number' => 'nullable|string|min:1|max:11',
            'sex' => 'nullable|string|max:255',
            'civil_status' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|min:8','max:11',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|min:1|max:4',
            'elementary_school' => 'nullable|string|max:255',
            'juniorhigh_school' => 'nullable|string|max:255',
            'seniorhigh_school' => 'nullable|string|max:255',
            'program' => 'nullable|string|max:255',
            'undergraduate_year' => 'nullable|string|max:255',
            'student_classification' => 'nullable|string|max:255',
            'registration_status' => 'nullable|string|max:255',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_number' => 'nullable|string|min:8','max:11',
            'guardian_occupation' => 'nullable|string|max:255',
            'guardian_address' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|',
            'role' => 'nullable|in:superadmin,admin,student',
        ];
    }
}
