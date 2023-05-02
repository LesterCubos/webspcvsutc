<?php

namespace App\Http\Requests\Admission;

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
        // make all of the fields required, set featured image to accept only images
        return [
            'title' => 'nullable|string|min:3|max:250',
            'descrip' => 'nullable|string|min:3|max:6000',
            // 'status' => 'nullable|boolean:0,1,true,false',
        ];
    }
}
