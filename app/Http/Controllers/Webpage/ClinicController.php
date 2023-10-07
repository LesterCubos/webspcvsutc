<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Clinic;

use App\Http\Requests\Clinic\StoreRequest;
use App\Http\Requests\Clinic\UpdateRequest;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {

        $count = DB::table('clinics')->count();

        if($count > 0) {
            $null = 1;
        }else {
            $null = 0;
        }

        return response()->view('superadmin.website_admin_panel.administration_section.clinics.index', [
            'clinics' => Clinic::orderBy('updated_at', 'desc')->get(), 'nullbtn' => $null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.clinics.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('pic')) {
             // put pic in the public storage
            $filePath = Storage::disk('public')->put('clinicimg/clinics/pics', request()->file('pic'));
            $validated['pic'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Clinic::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Content created successfully!');
            return redirect()->route('clinics.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('clinics.show', [
            'clinic' => Clinic::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.clinics.form', [
            'clinic' => Clinic::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $clinic = Clinic::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('pic')) {
            // delete pic
            Storage::disk('public')->delete($clinic->pic);

            $filePath = Storage::disk('public')->put('clinicimg/clinics/pics', request()->file('pic'), 'public');
            $validated['pic'] = $filePath;
        }

        $update = $clinic->update($validated);

        if($update) {
            session()->flash('notif.success', 'Content updated successfully!');
            return redirect()->route('clinics.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $clinic = Clinic::findOrFail($id);

        Storage::disk('public')->delete($clinic->pic);

        $delete = $clinic->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Content deleted successfully!');
            return redirect()->route('clinics.index');
        }

        return abort(500);
    }
}

