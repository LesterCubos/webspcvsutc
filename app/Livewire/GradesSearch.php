<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use App\Models\Grade;
use App\Models\Course;

class GradesSearch extends Component
{
    public $searchGrade='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $schedcode = Session::get('schedcode');

        $courses = Course::where('schedcode', $schedcode)->get();
        foreach ($courses as $course) {
            $instructor_name = $course->instructor_name;
            $course_name = $course->course_name;
        }

        return view('livewire.grades-search',[
            'grades' => Grade::where('student_number','like', "%{$this->searchGrade}%")
            ->where('instructor_name', $instructor_name)
            ->where('course_name', $course_name)
            ->orderBy('updated_at','desc')
            ->paginate(5),
            'courses' => Course::where('schedcode', $schedcode)->get(),
        ]);
    }
}
