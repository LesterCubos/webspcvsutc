<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class StudentInformationsSearch extends Component
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
        return view('livewire.student-informations-search',[
            'users' => User::where('student_number','like', "%{$this->searchStudent}%")
            ->where('role', 'student')
            ->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
