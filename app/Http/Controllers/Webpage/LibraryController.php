<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Library;

use App\Http\Requests\Library\StoreRequest;
use App\Http\Requests\Library\UpdateRequest;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {

        $count = DB::table('libraries')->count();

        if($count > 0) {
            $null = 1;
        }else {
            $null = 0;
        }

        return response()->view('superadmin.website_admin_panel.administration_section.libs.index', [
            'libs' => Library::orderBy('updated_at', 'desc')->get(), 'nullbtn' => $null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.libs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
             // put img in the public storage
            $filePath = Storage::disk('public')->put('libimg/libs/imgs', request()->file('img'));
            $validated['img'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Library::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Content created successfully!');
            return redirect()->route('libs.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('libs.show', [
            'lib' => Library::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.libs.form', [
            'lib' => Library::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $lib = Library::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            // delete img
            Storage::disk('public')->delete($lib->img);

            $filePath = Storage::disk('public')->put('libimg/libs/imgs', request()->file('img'), 'public');
            $validated['img'] = $filePath;
        }

        $update = $lib->update($validated);

        if($update) {
            session()->flash('notif.success', 'Content updated successfully!');
            return redirect()->route('libs.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $lib = Library::findOrFail($id);

        Storage::disk('public')->delete($lib->img);

        $delete = $lib->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Content deleted successfully!');
            return redirect()->route('libs.index');
        }

        return abort(500);
    }
}
