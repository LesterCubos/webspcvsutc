<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RequestDoc;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class StudentRequestSearch extends Component
{
    public $searchStudentRequest='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $email = Session::get('email');
        $users = User::where('email', $email)->get();
        foreach ($users as $user) {
            $student_number = $user->studentNumber;
        }
        return view('livewire.student-request-search',[
            'requestdocs' => RequestDoc::where('transNo','like', "%{$this->searchStudentRequest}%")
            ->where('studentNo', $student_number)
            ->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
