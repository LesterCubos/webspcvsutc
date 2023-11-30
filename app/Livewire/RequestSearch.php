<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RequestDoc;
use Livewire\WithPagination;

class RequestSearch extends Component
{
    public $searchRequests='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.request-search',[
            'requestdocs' => RequestDoc::where('req','like', "%{$this->searchRequests}%")->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
