<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Use the Model
use App\Models\Announcement;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Announcement\StoreRequest;
use App\Http\Requests\Announcement\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index(): Response
    {
        return response()->view('announcements.index', [
            'announcements' => Announcement::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('announcements.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('poster')) {
             // put poster in the public storage
            $filePath = Storage::disk('public')->put('ann_img/announcements/posters', request()->file('poster'));
            $validated['poster'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Announcement::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Announcement has been posted successfully!');
            return redirect()->route('announcements.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('announcements.show', [
            'announcement' => Announcement::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('announcements.form', [
            'announcement' => Announcement::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $announcement = Announcement::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('poster')) {
            // delete poster
            Storage::disk('public')->delete($announcement->poster);

            $filePath = Storage::disk('public')->put('ann_img/announcements/posters', request()->file('poster'), 'public');
            $validated['poster'] = $filePath;
        }

        $update = $announcement->update($validated);

        if($update) {
            session()->flash('notif.success', 'Announcement has been updated successfully!');
            return redirect()->route('announcements.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $announcement = Announcement::findOrFail($id);

        Storage::disk('public')->delete($announcement->poster);

        $delete = $announcement->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Announcement has been deleted successfully!');
            return redirect()->route('announcements.index');
        }

        return abort(500);
    }
}
