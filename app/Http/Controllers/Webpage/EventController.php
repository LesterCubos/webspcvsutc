<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\Event;

use App\Http\Requests\Event\StoreRequest;
use App\Http\Requests\Event\UpdateRequest;



class EventController extends Controller
{
    public function index(): Response
    {
        return response()->view('events.index', [
            'events' => Event::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('events.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // if ($request->hasFile('interactive_img')) {
        //      // put interactive_img in the public storage
        //     $filePath = Storage::disk('public')->put('eventimg/events/interactive_imgs', request()->file('interactive_img'));
        //     $validated['interactive_img'] = $filePath;
        // }

        // insert only requests that already validated in the StoreRequest
        $create = Event::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Events has been posted successfully!');
            return redirect()->route('events.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('events.show', [
            'event' => Event::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('events.form', [
            'event' => Event::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        $validated = $request->validated();

        // if ($request->hasFile('interactive_img')) {
        //     // delete interactive_img
        //     Storage::disk('public')->delete($event->interactive_img);

        //     $filePath = Storage::disk('public')->put('eventimg/events/interactive_imgs', request()->file('interactive_img'), 'public');
        //     $validated['interactive_img'] = $filePath;
        // }

        $update = $event->update($validated);

        if($update) {
            session()->flash('notif.success', 'Events has been updated successfully!');
            return redirect()->route('events.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $event = Event::findOrFail($id);

        // Storage::disk('public')->delete($event->interactive_img);

        $delete = $event->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Events has been deleted successfully!');
            return redirect()->route('events.index');
        }

        return abort(500);
    }
}
