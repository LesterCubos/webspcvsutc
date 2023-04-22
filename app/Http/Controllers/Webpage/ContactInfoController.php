<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\ContactInfo;

use App\Http\Requests\ContactInfo\StoreRequest;
use App\Http\Requests\ContactInfo\UpdateRequest;

class ContactInfoController extends Controller
{
    public function index(): Response
    {
        return response()->view('contact_infos.index', [
            'contact_infos' => ContactInfo::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('contact_infos.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = ContactInfo::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Information created successfully!');
            return redirect()->route('contact_infos.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('contact_infos.show', [
            'contact_info' => ContactInfo::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('contact_infos.form', [
            'contact_info' => ContactInfo::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $contact_infos = ContactInfo::findOrFail($id);
        $validated = $request->validated();

        $update = $contact_infos->update($validated);

        if($update) {
            session()->flash('notif.success', 'Information updated successfully!');
            return redirect()->route('contact_infos.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $contact_info = ContactInfo::findOrFail($id);

        $delete = $contact_info->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Information deleted successfully!');
            return redirect()->route('contact_infos.index');
        }

        return abort(500);
    }
}
