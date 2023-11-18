<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\EnrollStudentInformation\StoreRequest;
use App\Http\Requests\EnrollStudentInformation\UpdateRequest;

use App\Models\EnrollStudentInformation;
use App\Models\AcademicYear;
use App\Models\User;

class StudentAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('superadmin.sp.manage_student_accounts.index', [
            'students' => EnrollStudentInformation::orderBy('lastupdate', 'desc')->paginate(5), 'acadyears'=> AcademicYear::where('isActive', '1')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.sp.manage_student_accounts.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = EnrollStudentInformation::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'student created successfully!');
            return redirect()->route('students.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.students.show', [
            'student' => EnrollStudentInformation::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.sp.manage_student_accounts.index', [
            'student' => EnrollStudentInformation::findOrFail($id), 'acadyears'=> AcademicYear::where('isActive', '1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $students = EnrollStudentInformation::findOrFail($id);
        $validated = $request->validated();

        $update = $students->update($validated);

        if($update) {
            session()->flash('notif.success', 'Academic Year updated successfully!');
            return redirect()->route('students.index');
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
                $student = EnrollStudentInformation::findOrFail($id);

                $delete = $student->delete($id);
                // Redirect to the users index page with a success message
                if ($delete) {
                    session()->flash('notif.success', 'student deleted successfully!');
                    return redirect()->route('students.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}
