<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorPageSwitch extends Model
{
    protected $fillable = [
        'name',
        'isActive',
    ];
}
