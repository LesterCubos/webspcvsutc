<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Grade;

class StudentGradeSearch extends Component
{
    public $searchStudentGrade='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $studentNumber = Session::get('studentNumber');
        $users = User::where('studentNumber', $studentNumber)->get();
        foreach ($users as $user) {
            $student_number = $user->studentNumber;
        }
        return view('livewire.student-grade-search',[
            'grades' => Grade::where('academic_year','like', "%{$this->searchStudentGrade}%")
            ->where('student_number',$student_number)
            ->orderBy('updated_at','desc')
            ->paginate(5),
        ]);
    }
}
