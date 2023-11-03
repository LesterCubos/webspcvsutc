<?php

namespace App\Http\Requests\Grade;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_number' => 'required|string|min:1|max:11',
            'grade' => 'required|string|min:1|max:5',
            'remarks'=> 'required|string|min:3|max:250',
            // 'program' => 'required|string|min:3|max:250',
            // 'course_name' => 'required|string|min:3|max:250',
            // 'instructor_name' => 'required|string|min:3|max:250',
            'year_level'=> 'required|string|min:3|max:250',
        ];
    }
}
