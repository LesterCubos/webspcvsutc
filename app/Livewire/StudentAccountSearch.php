<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EnrollStudentInformation;

class StudentAccountSearch extends Component
{
    public $searchStudent='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.student-account-search', [
            'students' => EnrollStudentInformation::where('studentNumber','like', "%{$this->searchStudent}%")->orderBy('lastupdate','desc')->paginate(10),
        ]);
    }
}
