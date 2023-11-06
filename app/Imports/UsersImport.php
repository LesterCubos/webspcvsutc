<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $temporaryPassword = 'temporaryPassword123.';

        return new User([
            'first_name' => $row['first_name'],
            'surname' => $row['surname'],
            'middle_name' => $row['middle_name'],
            'student_number' => $row['student_number'],
            'sex' => $row['sex'],
            'civil_status' => $row['civil_status'],
            'nationality' => $row['nationality'],
            'religion' => $row['religion'],
            'age' => $row['age'],
            'birthday' => Carbon::createFromFormat('d/m/Y', $row['birthday'])->format('Y-m-d'),
            'birth_place' => $row['birth_place'],
            'contact_number' => $row['contact_number'],
            'address' => $row['address'],
            'postal_code' => $row['postal_code'],
            'elementary_school' => $row['elementary_school'],
            'juniorhigh_school' => $row['juniorhigh_school'],
            'seniorhigh_school' => $row['seniorhigh_school'],
            'program' => $row['program'],
            'undergraduate_year' => $row['undergraduate_year'],
            'student_classification' => $row['student_classification'],
            'registration_status' => $row['registration_status'],
            'guardian_name' => $row['guardian_name'],
            'guardian_number' => $row['guardian_number'],
            'guardian_occupation' => $row['guardian_occupation'],
            'guardian_address' => $row['guardian_address'],
            'email' => $row['email'], 
            'password' => \Hash::make($temporaryPassword),
        ]);
    }
}
