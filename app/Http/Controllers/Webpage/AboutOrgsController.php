<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

use App\Models\AboutOrgs;

use App\Http\Requests\AboutOrgs\StoreRequest;
use App\Http\Requests\AboutOrgs\UpdateRequest;
use Illuminate\Support\Facades\Storage;
class AboutOrgsController extends Controller
{
    public function index(): Response
    {
        return response()->view('superadmin.website_admin_panel.services_section.about_orgs.index', [
            'about_orgs' => AboutOrgs::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.services_section.about_orgs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('org_logo')) {
            // put org_logo in the public storage
           $filePath = Storage::disk('public')->put('about_orgimg/student_orgs/org_logos', request()->file('org_logo'));
           $validated['org_logo'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = AboutOrgs::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Organization registered successfully!');
            return redirect()->route('about_orgs.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('about_orgs.show', [
            'about_org' => AboutOrgs::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.services_section.about_orgs.form', [
            'about_org' => AboutOrgs::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $about_org = AboutOrgs::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('org_logo')) {
            // delete org_logo
            Storage::disk('public')->delete($about_org->org_logo);

            $filePath = Storage::disk('public')->put('about_orgimg/student_orgs/org_logos', request()->file('org_logo'), 'public');
            $validated['org_logo'] = $filePath;
        }
        
        $update = $about_org->update($validated);

        if($update) {
            session()->flash('notif.success', 'Organization updated successfully!');
            return redirect()->route('about_orgs.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $about_org = AboutOrgs::findOrFail($id);

        Storage::disk('public')->delete($about_org->org_logo);

        $delete = $about_org->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Organization deleted successfully!');
            return redirect()->route('about_orgs.index');
        }

        return abort(500);
    }
}

