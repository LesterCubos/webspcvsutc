<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Semester\StoreRequest;
use App\Http\Requests\Semester\UpdateRequest;

use App\Models\Semester;
use App\Models\AcademicYear;
use App\Models\User;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.semester.index', [
            'semesters' => Semester::orderBy('updated_at', 'desc')->paginate(5), 'acadyears'=> AcademicYear::where('isActive', '1')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.semester.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = Semester::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Semester created successfully!');
            return redirect()->route('semesters.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.semesters.show', [
            'semester' => Semester::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.semester.index', [
            'semester' => Semester::findOrFail($id), 'semesters' => Semester::orderBy('updated_at', 'desc')->paginate(5), 'acadyears'=> AcademicYear::where('isActive', '1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $semesters = Semester::findOrFail($id);
        $validated = $request->validated();

        $update = $semesters->update($validated);

        if($update) {
            session()->flash('notif.success', 'Academic Year updated successfully!');
            return redirect()->route('semesters.index');
        }

        return abort(500);
    }

    public function destroy(Request $request, string $id)
    {
        // Retrieve the superadmin user from the database
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            // Check if the password provided by the superadmin user is valid
            if (Hash::check($request->input('password'), $admin->password)) {
                // Proceed with the deletion of the user
                $semester = Semester::findOrFail($id);

                $delete = $semester->delete($id);
                // Redirect to the users index page with a success message
                if ($delete) {
                    session()->flash('notif.success', 'Semester deleted successfully!');
                    return redirect()->route('semesters.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}
