<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'academic_year', 
        'semester_name', 
        'start_date',
        'end_date',
    ];
}
