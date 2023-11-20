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
            'STUDENT NUMBER',
            'FIRST NAME',
            'LAST NAME',
            'MIDDLE NAME',
            'SUFFIX',
            'STREET',
            'BARANGAY',
            'MUNICIPALITY',
            'PROVINCE',
            'BIRTHDAY',
            'GENDER',
            'RELIGION',
            'CITIZENSHIP',
            'CIVIL STATUS',
            'GUARDIAN NAME',
            'GUARDIAN NUMBER',
            'EMAIL', 
            'YEAR ADMITTED', 
            'SEMESTER ADMITTED',
            'PROGRAM',
            'CARD NUMBER', 
            'STUDENT INCREMENT',
            'LAST UPDATE',
            'HIGH SCHOOL',
            'CURRICULUM ID',
            'PASSWORD',
            'AVATAR',
            'ROLE',
            'ACTIVE STATUS',
            'CREATED AT',
            'UPDATED AT',
            
    ];
}
}
