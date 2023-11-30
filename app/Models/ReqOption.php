<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReqOption extends Model
{

    protected $table = 'req_options';
    protected $fillable = [
       'reqoption',
       'price',
    ];
}
