<?php

namespace App\Http\Requests\News;

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
            'news_title' => 'required|string|min:3|max:250',
            'news_headline' => 'required|string|min:3|max:250',
            'news_content' => 'required|string|min:3|max:6000',
            'news_image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
