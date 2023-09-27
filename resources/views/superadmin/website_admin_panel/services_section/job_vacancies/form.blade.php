@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item"><a href="{{ route('job_vacancies.index') }}">Job Vacancies</a> </li>
        <li class="breadcrumb-item active"> Add Job Vacancy</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($job_vacancy) ? 'Edit Job Vacancy' : 'Add Job Vacancy' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($job_vacancy) ? route('job_vacancies.update', $job_vacancy->id) : route('job_vacancies.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($job_vacancy)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $job_vacancy->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="description" class="form-label">Description:</label>
                    <textarea style="height: 250px" id="description" name="description" class="form-control tinymce-editor">{{ $job_vacancy->description ?? old('description') }}</textarea>
                </div>
                <br>
                <div>
                    <label for="jobposter" class="form-label">Featured Poster:</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose poster</span> --}}
                        <input type="file" id="jobposter" name="jobposter" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="jobposter_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($job_vacancy) ? Storage::url($job_vacancy->jobposter) : '' }}" alt="Image preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                   
                    <a href="{{ route('job_vacancies.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                  
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // create onchange event listener for featured_poster input
    document.getElementById('jobposter').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an poster, create a preview in featured_poster_preview
            document.getElementById('jobposter_preview').src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
