<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use App\Models\CSG;

use App\Http\Requests\CSG\StoreRequest;
use App\Http\Requests\CSG\UpdateRequest;
use Illuminate\Http\Request;

class CSGController extends Controller
{
    public function index(): Response
    {
        return response()->view('csgs.index', [
            'csgs' => CSG::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('csgs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = CSG::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'The content has been created successfully!');
            return redirect()->route('csgs.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('csgs.show', [
            'csg' => CSG::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('csgs.form', [
            'csg' => CSG::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $csgs = CSG::findOrFail($id);
        $validated = $request->validated();

        $update = $csgs->update($validated);

        if($update) {
            session()->flash('notif.success', 'The content has been updated successfully!');
            return redirect()->route('csgs.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $csg = CSG::findOrFail($id);

        $delete = $csg->delete($id);

        if($delete) {
            session()->flash('notif.success', 'The content has been deleted successfully!');
            return redirect()->route('csgs.index');
        }

        return abort(500);
    }
}
