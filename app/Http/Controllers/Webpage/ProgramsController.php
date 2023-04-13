<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\Program;
use App\Http\Requests\Program\StoreRequest;
use App\Http\Requests\Program\UpdateRequest;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('programs.index', [
            'programs' => Program::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('programs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('program_image')) {
             // put image in the public storage
            $filePath = Storage::disk('public')->put('progimg/programs/program_images', request()->file('program_image'));
            $validated['program_image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Program::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Program created successfully!');
            return redirect()->route('programs.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('programs.show', [
            'program' => Program::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('programs.form', [
            'program' => Program::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $programs = Program::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('program_image')) {
            // delete image
            Storage::disk('public')->delete($programs->program_image);

            $filePath = Storage::disk('public')->put('progimg/programs/program_images', request()->file('program_image'), 'public');
            $validated['program_image'] = $filePath;
        }

        $update = $programs->update($validated);

        if($update) {
            session()->flash('notif.success', 'Prograam updated successfully!');
            return redirect()->route('programs.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $program = Program::findOrFail($id);

        Storage::disk('public')->delete($program->program_image);

        $delete = $program->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Program deleted successfully!');
            return redirect()->route('programs.index');
        }

        return abort(500);
    }
}
