<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class Course extends Model
{
    protected $fillable = [
        'program',
        'course_name',
        'instructor_name',
        'instructor_email',
        'section',
        'units',
    ];

    public function generateSpecialCode()
    {
        $currentYear = date('Y');
        $course_program = Session::get('course_program');
        $course_section = Session::get('course_section');
        $lastGeneratedCode = self::orderBy('schedcode', 'desc')->first();

        // If there are no existing sections, initialize the new schedule code to the current year followed by zero-padded incremented number
        if (!$lastGeneratedCode) {
            $newScheduleCode = $currentYear . '0000';
        } else {
            $lastGeneratedCodeParts = explode($currentYear, $lastGeneratedCode->schedcode);
            $incrementedNumber = intval($lastGeneratedCodeParts[0]) + 1;
            $paddedIncrementedNumber = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
            $newScheduleCode = $currentYear . $paddedIncrementedNumber;

            // Keep incrementing the incremented number until a unique schedcode is generated
            while (self::where('schedcode', $newScheduleCode)->exists()) {
                $incrementedNumber++;
                $paddedIncrementedNumber = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
                $newScheduleCode = $currentYear . $paddedIncrementedNumber;
            }
        }

        $this->attributes['schedcode'] = $newScheduleCode;
    }
    public function generatePinCode()
    {
        $this->attributes['pincode'] = Str::random(6);
    }
}
