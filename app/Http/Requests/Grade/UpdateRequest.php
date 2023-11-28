<?php

namespace App\Http\Requests\Grade;

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
            'student_number' => 'nullable|string|min:1|max:11',
            'grade' => 'nullable|string|min:1|max:5',
            // 'remarks'=> 'nullable|string|min:3|max:250',
            // 'program' => 'nullable|string|min:3|max:250',
            // 'course_name' => 'nullable|string|min:3|max:250',
            // 'instructor_name' => 'nullable|string|min:3|max:250',
        ];
    }
}
