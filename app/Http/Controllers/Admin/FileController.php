<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\AcademicYear;
use App\Models\File;
use App\Models\Legend;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.downloadable_forms.index', [
            'files' => File::orderBy('updated_at', 'desc')->paginate(5), 'acadyears'=> AcademicYear::where('isActive', '1')->get(),
            'legends' => Legend::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.downloadable_forms.form', [
            'acadyears'=> AcademicYear::where('isActive', '1')->get(),
            'legends' => Legend::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $file = File::findOrFail($id);

        $delete = $file->delete($id);

        if($delete) {
            session()->flash('notif.success', 'File has been deleted successfully!');
            return redirect()->route('downloadable_forms.index');
        }

        return abort(500);
    }
}