<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CarouselItem;
use Livewire\WithPagination;

class CarouselSearch extends Component
{
    public $searchCarousel='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.carousel-search',[
            'carouselitems' => CarouselItem::where('title','like', "%{$this->searchCarousel}%")->orderBy('updated_at','desc')->paginate(5),
        ]);
    }
}
