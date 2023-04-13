<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\Admission;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Admission\StoreRequest;
use App\Http\Requests\Admission\UpdateRequest;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function toggleSection(Request $request)
    {
        $showSection = ! $request->session()->get('show_section', false);
        $request->session()->put('show_section', $showSection);

        return redirect()->back();
    }

    public function index(): Response
    {
        return response()->view('admissions.index', [
            'admissions' => Admission::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admissions.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // if ($request->hasFile('bg_pic')) {
        //      // put image in the public storage
        //     $filePath = Storage::disk('public')->put('admi_pic/admissions/bg_pics', request()->file('bg_pic'));
        //     $validated['bg_pic'] = $filePath;
        // }

        // insert only requests that already validated in the StoreRequest
        $create = Admission::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Admission created successfully!');
            return redirect()->route('admissions.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admissions.show', [
            'admission' => Admission::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admissions.form', [
            'admission' => Admission::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $admissions = Admission::findOrFail($id);
        $validated = $request->validated();

        // if ($request->hasFile('bg_pic')) {
        //     // delete image
        //     Storage::disk('public')->delete($admissions->bg_pic);

        //     $filePath = Storage::disk('public')->put('admi_pic/admissions/bg_pics', request()->file('bg_pic'), 'public');
        //     $validated['bg_pic'] = $filePath;
        // }

        $update = $admissions->update($validated);

        if($update) {
            session()->flash('notif.success', 'Admission updated successfully!');
            return redirect()->route('admissions.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $admission = Admission::findOrFail($id);

        // Storage::disk('public')->delete($admission->bg_pic);

        $delete = $admission->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Admission deleted successfully!');
            return redirect()->route('admissions.index');
        }

        return abort(500);
    }
}
