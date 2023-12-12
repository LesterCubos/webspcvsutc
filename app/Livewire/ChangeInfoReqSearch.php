<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChangeInfoReq;
use Livewire\WithPagination;

class ChangeInfoReqSearch extends Component
{
    public $searchChangeInfoReqs='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.change-info-req-search', [
            'changeinforeqs' => ChangeInfoReq::where('studentNum','like', "%{$this->searchChangeInfoReqs}%")->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
