<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickLinks extends Model
{
    protected $fillable = [
        'name',
        'link',
    ];
}
