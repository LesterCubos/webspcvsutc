<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

use App\Models\ProgramsOffered;

use App\Http\Requests\ProgramsOffered\StoreRequest;
use App\Http\Requests\ProgramsOffered\UpdateRequest;

class ProgramsOfferedController extends Controller
{
    public function index(): Response
    {
        return response()->view('superadmin.website_admin_panel.admission_section.programs_offers.index', [
            'programs_offers' => ProgramsOffered::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.admission_section.programs_offers.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = ProgramsOffered::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'A Program Offering has been created successfully!');
            return redirect()->route('programs_offers.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('programs_offers.show', [
            'programs_offer' => ProgramsOffered::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.admission_section.programs_offers.form', [
            'programs_offer' => ProgramsOffered::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $programs_offers = ProgramsOffered::findOrFail($id);
        $validated = $request->validated();

        $update = $programs_offers->update($validated);

        if($update) {
            session()->flash('notif.success', 'A Program Offering has been updated successfully!');
            return redirect()->route('programs_offers.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $programs_offer = ProgramsOffered::findOrFail($id);

        $delete = $programs_offer->delete($id);

        if($delete) {
            session()->flash('notif.success', 'A Program Offering has been deleted successfully!');
            return redirect()->route('programs_offers.index');
        }

        return abort(500);
    }
}
