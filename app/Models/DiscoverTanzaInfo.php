<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscoverTanzaInfo extends Model
{
    protected $fillable = [
        'headline',
        'subheadline',
        'content',
        'image',
    ];
}
