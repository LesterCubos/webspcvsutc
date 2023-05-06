<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoM extends Model
{
    protected $fillable = [
        'title',
        'content',
        'img',
    ];

}
