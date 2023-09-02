<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Use the Model
use App\Models\UniversitySeal;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\UniversitySeal\StoreRequest;
use App\Http\Requests\UniversitySeal\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UniversitySealsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $count = DB::table('university_seals')->count();

        if($count > 0) {
            $null = 1;
        }else {
            $null = 0;
        }
        return response()->view('superadmin.website_admin_panel.about_section.uni_seals.index', [
            'uni_seals' => UniversitySeal::orderBy('updated_at', 'desc')->get(), 'nullbtn' => $null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.about_section.uni_seals.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
             // put image in the public storage
            $filePath = Storage::disk('public')->put('unisealimg/uni_seals/images', request()->file('image'));
            $validated['image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = UniversitySeal::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Information created successfully!');
            return redirect()->route('uni_seals.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('uni_seals.show', [
            'uni_seal' => UniversitySeal::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.about_section.uni_seals.form', [
            'uni_seal' => UniversitySeal::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $uni_seal = UniversitySeal::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($uni_seal->image);

            $filePath = Storage::disk('public')->put('unisealimg/uni_seals/images', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }

        $update = $uni_seal->update($validated);

        if($update) {
            session()->flash('notif.success', 'Information updated successfully!');
            return redirect()->route('uni_seals.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $uni_seal = UniversitySeal::findOrFail($id);

        Storage::disk('public')->delete($uni_seal->image);

        $delete = $uni_seal->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Information deleted successfully!');
            return redirect()->route('uni_seals.index');
        }

        return abort(500);
    }
}
