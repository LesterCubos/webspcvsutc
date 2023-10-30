<?php

namespace App\Http\Requests\Course;

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
            'program' => 'nullable|string|min:3|max:250',
            'course_name' => 'nullable|string|min:3|max:250',
            'instructor_name' => 'nullable|string|min:3|max:250',
            'instructor_email'=> 'nullable|string|min:3|max:250',
            'year_level'=> 'nullable|string|min:3|max:250',
            'units' => 'nullable|integer',
            'credits' => 'nullable|integer',
        ];
    }
}
