<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollStudentInformation extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'enrollstudentinformation';
    protected $fillable = [
        'studentNumber',
        'firstName',
        'lastName',
        'middleName',
        'suffix',
        'street',
        'barangay',
        'municipality',
        'province',
        'dateOfBirth',
        'gender',
        'religion',
        'citizenship',
        'status',
        'guardian',
        'mobilePhone',
        'email',
        'yearAdmitted',
        'semesterAdmitted',
        'course',
        'cardNumber',
        'studentincrement',
        'lastupdate',
        'highschool',
        'curriculumid',
    ];
}
