<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\AdminAnnounce;
use App\Models\AcademicYear;
use App\Http\Requests\AdminAnnounce\StoreRequest;
use App\Http\Requests\AdminAnnounce\UpdateRequest;
use Illuminate\Support\Facades\Storage;
class AdminAnnounceController extends Controller
{
    
    public function index(): Response
    {

        return response()->view('admin.admin_announce.index', [
            'admin_announces' => AdminAnnounce::orderBy('updated_at', 'desc')->paginate(5), 'acadyears'=> AcademicYear::where('isActive', '1')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.admin_announce.form', [
            'acadyears'=> AcademicYear::where('isActive', '1')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = AdminAnnounce::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Announcement has been posted successfully!');
            return redirect()->route('admin_announces.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin_announces.show', [
            'admin_announce' => AdminAnnounce::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.admin_announce.form', [
            'admin_announce' => AdminAnnounce::findOrFail($id), 'acadyears'=> AcademicYear::where('isActive', '1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $admin_announce = AdminAnnounce::findOrFail($id);
        $validated = $request->validated();

        $update = $admin_announce->update($validated);

        if($update) {
            session()->flash('notif.success', 'Announcement has been updated successfully!');
            return redirect()->route('admin_announces.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $admin_announce = AdminAnnounce::findOrFail($id);

        $delete = $admin_announce->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Announcement has been deleted successfully!');
            return redirect()->route('admin_announces.index');
        }

        return abort(500);
    }
}