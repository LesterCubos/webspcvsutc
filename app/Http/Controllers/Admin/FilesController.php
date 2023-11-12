<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class FilesController extends Controller
{
    public function files(File $file)
    {
        return view('admin.downloadable_forms.file', ['file' => $file]);
    }
    public function student_files(File $file)
    {
        return view('student.downloadable_forms.file', ['file' => $file]);
    }
}
