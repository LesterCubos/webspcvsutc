<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use Livewire\WithPagination;

class NewsSearch extends Component
{
    public $searchNews='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.news-search',[
            'news' => News::where('news_headline','like', "%{$this->searchNews}%")->paginate(5),
        ]);
    }
}
