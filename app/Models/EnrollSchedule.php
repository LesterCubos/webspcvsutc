<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollSchedule extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'enrollscheduletbl';
    public $timestamps = false;
    protected $guarded =[];
}
