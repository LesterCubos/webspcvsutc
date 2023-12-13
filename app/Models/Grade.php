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
        'program',
        'course_name',
        'instructor_name',
        'academic_year',
        'semester',
    ];
}
