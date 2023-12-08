<?php

namespace App\Exports;

use App\Models\Course;
use App\Models\Legend;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CoursesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $legends = Legend::all();
        foreach ($legends as $legend) {
            $sem = $legend->semester;
            $year = $legend->schoolyear;
        }
        $courses = Course::where('acadyear', $year)->where('sem', $sem)->get();
        foreach ($courses as $course) {
            $course->generatePinCode();
            $course->save();
        }

        return Course::select('schedcode', 'course_name', 'instructor_name', 'pincode')->where('acadyear', $year)->where('sem', $sem)->get();
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
