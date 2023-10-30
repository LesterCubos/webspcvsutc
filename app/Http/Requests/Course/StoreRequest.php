<?php

namespace App\Http\Requests\Course;

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
            'program' => 'required|string|min:3|max:250',
            'course_name' => 'required|string|min:3|max:250',
            'instructor_name' => 'required|string|min:3|max:250',
            'instructor_email'=> 'required|string|min:3|max:250',
            'units' => 'required|integer',
            'credits' => 'required|integer',
        ];
    }
}
