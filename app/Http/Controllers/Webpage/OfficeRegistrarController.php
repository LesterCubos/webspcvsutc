<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use App\Models\OfficeRegistrar;

use App\Http\Requests\OfficeRegistrar\StoreRequest;
use App\Http\Requests\OfficeRegistrar\UpdateRequest;


class OfficeRegistrarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('office_registrars.index', [
            'office_registrars' => OfficeRegistrar::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('office_registrars.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('pic')) {
             // put pic in the public storage
            $filePath = Storage::disk('public')->put('offregimg/office_registrars/pics', request()->file('pic'));
            $validated['pic'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = OfficeRegistrar::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Content created successfully!');
            return redirect()->route('office_registrars.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('office_registrars.show', [
            'office_registrar' => OfficeRegistrar::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('office_registrars.form', [
            'office_registrar' => OfficeRegistrar::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $office_registrar = OfficeRegistrar::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('pic')) {
            // delete pic
            Storage::disk('public')->delete($office_registrar->pic);

            $filePath = Storage::disk('public')->put('offregimg/office_registrars/pics', request()->file('pic'), 'public');
            $validated['pic'] = $filePath;
        }

        $update = $office_registrar->update($validated);

        if($update) {
            session()->flash('notif.success', 'Content updated successfully!');
            return redirect()->route('office_registrars.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $office_registrar = OfficeRegistrar::findOrFail($id);

        Storage::disk('public')->delete($office_registrar->pic);

        $delete = $office_registrar->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Content deleted successfully!');
            return redirect()->route('office_registrars.index');
        }

        return abort(500);
    }
}
