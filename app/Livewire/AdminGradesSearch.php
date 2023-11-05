<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Grade;

class AdminGradesSearch extends Component
{
    public $searchAdminGrade='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.admin-grades-search',[
            'grades' => Grade::where('student_number','like', "%{$this->searchAdminGrade}%")->orderBy('updated_at','desc')->paginate(5),
        ]);
    }
}
