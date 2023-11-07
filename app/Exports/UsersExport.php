<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
{
    return [
            'ID',
            'FIRST NAME',
            'SURNAME',
            'MIDDLE NAME',
            'STUDENT NUMBER',
            'SEX',
            'CIVIL STATUS',
            'NATIONALITY',
            'RELIGION',
            'AGE',
            'BIRTHDAY',
            'BIRTH PLACE',
            'CONTACT NUMBER',
            'ADDRESS',
            'POSTAL CODE',
            'ELEMENTARY SCHOOL',
            'JUNIORHIGH SCHOOL',
            'SENIORHIGH SCHOOL',
            'PROGRAM',
            'UNDERGRADUATE YEAR',
            'STUDENT CLASSIFICATION',
            'REGISTRATION STATUS',
            'GUARDIAN NAME',
            'GUARDIAN NUMBER',
            'GUARDIAN OCCUPATION',
            'GUARDIAN ADDRESS',
            'EMAIL', 
            'PASSWORD',
            'AVATAR',
            'ROLE',
            'ISACTIVE',
            'CREATED AT',
            'UPDATED AT',
    ];
}
}
