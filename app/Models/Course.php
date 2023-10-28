<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'schedcode',
        'program',
        'course_name',
        'instructor_name',
        'instructor_email',
        'units',
        'credits',
    ];
}
