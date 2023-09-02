<?php

namespace App\Http\Controllers\Webpage;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Use the Model
use App\Models\JobVacancies;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\JobVacancies\StoreRequest;
use App\Http\Requests\JobVacancies\UpdateRequest;
use Illuminate\Support\Facades\Storage;


class JobVacanciesController extends Controller
{
    
    public function index(): Response
    {

        return response()->view('superadmin.website_admin_panel.services_section.job_vacancies.index', [
            'job_vacancies' => JobVacancies::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('superadmin.website_admin_panel.services_section.job_vacancies.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('jobposter')) {
             // put poster in the public storage
            $filePath = Storage::disk('public')->put('job_img/job_vacancies/posters', request()->file('jobposter'));
            $validated['jobposter'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = JobVacancies::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Job vacancy has been posted successfully!');
            return redirect()->route('job_vacancies.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('job_vacancies.show', [
            'job_vacancy' => JobVacancies::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('superadmin.website_admin_panel.services_section.job_vacancies.form', [
            'job_vacancy' => JobVacancies::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $job_vacancy = JobVacancies::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('jobposter')) {
            // delete poster
            Storage::disk('public')->delete($job_vacancy->jobposter);

            $filePath = Storage::disk('public')->put('job_img/job_vacancies/posters', request()->file('jobposter'), 'public');
            $validated['jobposter'] = $filePath;
        }

        $update = $job_vacancy->update($validated);

        if($update) {
            session()->flash('notif.success', 'Job vacancy has been updated successfully!');
            return redirect()->route('job_vacancies.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $job_vacancy = JobVacancies::findOrFail($id);

        Storage::disk('public')->delete($job_vacancy->jobposter);

        $delete = $job_vacancy->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Job vacancy has been deleted successfully!');
            return redirect()->route('job_vacancies.index');
        }

        return abort(500);
    }
}