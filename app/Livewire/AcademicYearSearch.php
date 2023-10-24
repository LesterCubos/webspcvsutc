<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AcademicYear;

class AcademicYearSearch extends Component
{
    public $searchAcademicYear='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.academic-year-search', [
            'academic_years' => AcademicYear::where('name','like', "%{$this->searchAcademicYear}%")->orderBy('updated_at','desc')->paginate(5),
        ]);
    }
}
