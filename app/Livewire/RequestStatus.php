<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RequestDoc;
use Illuminate\Support\Facades\Session;

class RequestStatus extends Component
{
    public $selectedStatus;
    public $options = ['Pending', 'Processing', 'Completed'];
    public function mount()
    {
        $transNo = Session::get('transNo');
        $requestdocs = RequestDoc::where('transNo', $transNo)->get();
        foreach ($requestdocs as $requestdoc) {
            $value = $requestdoc->status;
        }
        $this->selectedStatus = $value;
    }
    public function radioClicked($option)
    {
        // React to the radio button click here
        $this->selectedStatus = $option;

        $transNo = Session::get('transNo');
        $requestdocs = RequestDoc::where('transNo', $transNo)->get();
        foreach ($requestdocs as $requestdoc) {
            $requestdoc->status = $option;
            $requestdoc->save();
        }
    }
    public function render()
    {
        return view('livewire.request-status');
    }
}
