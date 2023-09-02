<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancies extends Model
{
    protected $fillable = [
        'title',
        'description',
        'jobposter',
    ];
}