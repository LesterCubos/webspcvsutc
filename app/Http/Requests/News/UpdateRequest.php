<?php

namespace App\Http\Requests\News;

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
            'news_title' => 'nullable|string|min:3|max:250',
            'news_headline' => 'nullable|string|min:3|max:250',
            'news_content' => 'nullable|string|min:3|max:6000',
            'news_image' => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
