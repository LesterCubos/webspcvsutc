<?php

namespace App\Imports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Validators\ValidationException;
use Maatwebsite\Excel\Events\BeforeImport;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Excel;
use App\Models\Course;
use App\Models\Legend;
use App\Models\EnrollSchedule;
use App\Models\EnrollSubjectEnroll;
use App\Models\EnrollSubject;

class GradesImport implements ToModel, WithHeadingRow, WithEvents
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $rowC = 0;
    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function(BeforeImport $event) {
                $activeSheet = $event->reader->getActiveSheet();
                $rowCount = $activeSheet->getHighestRow();
                $rowCount = $rowCount - 1;
                $this->rowC = $rowCount;
                $sub = EnrollSchedule::where('schedcode', Session::get('schedcode'))->first();
                $requiredRowCount = $sub->slots; // Change this to the desired number of rows

                if ($rowCount > $requiredRowCount) {
                    throw new \Exception("Too many data. Maximum rows allowed is {$requiredRowCount}. Your file has {$rowCount} rows.");
                }
            },
        ];
    }
    
    public function model(array $row)
    {
        static $rownum = 0;
        $rowName = [];
        $rowName[$rownum] = $row['student_number'];
        $rownum++;

        $schedcode = Session::get('schedcode');
        $course = Course::where('schedcode', $schedcode)->first();
        $stusubs = EnrollSubjectEnroll::where('schedcode', $schedcode)->get();
        $countstu = count($stusubs);
        $course_name = $course->course_name;
        $instructor_name = $course->instructor_name;
        $units = $course->units;
        $subTitle = EnrollSubject::where('subjectcode', $course_name)->first();
        $subjTitle = $subTitle->subjectTitle;
        

        if (EnrollSubjectEnroll::where('schedcode', $schedcode)->where('studentnumber', $row['student_number'])->exists()) {
                    
        } else {
            throw new \Exception("This Student Number {$row['student_number']} does not belong to this SCHEDCODE!!");
        }

        if ($rownum == $this->rowC) {

            if ($rownum != $countstu) {
                throw new \Exception("Looks like there is/are student number that does not have a corresponding row in the imported file.");
            }
        }

        $legend = Legend::first();
        $academic_year = $legend->schoolyear;
        $semester = $legend->semester;

        if (is_int($row['grade'])) {
            $grade = number_format($row['grade'], 2, '.', '');
            if ($grade <= 3.00) {
                $credits = $units;
            } else {
                $credits = 0;
            }
            
        } else {
            $grade =  $row['grade'];
            if ($grade <= 3.00) {
                $credits = $units;
            } else {
                $credits = 0;
            }
        }

        

        return new Grade([
            'student_number' => $row['student_number'],
            'grade' => $grade,
            'completion' => '-',
            // 'remarks' => $row['remarks'],
            'course_name'=> $course_name,
            'course_title' => $subjTitle,
            'instructor_name'=> $instructor_name,
            'academic_year' => $academic_year,
            'semester' => $semester,
            'units' => $units,
            'credits' => $credits,
        ]);
    }
}