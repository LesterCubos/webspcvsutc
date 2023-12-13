<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\ChangeInfoReq;

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
            'users' => User::where('studentNumber','like', "%{$this->searchStudent}%")
            ->where('role', 'student')
            ->where('isActive', '1')
            ->orderBy('updated_at','desc')->paginate(10),
            'pendingChange' => ChangeInfoReq::where('status', 'Pending')->count()
        ]);
    }
}
