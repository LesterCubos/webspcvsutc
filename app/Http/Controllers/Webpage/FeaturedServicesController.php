<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\FeaturedService;

use App\Http\Requests\FeaturedService\StoreRequest;
use App\Http\Requests\FeaturedService\UpdateRequest;

class FeaturedServicesController extends Controller
{
    public function index(): Response
    {
        return response()->view('featured_services.index', [
            'featured_services' => FeaturedService::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('featured_services.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        // insert only requests that already validated in the StoreRequest
        $create = FeaturedService::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Featured Services created successfully!');
            return redirect()->route('featured_services.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('featured_services.show', [
            'featured_service' => FeaturedService::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('featured_services.form', [
            'featured_service' => FeaturedService::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $featured_services = FeaturedService::findOrFail($id);
        $validated = $request->validated();

        $update = $featured_services->update($validated);

        if($update) {
            session()->flash('notif.success', 'Featured Services updated successfully!');
            return redirect()->route('featured_services.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $featured_service = FeaturedService::findOrFail($id);

        $delete = $featured_service->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Featured Services deleted successfully!');
            return redirect()->route('featured_services.index');
        }

        return abort(500);
    }
}
