<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['string', 'max:255'],
            'lastName' => ['string', 'max:255'],
            'middleName' => ['string', 'max:255'],
            'studentNumber' => ['string', 'min:1', 'max:9'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'gender' => ['string', 'max:255'],
            'status' => ['string', 'max:255'],
            'citizenship' => ['string', 'max:255'],
            'religion' => ['string', 'max:255'],
            'dateOfBirth' => ['date'],
            'mobilePhone' => ['string', 'min:8','max:11'],
            'street' => ['string', 'max:255'],
            'barangay' => ['string', 'max:255'],
            'municipality' => ['string', 'max:255'],
            'province' => ['string', 'max:255'],
        ];
    }
}
