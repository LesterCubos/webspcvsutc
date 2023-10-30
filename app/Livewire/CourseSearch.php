<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;

class CourseSearch extends Component
{
    public $searchCourse='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.course-search', [
            'courses' => Course::where('course_name','like', "%{$this->searchCourse}%")->orderBy('updated_at','desc')->paginate(5),
        ]);
    }
}
