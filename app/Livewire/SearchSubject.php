<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\EnrollSubject;
use App\Models\Course;

class SearchSubject extends Component
{
    public $subjectSearch = '';
    public $showdiv = false;
     public $records;
     public $subjectDetails;

        // Fetch records
        public function searchResult(){

            if(!empty($this->subjectSearch)){
   
                $this->records = EnrollSubject::orderby('subjectTitle','asc')
                          ->select('*')
                          ->where('subjectTitle','like','%'.$this->subjectSearch.'%')
                          ->limit(10)
                          ->get();
   
                $this->showdiv = true;
            }else{
                $this->showdiv = false;
            }
        }

    // Fetch record by ID
    public function fetchsubjectDetail($id = 0){

        $record = EnrollSubject::select('*')
                    ->where('id',$id)
                    ->first();

        $this->subjectSearch = $record->subjectTitle;
        $this->subjectDetails = $record;
        $this->showdiv = false;
    }
    public function render()
    {
        $id = Session::get('sub_id');
        Session::put('sub_id', 0);
        $courses = Course::where('id', $id)->get();
        if ($courses->isEmpty()) {
            $subname = "Search Subject...";
        } elseif (!empty($courses)) {
            foreach ($courses as $course) {
                $subname = $course->course_name;
                $this->subjectSearch = $subname;
            }
        }
        return view('livewire.search-subject', compact('subname'));
    }
}
