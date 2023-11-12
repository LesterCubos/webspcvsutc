<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Semester;

class SemesterSearch extends Component
{
    public $searchSemester='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.semester-search', [
            'semesters' => Semester::where('semester_name','like', "%{$this->searchSemester}%")->orderBy('updated_at','desc')->paginate(5),
        ]);
    }
}
