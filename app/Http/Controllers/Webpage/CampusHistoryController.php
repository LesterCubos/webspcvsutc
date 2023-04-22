<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
// Use the CampusHistory Model
use App\Models\CampusHistory;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\CampusHistory\StoreRequest;
use App\Http\Requests\CampusHistory\UpdateRequest;

class CampusHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('campus_history.index', [
            'campus_history' => CampusHistory::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('campus_history.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
             // put image in the public storage
            $filePath = Storage::disk('public')->put('camhisimg/campus_history/images', request()->file('image'));
            $validated['image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = CampusHistory::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Campus History has posted successfully!');
            return redirect()->route('campus_history.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('campus_history.show', [
            'campushistory' => CampusHistory::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('campus_history.form', [
            'campushistory' => CampusHistory::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $campus_history = CampusHistory::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($campus_history->image);

            $filePath = Storage::disk('public')->put('camhisimg/campus_history/images', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }

        $update = $campus_history->update($validated);

        if($update) {
            session()->flash('notif.success', 'Campus historyhas been updated successfully!');
            return redirect()->route('campus_history.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $campushistory = CampusHistory::findOrFail($id);

        Storage::disk('public')->delete($campushistory->image);

        $delete = $campushistory->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Campus History deleted successfully!');
            return redirect()->route('campus_history.index');
        }

        return abort(500);
    }
}
