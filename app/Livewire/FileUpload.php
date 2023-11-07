<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\File;

  
class FileUpload extends Component
{
    use WithFileUploads;
    public $file, $title;
    public $files;
  
    public function mount()
    {
        $this->files = File::all();
    }
  
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

    public function download($id)
    {
        $file = File::findOrFail($id);

        if (file_exists(public_path('storage/' . $file->name))) {
            return response()->download(public_path('storage/' . $file->name));
        } else {
            session()->flash('message', 'File does not exist.');
        }
    }

    // public function viewFile($id)
    // {
    //     $file = File::findOrFail($id);

    //     if (file_exists(public_path('storage/' . $file->name))) {
    //         return response()->stream(function () use ($file) {
    //             $stream = readfile(public_path('storage/' . $file->name));
    //             echo $stream;
    //         });
    //     } else {
    //         session()->flash('message', 'File does not exist.');
    //     }
    // }
  
    public function render()
    {
        $routeName = Route::currentRouteName();
        return view('livewire.file-upload', compact('routeName'));
    }

}
