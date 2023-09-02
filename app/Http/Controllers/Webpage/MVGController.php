<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\MVG;

use App\Http\Requests\MVG\StoreRequest;
use App\Http\Requests\MVG\UpdateRequest;

class MVGController extends Controller
{
    public function index(): Response
    {

        return response()->view('superadmin.website_admin_panel.about_section.mvgs.index', [
            'mvgs' => MVG::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.about_section.mvgs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = MVG::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'The content has been created successfully!');
            return redirect()->route('mvgs.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('mvgs.show', [
            'mvg' => MVG::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.about_section.mvgs.form', [
            'mvg' => MVG::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $mvgs = MVG::findOrFail($id);
        $validated = $request->validated();

        $update = $mvgs->update($validated);

        if($update) {
            session()->flash('notif.success', 'The content has been updated successfully!');
            return redirect()->route('mvgs.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $mvg = MVG::findOrFail($id);

        $delete = $mvg->delete($id);

        if($delete) {
            session()->flash('notif.success', 'The content has been deleted successfully!');
            return redirect()->route('mvgs.index');
        }

        return abort(500);
    }
}
