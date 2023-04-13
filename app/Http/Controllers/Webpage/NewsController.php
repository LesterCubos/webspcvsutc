<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Use the Model
use App\Models\News;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(): Response
    {
        return response()->view('news.index', [
            'news' => News::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('news.form');
    }

    /**
     * Store a newly published resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('news_image')) {
             // put news_image in the public storage
            $filePath = Storage::disk('public')->put('news_img/news/news_images', request()->file('news_image'));
            $validated['news_image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = News::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'News published successfully!');
            return redirect()->route('news.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('news.show', [
            'new' => News::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('news.form', [
            'new' => News::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $new = News::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('news_image')) {
            // delete news_image
            Storage::disk('public')->delete($new->news_image);

            $filePath = Storage::disk('public')->put('news_img/news/news_images', request()->file('news_image'), 'public');
            $validated['news_image'] = $filePath;
        }

        $update = $new->update($validated);

        if($update) {
            session()->flash('notif.success', 'News updated successfully!');
            return redirect()->route('news.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $new = News::findOrFail($id);

        Storage::disk('public')->delete($new->news_image);

        $delete = $new->delete($id);

        if($delete) {
            session()->flash('notif.success', 'News deleted successfully!');
            return redirect()->route('news.index');
        }

        return abort(500);
    }
}
