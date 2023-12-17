<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'student_number',
        'grade',
        'remarks',
        'course_name',
        'course_title',
        'instructor_name',
        'academic_year',
        'semester',
        'units',
        'credits',
    ];
}
