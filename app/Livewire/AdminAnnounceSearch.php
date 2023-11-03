<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AdminAnnounce;
class AdminAnnounceSearch extends Component
{
    public $searchAdminAnnounce='';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        
        return view('livewire.admin-announce-search', [
            'admin_announces' => AdminAnnounce::where('title','like', "%{$this->searchAdminAnnounce}%")->orderBy('updated_at','desc')->paginate(5),
        ]);
       
    }
}
