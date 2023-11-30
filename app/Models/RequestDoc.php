<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDoc extends Model
{
    protected $fillable = [
        'transNo',
        'dateReq',
        'aYear',
        'sem',
        'prog',
        'studentName',
        'studentNo',
        'req',
        'purpose',
        'totalPrice',
    ];
}
