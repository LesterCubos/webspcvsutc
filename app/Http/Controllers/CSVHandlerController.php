<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Imports\GradesImport;
use App\Exports\CoursesExport;
use App\Exports\TemplateExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

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
        session()->flash('notif.success', 'Users created successfully!');     
        return back();
    }

    public function Gradeimport() 
    {
        try {
            DB::transaction(function () {
                Excel::import(new GradesImport,request()->file('file'));
            });   
            session()->flash('notif.success', 'Grades created successfully!');
        } catch (\Exception $e) {
            session()->flash('notif.error', $e->getMessage());
            return back();
        }
          
        return back();
    }

    public function Coursesexport() 
    {
        return Excel::download(new CoursesExport, 'courses.xlsx');
    }

    public function Tempdownload() 
    {
        return Excel::download(new TemplateExport, 'grades.csv');
    }

}
