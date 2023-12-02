<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\ReqOption;
use App\Models\RequestDoc;

class RequestDocsCheckbox extends Component
{
    public $documents = [];
    public function updateCheckedDocuments($document)
    {
        if (in_array($document, $this->documents)) {
            $this->documents = array_diff($this->documents, [$document]);
            Session::put('docu', $this->documents);
            $docs = $this->documents;
            $docs = implode("\n- ", $docs);
            $docs = " " . $docs;
            Session::put('docs', $docs);
        } else {
            $this->documents[] = $document;
            Session::put('docu', $this->documents);
            $docs = $this->documents;
            $docs = implode("\n- ", $docs);
            $docs = " " . $docs;
            Session::put('docs', $docs);
        }
    }
    public function render()
    {
        return view('livewire.request-docs-checkbox',['reqoptions' => ReqOption::all(),'requestdoc' => RequestDoc::all()]);
    }
}
