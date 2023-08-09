<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusOfficialInfo extends Model
{
    protected $fillable = [

        'name',
        'position',
        'contact',
        'email',
    ];
}
