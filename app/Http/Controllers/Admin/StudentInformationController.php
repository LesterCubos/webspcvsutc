<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentInformation\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use App\Models\AcademicYear;
use App\Models\User;
use App\Models\EnrollStudentInformation;
use App\Models\Legend;
use App\Models\ChangeInfoReq;

class StudentInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        
        return response()->view('admin.student_informations.index', [ 
            'users' => User::where('role','student')->orderBy('updated_at','desc')->paginate(5), 'acadyears'=> AcademicYear::where('isActive','1')->get(),
            'legends' => Legend::all(),
            'pendingChange' => ChangeInfoReq::where('status', 'Pending')->count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.student_informations.form', [
            'user' => User::findOrFail($id), 'acadyears'=> AcademicYear::where('isActive','1')->get(), 'legends' => Legend::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $users = User::findOrFail($id);
        $idNo = Session::get('idNo');

        $changeinforeqs = ChangeInfoReq::where('id', $idNo)->get();
        foreach($changeinforeqs as $changeinforeq) {
            $changeinforeq->status = 'Completed';
            $changeinforeq->save();
        }

        $students = EnrollStudentInformation::where('studentNumber', $users->studentNumber)->first();

        $validated = $request->validated();

        $update = $users->update($validated);

        $students->update($validated);

        if($update) {
            session()->flash('notif.success', 'Change student information request updated successfully!');
            return redirect()->route('adchangeinforeqs.index');
        }

        return abort(500);
    }

    public function show(string $id): Response
    {
        return response()->view('admin.student_informations.show', [
            'user' => User::findOrFail($id), 'legends' => Legend::all()
        ]);
    }

}
