<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\ChangeInfoReq\StoreRequest;
use App\Http\Requests\ChangeInfoReq\UpdateRequest;

use App\Models\ChangeInfoReq;
use App\Models\Legend;
use App\Models\User;

class ChangeInfoReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.student_informations.changeindex', [
            'changeinforeqs' => ChangeInfoReq::orderBy('updated_at', 'desc')->paginate(5), 'legends' => Legend::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $studentNumber = Session::get('studentNumber');
        return response()->view('student.student_information.form', [
            'legends' => Legend::all(), 'users' => User::where('studentNumber', $studentNumber)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = ChangeInfoReq::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Change student information request send successfully!');
            return redirect()->route('student.student_information');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.ChangeInfoReqs.show', [
            'changeinforeq' => ChangeInfoReq::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $changeinforeqs = ChangeInfoReq::findOrFail($id);
        Session::put('idNo', $changeinforeqs->id);

        return response()->view('admin.student_informations.changeform', [
            'changeinforeq' => ChangeInfoReq::findOrFail($id), 'ChangeInfoReqs' => ChangeInfoReq::orderBy('updated_at', 'desc')->paginate(5), 'legends' => Legend::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $changeinforeqs = ChangeInfoReq::findOrFail($id);
        $validated = $request->validated();

        $update = $changeinforeqs->update($validated);

        if($update) {
            session()->flash('notif.success', 'Change student information request updated successfully!');
            return redirect()->route('adchangeinforeqs.index');
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
                $changeinforeq = ChangeInfoReq::findOrFail($id);

                $delete = $changeinforeq->delete($id);
                // Redirect to the users index page with a success message
                if ($delete) {
                    session()->flash('notif.success', 'Change student information request deleted successfully!');
                    return redirect()->route('ChangeInfoReqs.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}
