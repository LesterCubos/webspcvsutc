<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\DIT;

use App\Http\Requests\DIT\StoreRequest;
use App\Http\Requests\DIT\UpdateRequest;
use Illuminate\Http\Request;

class DITController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {

        $count = DB::table('d_i_t_s')->count();

        if($count > 0) {
            $null = 1;
        }else {
            $null = 0;
        }

        return response()->view('superadmin.website_admin_panel.administration_section.dits.index', [
            'dits' => DIT::orderBy('updated_at', 'desc')->get(), 'nullbtn' => $null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.dits.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
             // put img in the public storage
            $filePath = Storage::disk('public')->put('ditimg/dits/imgs', request()->file('img'));
            $validated['img'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = DIT::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Content created successfully!');
            return redirect()->route('dits.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('dits.show', [
            'dit' => DIT::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.dits.form', [
            'dit' => DIT::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $dit = DIT::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            // delete img
            Storage::disk('public')->delete($dit->img);

            $filePath = Storage::disk('public')->put('ditimg/dits/imgs', request()->file('img'), 'public');
            $validated['img'] = $filePath;
        }

        $update = $dit->update($validated);

        if($update) {
            session()->flash('notif.success', 'Content updated successfully!');
            return redirect()->route('dits.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $dit = DIT::findOrFail($id);

        Storage::disk('public')->delete($dit->img);

        $delete = $dit->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Content deleted successfully!');
            return redirect()->route('dits.index');
        }

        return abort(500);
    }
}
