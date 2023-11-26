<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legend extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'legend';
    public $timestamps = false;
    protected $guarded =[];
}
