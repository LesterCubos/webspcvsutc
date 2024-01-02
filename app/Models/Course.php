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
        $course_year = Session::get('course_year');
        $course_sem = Session::get('course_sem');
        
        // $lastGeneratedCode = self::where('acadyear', $course_year)
        // ->where('sem', $course_sem)
        // ->where('program',  $course_program)
        // ->where('section', $course_section)
        // ->orderBy('schedcode', 'desc')
        // ->first();

        $lastGeneratedCode = self::orderBy('schedcode', 'desc')->first();
        Session::put('last', $lastGeneratedCode);
        if ($lastGeneratedCode === null || $lastGeneratedCode->schedcode === '0') {
            $lastGeneratedCodeParts = explode($currentYear, $lastGeneratedCode->schedcode);
            $incrementedNumber = intval($lastGeneratedCodeParts[0]) + 1;
            $paddedIncrementedNumber = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
            $newScheduleCode = $currentYear . $paddedIncrementedNumber;

        } else {
            // Get the string value of the variable
            $codePartsString = strval($lastGeneratedCode->schedcode);
            // Use regular expressions to extract the 4-digit year value
            preg_match_all('!\d+!', $codePartsString, $matches);
            // Get the last matched year value (which should be the 4-digit year)
            $year = end($matches[0]);

            if ($year == $currentYear) {

                $lastGeneratedCodeParts = explode($currentYear, $lastGeneratedCode->schedcode);
                $incrementedNumber = intval($lastGeneratedCodeParts[1]) + 1;
                $paddedIncrementedNumber = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
                $newScheduleCode = $currentYear . $paddedIncrementedNumber;

                // Keep incrementing the incremented number until a unique schedcode is generated
                while (self::where('schedcode', $newScheduleCode)->exists()) {
                    $incrementedNumber++;
                    $paddedIncrementedNumber = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
                    $newScheduleCode = $currentYear . $paddedIncrementedNumber;
                }
            } else {
                // Extract the last four characters of the string as the incremented number
                $incrementedNumber = substr($lastGeneratedCode->schedcode, -4);
                // Increment the incremented number by 1
                $incrementedNumber++;
                $paddedIncrementedNumber = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
                $newScheduleCode = $currentYear . $paddedIncrementedNumber;
            }
        }

        Session::put('code', $newScheduleCode);
        $this->attributes['schedcode'] = $newScheduleCode;
    }
    public function generatePinCode()
    {
        $this->attributes['pincode'] = Str::random(6);
    }
}
