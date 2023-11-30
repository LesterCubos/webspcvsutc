<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ReqOption;
use Livewire\WithPagination;

class ReqoptionSearch extends Component
{
    public $searchReqoptions='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.reqoption-search', [
            'reqoptions' => ReqOption::where('reqoption','like', "%{$this->searchReqoptions}%")->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
