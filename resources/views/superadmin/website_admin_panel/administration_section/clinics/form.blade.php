@extends('superadmin.superadmin_master')
@section('title','Manage Clinic Page')
@section('content')
<div class="pagetitle">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="{{ route('clinics.index') }}">Clinic Page</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($clinic) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($clinic) ? route('clinics.update', $clinic->id) : route('clinics.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($clinic)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $clinic->title ?? old('title') }}">
                </div>

                <br>
                    <div>
                    <label for="content" class="form-label">Content</label>
                    <textarea style="height: 250px" id="content" name="content" class="form-control tinymce-editor">{{ $clinic->content ?? old('content') }}</textarea>
                </div>

                <br>
                <div>
                    <label for="pic" class="form-label">Image</label>
                    <br>
                    <label class="block mt-2">
                        <input type="file" id="pic" name="pic" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="pic_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($clinic) ? Storage::url($clinic->pic) : '' }}" alt="pic preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('clinics.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                    
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // create onchange event listener for featured_pic input
    document.getElementById('pic').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an pic, create a preview in featured_pic_preview
            document.getElementById('pic_preview').src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
