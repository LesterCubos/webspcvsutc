<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use App\Models\Osas;

use App\Http\Requests\Osas\StoreRequest;
use App\Http\Requests\Osas\UpdateRequest;

use Illuminate\Http\Request;

class OsasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('osass.index', [
            'osass' => Osas::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('osass.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
             // put img in the public storage
            $filePath = Storage::disk('public')->put('osasimg/osass/imgs', request()->file('img'));
            $validated['img'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Osas::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Content created successfully!');
            return redirect()->route('osass.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('osass.show', [
            'osas' => Osas::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('osass.form', [
            'osas' => Osas::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $osas = Osas::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            // delete img
            Storage::disk('public')->delete($osas->img);

            $filePath = Storage::disk('public')->put('osasimg/osass/imgs', request()->file('img'), 'public');
            $validated['img'] = $filePath;
        }

        $update = $osas->update($validated);

        if($update) {
            session()->flash('notif.success', 'Content updated successfully!');
            return redirect()->route('osass.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $osas = Osas::findOrFail($id);

        Storage::disk('public')->delete($osas->img);

        $delete = $osas->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Content deleted successfully!');
            return redirect()->route('osass.index');
        }

        return abort(500);
    }
}
