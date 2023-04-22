<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityOfficial extends Model
{
    protected $fillable = [
        'official_name',
        'official_position',
        'official_contactnum',
        'official_email',
    ];
}

