<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Announcement extends Model implements Viewable
{
    use InteractsWithViews;
    protected $fillable = [
        'title',
        'content',
        'poster',
    ];

}
