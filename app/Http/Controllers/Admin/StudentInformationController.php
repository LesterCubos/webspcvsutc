<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentInformation\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use App\Models\AcademicYear;
use App\Models\User;
use App\Models\EnrollStudentInformation;

class StudentInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.student_informations.index', [ 
            'users' => User::where('role','student')->orderBy('updated_at','desc')->paginate(5), 'acadyears'=> AcademicYear::where('isActive','1')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.student_informations.form', [
            'user' => User::findOrFail($id), 'acadyears'=> AcademicYear::where('isActive','1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $users = User::findOrFail($id);

        $students = EnrollStudentInformation::where('studentNumber', $users->studentNumber)->first();

        $validated = $request->validated();

        $update = $users->update($validated);

        $students->update($validated);

        if($update) {
            session()->flash('notif.success', 'User updated successfully!');
            return redirect()->route('student_informations.index');
        }

        return abort(500);
    }

}
