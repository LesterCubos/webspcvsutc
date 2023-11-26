<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollCourse extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'enrollcoursetbl';
    public $timestamps = false;
    protected $guarded =[];
}
