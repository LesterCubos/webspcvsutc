<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollGradeChoices extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'enrollgradechoicestbl';
    public $timestamps = false;
    protected $guarded =[];
}
