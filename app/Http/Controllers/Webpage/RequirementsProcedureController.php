<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\RequirementsProcedure;

use App\Http\Requests\RequirementsProcedure\StoreRequest;
use App\Http\Requests\RequirementsProcedure\UpdateRequest;
class RequirementsProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('requirements_procedures.index', [
            'requirements_procedures' => RequirementsProcedure::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('requirements_procedures.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
             // put img in the public storage
            $filePath = Storage::disk('public')->put('rprocedureimg/requirements_procedures/imgs', request()->file('img'));
            $validated['img'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = RequirementsProcedure::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Content created successfully!');
            return redirect()->route('requirements_procedures.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('requirements_procedures.show', [
            'requirements_procedure' => RequirementsProcedure::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('requirements_procedures.form', [
            'requirements_procedure' => RequirementsProcedure::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $requirements_procedure = RequirementsProcedure::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            // delete img
            Storage::disk('public')->delete($requirements_procedure->img);

            $filePath = Storage::disk('public')->put('rprocedureimg/requirements_procedures/imgs', request()->file('img'), 'public');
            $validated['img'] = $filePath;
        }

        $update = $requirements_procedure->update($validated);

        if($update) {
            session()->flash('notif.success', 'Content updated successfully!');
            return redirect()->route('requirements_procedures.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $requirements_procedure = RequirementsProcedure::findOrFail($id);

        Storage::disk('public')->delete($requirements_procedure->img);

        $delete = $requirements_procedure->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Content deleted successfully!');
            return redirect()->route('requirements_procedures.index');
        }

        return abort(500);
    }
}