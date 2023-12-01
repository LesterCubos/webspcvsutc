<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RequestDoc;
use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Component
{
    public $options = ['Pending', 'Processing', 'Complete'];
    public $selectedOption;
    public function render()
    {
        return view('livewire.request-status');
    }
    public function store()
    {
        RequestDoc::create(['status' => $this->selectedOption]);
    }
}
