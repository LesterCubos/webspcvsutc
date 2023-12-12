<?php

namespace App\Http\Requests\ChangeInfoReq;

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
            'studentNum' => 'required|string|min:3|max:250',
            'studentName' => 'required|string|min:3|max:250',
            'request' => 'required|string|min:3|max:6000',
        ];
    }
}
