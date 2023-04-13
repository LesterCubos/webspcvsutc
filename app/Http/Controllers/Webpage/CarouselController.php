<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
// Use the CarouselItem Model
use App\Models\CarouselItem;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Carousel\StoreRequest;
use App\Http\Requests\Carousel\UpdateRequest;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('carousel_items.index', [
            'carousel_items' => CarouselItem::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('carousel_items.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
             // put image in the public storage
            $filePath = Storage::disk('public')->put('images/carousel_items/featured-images', request()->file('featured_image'));
            $validated['featured_image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = CarouselItem::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Banner created successfully!');
            return redirect()->route('carousel_items.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('carousel_items.show', [
            'carousel_item' => CarouselItem::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('carousel_items.form', [
            'carousel_item' => CarouselItem::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $carousel_items = CarouselItem::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            // delete image
            Storage::disk('public')->delete($carousel_items->featured_image);

            $filePath = Storage::disk('public')->put('images/carousel_items/featured-images', request()->file('featured_image'), 'public');
            $validated['featured_image'] = $filePath;
        }

        $update = $carousel_items->update($validated);

        if($update) {
            session()->flash('notif.success', 'Banner updated successfully!');
            return redirect()->route('carousel_items.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $carousel_item = CarouselItem::findOrFail($id);

        Storage::disk('public')->delete($carousel_item->featured_image);

        $delete = $carousel_item->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Banner deleted successfully!');
            return redirect()->route('carousel_items.index');
        }

        return abort(500);
    }
}
