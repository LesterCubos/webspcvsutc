<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\CampusOfficial;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\CampusOfficial\StoreRequest;
use App\Http\Requests\CampusOfficial\UpdateRequest;

class CampusOfficialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('campus_officials.index', [
            'campus_officials' => CampusOfficial::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('campus_officials.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('org_image')) {
             // put org_image in the public storage
            $filePath = Storage::disk('public')->put('camoffimg/campus_officials/org_images', request()->file('org_image'));
            $validated['org_image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = CampusOfficial::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Campus Official has been added successfully!');
            return redirect()->route('campus_officials.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('campus_officials.show', [
            'campus_official' => CampusOfficial::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('campus_officials.form', [
            'campus_official' => CampusOfficial::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $campus_officials = CampusOfficial::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('org_image')) {
            // delete org_image
            Storage::disk('public')->delete($campus_officials->org_image);

            $filePath = Storage::disk('public')->put('camoffimg/campus_officials/org_images', request()->file('org_image'), 'public');
            $validated['org_image'] = $filePath;
        }

        $update = $campus_officials->update($validated);

        if($update) {
            session()->flash('notif.success', 'Campus Official has been updated successfully!');
            return redirect()->route('campus_officials.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $campus_official = CampusOfficial::findOrFail($id);

        Storage::disk('public')->delete($campus_official->org_image);

        $delete = $campus_official->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Campus Official deleted successfully!');
            return redirect()->route('campus_officials.index');
        }

        return abort(500);
    }
}
