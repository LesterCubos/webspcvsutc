<?php

namespace App\Http\Requests\DiscoverTanza;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        // make all of the fields required, set featured image to accept only images
        return [
            'headline' => 'required|string|min:3|max:250',
            'subheadline' => 'required|string|min:3|max:250',
            'content' => 'required|string|min:3|max:6000',
            'image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
