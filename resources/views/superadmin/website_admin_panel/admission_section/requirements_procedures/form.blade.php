@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Admission</li>
        <li class="breadcrumb-item"><a href="{{ route('requirements_procedures.index') }}">Admission Requirements Procedure Page</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($requirements_procedure) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($requirements_procedure) ? route('requirements_procedures.update', $requirements_procedure->id) : route('requirements_procedures.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($requirements_procedure)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $requirements_procedure->title ?? old('title') }}">
                </div>
                <br>
                <div>
                    <label for="content" class="form-label">Content:</label>
                    <textarea style="height: 250px" id="content" name="content" class="form-control tinymce-editor">{{ $requirements_procedure->content ?? old('content') }}</textarea>
                </div>
                <br>
                <div>
                    <label for="img" class="form-label">Image:</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose img</span> --}}
                        <input type="file" id="img" name="img" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="img_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($requirements_procedure) ? Storage::url($requirements_procedure->img) : '' }}" alt="img preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                   
                    <a href="{{ route('requirements_procedures.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                 
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // create onchange event listener for featured_img input
    document.getElementById('img').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an img, create a preview in featured_img_preview
            document.getElementById('img_preview').src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
