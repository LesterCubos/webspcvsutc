<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CoursesExport implements FromCollection, WithHeadings
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

    public function headings(): array
{
    return [
        'SCHEDCODE', 
        'COURSE NAME', 
        'INSTRUCTOR NAME', 
        'PINCODE',
    ];
}
}
