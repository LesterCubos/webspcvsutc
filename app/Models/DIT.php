<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DIT extends Model
{
    protected $fillable = [
        'title',
        'content',
        'img',
    ];

}
