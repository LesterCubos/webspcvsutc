<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChangeInfoReq;
use Illuminate\Support\Facades\Session;

class ChangeInfoReqStatus extends Component
{
    public $selectedStatus;
    public $options = ['Pending', 'Completed'];
    public function mount()
    {
        $idNo = Session::get('idNo');
        $changeinforeqs = ChangeInfoReq::where('id', $idNo)->get();
        foreach ($changeinforeqs as $changeinforeq) {
            $value = $changeinforeq->status;
        }
        $this->selectedStatus = $value;
    }
    public function radioClicked($option)
    {
        // React to the radio button click here
        $this->selectedStatus = $option;

        $idNo = Session::get('idNo');
        $changeinforeqs = ChangeInfoReq::where('id', $idNo)->get();
        foreach ($changeinforeqs as $changeinforeq) {
            $changeinforeq->status = $option;
            $changeinforeq->save();
        }
    }
    public function render()
    {
        return view('livewire.change-info-req-status');
    }
}
