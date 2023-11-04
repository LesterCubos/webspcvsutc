<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoursesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $courses = Course::where('isActive', '1')->get();
        foreach ($courses as $course) {
            $course->generatePinCode();
            $course->save();
        }

        return Course::select('schedcode', 'course_name', 'instructor_name', 'pincode')->where('isActive', '1')->get();
    }
}
