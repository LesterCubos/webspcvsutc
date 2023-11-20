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
            'studentNumber' => $row['student_number'],
            'firstName' => $row['first_name'],
            'lastName' => $row['last_name'],
            'middleName' => $row['middle_name'],
            'suffix' => $row['suffix'],
            'street' => $row['street'],
            'barangay' => $row['barangay'],
            'municipality' => $row['municipality'],
            'province' => $row['province'],
            'dateOfBirth' => Carbon::createFromFormat('d/m/Y', $row['date_of_birth'])->format('Y-m-d'),
            'gender' => $row['gender'],
            'religion' => $row['religion'],
            'citizenship' => $row['citizenship'],
            'status' => $row['status'],
            'guardian' => $row['guardian'],
            'mobilePhone' => $row['mobile_phone'],
            'email' => $row['email'], 
            'yearAdmitted' => $row['year_admitted'],
            'semesterAdmitted' => $row['semester_admitted'],
            'course' => $row['course'],
            'cardNumber' => $row['card_number'],
            'lastupdate' => $row['lastupdate'],
            'highschool' => $row['highschool'],
            'password' => \Hash::make($temporaryPassword),
            
        ]);
    }
}
