<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\DoM;

use App\Http\Requests\DoM\StoreRequest;
use App\Http\Requests\DoM\UpdateRequest;
use Illuminate\Http\Request;

class DoMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {

        $count = DB::table('do_m_s')->count();

        if($count > 0) {
            $null = 1;
        }else {
            $null = 0;
        }

        return response()->view('superadmin.website_admin_panel.administration_section.doms.index', [
            'doms' => DoM::orderBy('updated_at', 'desc')->get(), 'nullbtn' => $null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.doms.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
             // put img in the public storage
            $filePath = Storage::disk('public')->put('domimg/doms/imgs', request()->file('img'));
            $validated['img'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = DoM::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Content created successfully!');
            return redirect()->route('doms.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('doms.show', [
            'dom' => DoM::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.doms.form', [
            'dom' => DoM::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $dom = DoM::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            // delete img
            Storage::disk('public')->delete($dom->img);

            $filePath = Storage::disk('public')->put('domimg/doms/imgs', request()->file('img'), 'public');
            $validated['img'] = $filePath;
        }

        $update = $dom->update($validated);

        if($update) {
            session()->flash('notif.success', 'Content updated successfully!');
            return redirect()->route('doms.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $dom = DoM::findOrFail($id);

        Storage::disk('public')->delete($dom->img);

        $delete = $dom->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Content deleted successfully!');
            return redirect()->route('doms.index');
        }

        return abort(500);
    }
}
