<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\Admission;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Admission\StoreRequest;
use App\Http\Requests\Admission\UpdateRequest;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function toggleSection(Request $request)
    // {
    //     $showSection = ! $request->session()->get('show_section', false);
    //     $request->session()->put('show_section', $showSection);

    //     return redirect()->back();
    // }

    public function show(string $id): Response
    {
        return response()->view('admissions.show', [
            'admission' => Admission::findOrFail($id),
        ]);
    }




    public function index()
    {
        $admissions = Admission::all();

        return view('admissions.index', compact('admissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admissions.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:3|max:250',
            'descrip' => 'required|string|min:3|max:6000'
        ]);

        $admission = Admission::create([
            'title' => $request->title,
            'descrip' => $request->descrip,
            'status' => $request->status == 'on' ? 1 : 0
        ]);


        return redirect()->route('admissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function show(string $id): Response
    {
        return response()->view('admissions.show', [
            'admission' => Admission::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function edit(Admission $admission)
    {
        return view('admissions.form', compact('admission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admission $admission)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:250',
            'descrip' => 'required|string|min:3|max:6000'
        ]);

        $admission->update([
            'title' => $request->title,
            'descrip' => $request->descrip,
            'status' => $request->status == 'on' ? 1 : 0
        ]);

        return redirect()->route('admissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admission $admission)
    {
        $admission->delete();

        return redirect()->route('admissions.index');
    }
}
