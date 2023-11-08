<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\File;

  
class FileUpload extends Component
{
    use WithFileUploads;
    public $file, $title;
    public $files;
  
    public function submit()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'file' => 'required',
        ]);
  
        $validatedData['name'] = $this->file->store('files', 'public');
  
        File::create($validatedData);
  
        session()->flash('message', 'File successfully Uploaded.');
    }

    // public function download($id)
    // {
    //     $file = File::findOrFail($id);

    //     if (file_exists(public_path('storage/' . $file->name))) {
    //         return response()->download(public_path('storage/' . $file->name));
    //     } else {
    //         session()->flash('message', 'File does not exist.');
    //     }
    // }

    // public function show($id)
    // {
    //     $file = File::findOrFail($id);

    //     if (file_exists(public_path('storage/' . $file->name))) {
    //         return response()->file(public_path('storage/' . $file->name));
    //     } else {
    //         session()->flash('message', 'File does not exist.');
    //     }
    // }
  
    public function render()
    {
        return view('livewire.file-upload');
    }

}
