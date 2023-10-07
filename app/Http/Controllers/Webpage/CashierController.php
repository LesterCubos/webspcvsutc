<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use App\Models\Cashier;

use App\Http\Requests\Cashier\StoreRequest;
use App\Http\Requests\Cashier\UpdateRequest;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.cashiers.index', [
            'cashiers' => Cashier::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.cashiers.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
             // put pic in the public storage
            $filePath = Storage::disk('public')->put('cashierimg/cashiers/pics', request()->file('img'));
            $validated['img'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Cashier::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Content created successfully!');
            return redirect()->route('cashiers.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.cashiers.show', [
            'cashier' => Cashier::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.administration_section.cashiers.form', [
            'cashier' => Cashier::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $cashier = Cashier::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('pic')) {
            // delete pic
            Storage::disk('public')->delete($cashier->pic);

            $filePath = Storage::disk('public')->put('cashierimg/cashiers/pics', request()->file('pic'), 'public');
            $validated['pic'] = $filePath;
        }

        $update = $cashier->update($validated);

        if($update) {
            session()->flash('notif.success', 'Content updated successfully!');
            return redirect()->route('cashiers.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $cashier = Cashier::findOrFail($id);

        Storage::disk('public')->delete($cashier->pic);

        $delete = $cashier->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Content deleted successfully!');
            return redirect()->route('cashiers.index');
        }

        return abort(500);
    }
}
