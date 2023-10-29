<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'program',
        'course_name',
        'instructor_name',
        'instructor_email',
        'units',
        'credits',
    ];

    public function generateSpecialCode()
{
    $this->attributes['schedcode'] = date('Y') . mt_rand(1000, 9999);
}
public function generatePinCode()
{
    $this->attributes['pincode'] = Str::random(6);
}
}
