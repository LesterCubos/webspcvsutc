<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'first_name' => $row['first_name'],
            'surname' => $row['surname'],
            'middle_name' => $row['middle_name'],
            'student_number' => $row['student_number'],
            'contact_number' => $row['contact_number'],
            'address' => $row['address'],
            'guardian_name' => $row['guardian_name'],
            'guardian_number' => $row['guardian_number'],
            'guardian_address' => $row['guardian_address'],
            'email' => $row['email'], 
            'password' => \Hash::make($row['password']),
        ]);
    }
}
