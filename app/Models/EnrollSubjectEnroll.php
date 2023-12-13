<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollSubjectEnroll extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'enrollsubjectenrolled';
    public $timestamps = false;
    protected $guarded =[];
}