<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

use App\Models\UniversityOfficial;

use App\Http\Requests\UniversityOfficial\StoreRequest;
use App\Http\Requests\UniversityOfficial\UpdateRequest;


class UniversityOfficialsController extends Controller
{
    public function index(): Response
    {
        return response()->view('superadmin.website_admin_panel.about_section.uni_officials.index', [
            'uni_officials' => UniversityOfficial::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.about_section.uni_officials.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = UniversityOfficial::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'University Official created successfully!');
            return redirect()->route('uni_officials.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('uni_officials.show', [
            'uni_official' => UniversityOfficial::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.about_section.uni_officials.form', [
            'uni_official' => UniversityOfficial::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $uni_officials = UniversityOfficial::findOrFail($id);
        $validated = $request->validated();

        $update = $uni_officials->update($validated);

        if($update) {
            session()->flash('notif.success', 'University Official updated successfully!');
            return redirect()->route('uni_officials.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $uni_official = UniversityOfficial::findOrFail($id);

        $delete = $uni_official->delete($id);

        if($delete) {
            session()->flash('notif.success', 'University Official deleted successfully!');
            return redirect()->route('uni_officials.index');
        }

        return abort(500);
    }
}
