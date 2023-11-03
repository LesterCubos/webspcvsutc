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

        return view('livewire.grades-search',[
            'grades' => Grade::where('student_number','like', "%{$this->searchGrade}%")->orderBy('updated_at','desc')->paginate(5),
            'courses' => Course::where('schedcode', $schedcode)->get(),
        ]);
    }
}
