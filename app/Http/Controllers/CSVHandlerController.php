<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Imports\GradesImport;
use App\Exports\CoursesExport;
use Maatwebsite\Excel\Facades\Excel;

class CSVHandlerController extends Controller
{
    // public function importExportView()
    // {
    //    return view('import');
    // }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
             
        return back();
    }

    public function Gradeimport() 
    {
        Excel::import(new GradesImport,request()->file('file'));
             
        return back();
    }

    public function Coursesexport() 
    {
        return Excel::download(new CoursesExport, 'courses.xlsx');
    }

}
