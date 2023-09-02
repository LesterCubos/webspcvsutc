<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\QuickLinks;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


use App\Http\Requests\QuickLinks\StoreRequest;
use App\Http\Requests\QuickLinks\UpdateRequest;
class QuickLinksController extends Controller
{
    public function index(): Response
    {
        return response()->view('superadmin.website_admin_panel.settings_section.quick_links.index', [
            'quicks' => QuickLinks::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.settings_section.quick_links.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = QuickLinks::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'The link has been created successfully!');
            return redirect()->route('quick_links.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('quick_links.show', [
            'quick' => QuickLinks::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.settings_section.quick_links.form', [
            'quick' => QuickLinks::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $quicks = QuickLinks::findOrFail($id);
        $validated = $request->validated();

        $update = $quicks->update($validated);

        if($update) {
            session()->flash('notif.success', 'The link has been updated successfully!');
            return redirect()->route('quick_links.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $quick = QuickLinks::findOrFail($id);

        $delete = $quick->delete($id);

        if($delete) {
            session()->flash('notif.success', 'The link has been deleted successfully!');
            return redirect()->route('quick_links.index');
        }

        return abort(500);
    }
}

