<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutOrgs extends Model
{
    protected $fillable = [
        'org_name',
        'desc',
        'type',
        'org_members',
        'org_logo',
    ];
}
