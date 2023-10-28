<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAnnounce extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'poster',
    ];

}
