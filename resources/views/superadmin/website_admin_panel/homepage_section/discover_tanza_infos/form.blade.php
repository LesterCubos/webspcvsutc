@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Homepage</li>
        <li class="breadcrumb-item"><a href="{{ route('discover_tanza_infos.index') }}">Discover Tanza Section</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($discover_tanza_info) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($discover_tanza_info) ? route('discover_tanza_infos.update', $discover_tanza_info->id) : route('discover_tanza_infos.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($discover_tanza_info)
                    @method('put')
                @endisset
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="headline" class="form-label">Headline:</label>
                    <input type="text" class="form-control" id="headline" name="headline" value="{{ $discover_tanza_info->headline ?? old('headline') }}" required autofocus>
                </div>
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="subheadline" class="form-label">Sub-Headline:</label>
                    <input type="text" class="form-control" id="subheadlline" name="subheadline" value="{{ $discover_tanza_info->subheadline ?? old('subheadline') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="content" class="form-label">Content:</label>
                    <textarea style="height: 250px" id="content" name="content" class="form-control tinymce-editor">{{ $discover_tanza_info->content ?? old('content') }}</textarea>
                </div>
                <br>
                <div>
                    <label for="image" class="form-label">Featured Image:</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose image</span> --}}
                        <input type="file" id="image" name="image" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($discover_tanza_info) ? Storage::url($discover_tanza_info->image) : '' }}" alt="Image preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('discover_tanza_infos.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                   
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // create onchange event listener for featured_image input
    document.getElementById('image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an image, create a preview in featured_image_preview
            document.getElementById('image_preview').src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
