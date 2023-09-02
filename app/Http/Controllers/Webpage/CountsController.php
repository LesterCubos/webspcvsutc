<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\Count;

use App\Http\Requests\Count\StoreRequest;
use App\Http\Requests\Count\UpdateRequest;

class CountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('superadmin.website_admin_panel.homepage_section.counts.index', [
            'counts' => Count::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.homepage_section.counts.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = Count::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Count created successfully!');
            return redirect()->route('counts.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('counts.show', [
            'count' => Count::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.homepage_section.counts.form', [
            'count' => Count::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $counts = Count::findOrFail($id);
        $validated = $request->validated();

        $update = $counts->update($validated);

        if($update) {
            session()->flash('notif.success', 'Count updated successfully!');
            return redirect()->route('counts.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $count = Count::findOrFail($id);

        $delete = $count->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Count deleted successfully!');
            return redirect()->route('counts.index');
        }

        return abort(500);
    }
}
