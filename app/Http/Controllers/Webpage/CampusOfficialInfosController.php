<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CampusOfficialInfo;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\CampusOfficialInfo\StoreRequest;
use App\Http\Requests\CampusOfficialInfo\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
class CampusOfficialInfosController extends Controller
{
    public function index(): Response
    {
        return response()->view('campus_official_infos.index', [
            'campus_official_infos' => CampusOfficialInfo::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('campus_official_infos.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = CampusOfficialInfo::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Campus Official has been added successfully!');
            return redirect()->route('campus_official_infos.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('campus_official_infos.show', [
            'campus_official_info' => CampusOfficialInfo::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('campus_official_infos.form', [
            'campus_official_info' => CampusOfficialInfo::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $campus_official_infos = CampusOfficialInfo::findOrFail($id);
        $validated = $request->validated();

        $update = $campus_official_infos->update($validated);

        if($update) {
            session()->flash('notif.success', 'Campus Official has been updated successfully!');
            return redirect()->route('campus_official_infos.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $campus_official_info = CampusOfficialInfo::findOrFail($id);

        $delete = $campus_official_info->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Campus Official has been deleted successfully!');
            return redirect()->route('campus_offcial_infos.index');
        }

        return abort(500);
    }
}
