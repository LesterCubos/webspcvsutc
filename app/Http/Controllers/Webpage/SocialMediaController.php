<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\SocialMediaLinks;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


use App\Http\Requests\SocialMedia\StoreRequest;
use App\Http\Requests\SocialMedia\UpdateRequest;

class SocialMediaController extends Controller
{
    public function index(): Response
    {
        return response()->view('superadmin.website_admin_panel.settings_section.social_media.index', [
            'socialmedias' => SocialMediaLinks::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.settings_section.social_media.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = SocialMediaLinks::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'The link has been created successfully!');
            return redirect()->route('social_media.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('social_media.show', [
            'socialmedia' => SocialMediaLinks::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.settings_section.social_media.form', [
            'socialmedia' => SocialMediaLinks::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $socialmedias = SocialMediaLinks::findOrFail($id);
        $validated = $request->validated();

        $update = $socialmedias->update($validated);

        if($update) {
            session()->flash('notif.success', 'The link has been updated successfully!');
            return redirect()->route('social_media.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $socialmedia = SocialMediaLinks::findOrFail($id);

        $delete = $socialmedia->delete($id);

        if($delete) {
            session()->flash('notif.success', 'The link has been deleted successfully!');
            return redirect()->route('social_media.index');
        }

        return abort(500);
    }
}
