<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithPagination;

class AnnouncementSearch extends Component
{
    public $searchAnnouncement='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.announcement-search',[
            'announcements' => Announcement::where('title','like', "%{$this->searchAnnouncement}%")->paginate(5),
        ]);
    }
}
