<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Spatie\Activitylog\Traits\LogsActivity;

class News extends Model implements Viewable
{
    use InteractsWithViews;
    protected $fillable = [
        'news_title',
        'news_headline',
        'news_content',
        'news_image',
    ];
}
