<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\AcademicYear\StoreRequest;
use App\Http\Requests\AcademicYear\UpdateRequest;

use App\Models\AcademicYear;


class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.academic_year.index', [
            'academic_years' => AcademicYear::orderBy('updated_at', 'desc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.academic_year.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = AcademicYear::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Banner created successfully!');
            return redirect()->route('academic_years.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.academic_years.show', [
            'academic_year' => AcademicYear::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.academic_year.index', [
            'academicyear' => AcademicYear::findOrFail($id), 'academic_years' => AcademicYear::orderBy('updated_at', 'desc')->paginate(5),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $academic_years = AcademicYear::findOrFail($id);
        $validated = $request->validated();

        $update = $academic_years->update($validated);

        if($update) {
            session()->flash('notif.success', 'Banner updated successfully!');
            return redirect()->route('academic_years.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $academic_year = AcademicYear::findOrFail($id);

        $delete = $academic_year->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Banner deleted successfully!');
            return redirect()->route('admin.academic_years.index');
        }

        return abort(500);
    }
}
