@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Homepage</li>
        <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Program Section</a></li>
        <li class="breadcrumb-item active">Add Program</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($program) ? 'Edit Program' : 'Add New Program' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">

            <form method="post" action="{{ isset($program) ? route('programs.update', $program->id) : route('programs.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($program)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $program->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="content" class="form-label">Content:</label>
                    <textarea id="content" name="content" class="form-control" required autofocus>{{ $program->content ?? old('content') }}</textarea>
                </div>
                <br>
                <div>
                    <label for="program_image" class="form-label">Program Image:</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose image</span> --}}
                        <input type="file" id="program_image" name="program_image" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="program_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($program) ? Storage::url($program->program_image) : '' }}" alt="Program image preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                   
                    <a href="{{ route('programs.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                  
                </div>
            </form>
        </div>
    </div>
</section>


<script>
    // create onchange event listener for program_image input
    document.getElementById('program_image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an image, create a preview in program_image_preview
            document.getElementById('program_image_preview').src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
