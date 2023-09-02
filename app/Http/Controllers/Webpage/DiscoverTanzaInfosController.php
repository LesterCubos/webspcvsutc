<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Use the Model
use App\Models\DiscoverTanzaInfo;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\DiscoverTanza\StoreRequest;
use App\Http\Requests\DiscoverTanza\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class DiscoverTanzaInfosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('superadmin.website_admin_panel.homepage_section.discover_tanza_infos.index', [
            'discover_tanza_infos' => DiscoverTanzaInfo::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.homepage_section.discover_tanza_infos.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
             // put image in the public storage
            $filePath = Storage::disk('public')->put('infoimg/discovertanza_infos/images', request()->file('image'));
            $validated['image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = DiscoverTanzaInfo::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Information created successfully!');
            return redirect()->route('discover_tanza_infos.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('discover_tanza_infos.show', [
            'discover_tanza_info' => DiscoverTanzaInfo::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.homepage_section.discover_tanza_infos.form', [
            'discover_tanza_info' => DiscoverTanzaInfo::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $discover_tanza_info = DiscoverTanzaInfo::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($discover_tanza_info->image);

            $filePath = Storage::disk('public')->put('infoimg/discovertanza_infos/images', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }

        $update = $discover_tanza_info->update($validated);

        if($update) {
            session()->flash('notif.success', 'Information updated successfully!');
            return redirect()->route('discover_tanza_infos.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $discover_tanza_info = DiscoverTanzaInfo::findOrFail($id);

        Storage::disk('public')->delete($discover_tanza_info->image);

        $delete = $discover_tanza_info->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Information deleted successfully!');
            return redirect()->route('discover_tanza_infos.index');
        }

        return abort(500);
    }
}
