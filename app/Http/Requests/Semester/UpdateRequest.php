<?php

namespace App\Http\Requests\Semester;

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
            'academic_year' => 'nullable|string|min:3|max:250',
            'semester_name' => 'nullable|string|min:3|max:250',
            'start_date'  =>  'nullable|date',
            'end_date'    =>  'nullable|date|after:start_date'
        ];
    }
}
