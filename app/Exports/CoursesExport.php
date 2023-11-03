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
        return Course::select('schedcode', 'course_name', 'instructor_name', 'pincode')->where('isActive', '1')->get();
    }
}
