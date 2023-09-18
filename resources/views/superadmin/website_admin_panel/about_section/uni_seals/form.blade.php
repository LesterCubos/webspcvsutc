@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">About</li>
        <li class="breadcrumb-item"><a href="{{ route('uni_seals.index') }}">University Seal</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($uni_seal) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($uni_seal) ? route('uni_seals.update', $uni_seal->id) : route('uni_seals.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($uni_seal)
                    @method('put')
                @endisset

                <br>
                <div>
                    <label for="content" class="form-label">Content:</label>
                    <textarea style="height: 250px" id="content" name="content" class="form-control tinymce-editor">{{ $uni_seal->content ?? old('content') }}</textarea>
                </div>
                <br>
                <div>
                    <label for="image" class="form-label">Image:</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose image</span> --}}
                        <input type="file" id="image" name="image" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($uni_seal) ? Storage::url($uni_seal->image) : '' }}" alt="Image preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                  
                    <a href="{{ route('uni_seals.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
               
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
