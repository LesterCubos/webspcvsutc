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
        return User::select('studentNumber', 'firstName', 'lastName', 'middleName', 'email','tempPassword')->where('tempPassword' , '!=', '0')->get();
    }

    public function headings(): array
{
    return [
            'STUDENT NUMBER',
            'FIRST NAME',
            'LAST NAME',
            'MIDDLE NAME',
            'EMAIL',
            'TEMPPASSWORD',
            
    ];
}
}
