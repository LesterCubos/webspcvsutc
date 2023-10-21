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
            'first_name' => ['string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'student_number' => ['string', 'min:1', 'max:9'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'role' => ['in:superadmin,admin,student'],
            'sex' => ['string', 'max:255'],
            'civil_status' => ['string', 'max:255'],
            'nationality' => ['string', 'max:255'],
            'religion' => ['string', 'max:255'],
            'age' => ['string', 'max:255'],
            'birthday' => ['date'],
            'birth_place' => ['string', 'max:255'],
            'contact_number' => ['string', 'min:8','max:11'],
            'address' => ['string', 'max:255'],
            'postal_code' => ['string', 'min:1', 'max:4'],
            'elementary_school' => ['string', 'max:255'],
            'juniorhigh_school' => ['string', 'max:255'],
            'seniorhigh_school' => ['string', 'max:255'],
            'program' => ['string', 'max:255'],
            'undergraduate_year' => ['string', 'max:255'],
            'student_classification' => ['string', 'max:255'],
            'registration_status' => ['string', 'max:255'],
            'guardian_name' => ['string', 'max:255'],
            'guardian_number' => ['string', 'min:8','max:11'],
            'guardian_occupation' => ['string', 'max:255'],
            'guardian_address' => ['string', 'max:255'],  
        ];
    }
}
