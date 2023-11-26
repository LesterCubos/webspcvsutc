<?php

Namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\EnrollCourse;
use App\Models\Course;

class SearchCourse extends Component
{
    public $courseSearch = '';
    public $showdiv = false;
     public $records;
     public $courseDetails;

        // Fetch records
        public function searchResult(){

            if(!empty($this->courseSearch)){
   
                $this->records = EnrollCourse::orderby('courseTitle','asc')
                          ->select('*')
                          ->where('courseTitle','like','%'.$this->courseSearch.'%')
                          ->limit(10)
                          ->get();
   
                $this->showdiv = true;
            }else{
                $this->showdiv = false;
            }
        }

    // Fetch record by ID
    public function fetchCourseDetail($id = 0){

        $record = EnrollCourse::select('*')
                    ->where('id',$id)
                    ->first();

        $this->courseSearch = $record->courseTitle;
        $this->courseDetails = $record;
        $this->showdiv = false;
    }

    public function render()
    {
        $id = Session::get('course_id');
        Session::put('course_id', 0);
        $courses = Course::where('id', $id)->get();
        if ($courses->isEmpty()) {
            $progname = "Search Program...";
        } elseif (!empty($courses)) {
            foreach ($courses as $course) {
                $progname = $course->program;
                $this->courseSearch = $progname;
            }
        }
        return view('livewire.search-course', compact('progname'));
    }
}
