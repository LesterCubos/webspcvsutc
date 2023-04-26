<?php

namespace App\Http\Requests\Carousel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // dont' forget to set this as true
        return true;
    }

    public function rules(): array
    {
        // make all of the fields nullable, set featured image to accept only images
        return [
            'title' => 'nullable|string|min:3|max:250',
            'content' => 'nullable|string|min:3|max:6000',
            'program_image' => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
