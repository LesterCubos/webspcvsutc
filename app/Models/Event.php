<?php

namespace App\Models;
namespace Latfur\Event\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['set_end_date_data'];
}
