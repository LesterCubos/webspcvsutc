<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramsOffered;

use App\Http\Requests\ProgramsOffered\StoreRequest;
use App\Http\Requests\ProgramsOffered\UpdateRequest;
class RequirementsProcedure extends Model
{
    protected $fillable = [
        'title',
        'content',
        'img',
    ];
}
