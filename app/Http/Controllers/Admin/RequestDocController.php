<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RequestDoc\StoreRequest;
use App\Http\Requests\RequestDoc\UpdateRequest;
use App\Models\Legend;
use App\Models\RequestDoc;
use App\Models\User;

class RequestDocController extends Controller
{
    
    public function index(): Response
    {

        return response()->view('admin.requestdoc.index', [
            'requestdocs' => RequestDoc::orderBy('updated_at', 'desc')->paginate(10),
            'legends' => Legend::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.requestdoc.form', [ 'legends' => Legend::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = RequestDoc::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Request has been posted successfully!');
            return redirect()->route('requestdocs.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('requestdocs.show', [
            'requestdoc' => RequestDoc::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.requestdoc.form', [
            'requestdoc' => RequestDoc::findOrFail($id), 'legends' => Legend::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $requestdoc = RequestDoc::findOrFail($id);
        $validated = $request->validated();

        $update = $requestdoc->update($validated);

        if($update) {
            session()->flash('notif.success', 'Request has been updated successfully!');
            return redirect()->route('requestdocs.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id): RedirectResponse
    // {
    //     $requestdoc = RequestDoc::findOrFail($id);

    //     $delete = $requestdoc->delete($id);

    //     if($delete) {
    //         session()->flash('notif.success', 'Request has been deleted successfully!');
    //         return redirect()->route('requestdocs.index');
    //     }

    //     return abort(500);
    // }

    public function destroy(Request $request, string $id)
    {
        // Retrieve the superadmin user from the database
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            // Check if the password provided by the superadmin user is valid
            if (Hash::check($request->input('password'), $admin->password)) {
                // Proceed with the deletion of the user
                $requestdoc = RequestDoc::findOrFail($id);

                $delete = $requestdoc->delete($id);
                // Redirect to the users index page with a success message
                if ($delete) {
                    session()->flash('notif.success', 'Request has been deleted successfully!');
                    return redirect()->route('semesters.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}
