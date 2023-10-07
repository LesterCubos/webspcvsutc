<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Research;

use App\Http\Requests\Research\StoreRequest;
use App\Http\Requests\Research\UpdateRequest;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {

        $count = DB::table('research')->count();

        if($count > 0) {
            $null = 1;
        }else {
            $null = 0;
        }

        return response()->view('superadmin.website_admin_panel.administration_section.researchs.index', [
            'researchs' => Research::orderBy('updated_at', 'desc')->get(), 'nullbtn' => $null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.researchs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
             // put img in the public storage
            $filePath = Storage::disk('public')->put('researchimg/researchs/imgs', request()->file('img'));
            $validated['img'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Research::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Content created successfully!');
            return redirect()->route('researchs.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('researchs.show', [
            'research' => Research::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.researchs.form', [
            'research' => Research::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $research = Research::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            // delete img
            Storage::disk('public')->delete($research->img);

            $filePath = Storage::disk('public')->put('researchimg/researchs/imgs', request()->file('img'), 'public');
            $validated['img'] = $filePath;
        }

        $update = $research->update($validated);

        if($update) {
            session()->flash('notif.success', 'Content updated successfully!');
            return redirect()->route('researchs.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $research = Research::findOrFail($id);

        Storage::disk('public')->delete($research->img);

        $delete = $research->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Content deleted successfully!');
            return redirect()->route('researchs.index');
        }

        return abort(500);
    }
}
