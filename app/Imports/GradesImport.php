<?php

namespace App\Imports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Course;

class GradesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $schedcode = Session::get('schedcode');
        $courses = Course::where('schedcode', $schedcode)->get();
        foreach ($courses as $course) {
            $program = $course->program;
            $course_name = $course->course_name;
            $instructor_name = $course->instructor_name;
        }

        if (is_int($row['grade'])) {
            $grade = number_format($row['grade'], 2, '.', '');
        } else {
            $grade =  $row['grade'];
        }

        return new Grade([
            'student_number' => $row['student_number'],
            'grade' => $grade,
            'remarks' => $row['remarks'],
            'year_level' => $row['year_level'],
            'program'=> $program,
            'course_name'=> $course_name,
            'instructor_name'=> $instructor_name,
        ]);
    }
}
