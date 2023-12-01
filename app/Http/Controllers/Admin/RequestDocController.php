<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RequestDoc\StoreRequest;
use App\Http\Requests\RequestDoc\UpdateRequest;
use App\Models\Legend;
use App\Models\RequestDoc;
use App\Models\User;

class RequestDocController extends Controller
{
    
    public function index(): Response
    {
        $routeName = \Route::current()->getName();
        $viewName = ($routeName == 'requestdocs.index') ? 'admin.requestdoc.index' : 'student.request_docs.index';

        return response()->view($viewName, [
            'requestdocs' => RequestDoc::orderBy('updated_at', 'desc')->paginate(10),
            'legends' => Legend::all(), 'routeName' => $routeName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('student.request_docs.form', [ 'legends' => Legend::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $email = Session::get('email');
        $users = User::where('email', $email)->get();
        $legends = Legend::all();
        $docs = Session::get('docs');

        // insert only requests that already validated in the StoreRequest
        $create = RequestDoc::create($validated);
        $create->generateTransNo();
        $create->req = $docs;
        foreach ($legends as $legend) {
            $create->aYear = $legend->schoolyear;
            $create->sem = $legend->semester;
        }
        foreach ($users as $user) {
            $create->studentName = $user->firstName." ".$user->middleName[0].". ".$user->lastName;
            $create->studentNo = $user->studentNumber;
            $create->prog = $user->course;
        }
        $create->save();

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Request has been posted successfully!');
            $routeName = \Route::current()->getName();
            $viewName = ($routeName == 'requestdocs.index') ? 'requestdocs.index' : 'request_docs.index';
            return redirect()->route($viewName);
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
        $requestdocs = RequestDoc::findOrFail($id);

        return response()->view('admin.requestdoc.form', [
            'requestdoc' => RequestDoc::findOrFail($id), 'legends' => Legend::all(), 'docs' => explode("\n- ", $requestdocs->req)
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
    public function destroy(string $id): RedirectResponse
    {
        $requestdoc = RequestDoc::findOrFail($id);

        $delete = $requestdoc->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Request has been deleted successfully!');
            return redirect()->route('request_docs.index');
        }

        return abort(500);
    }

}
