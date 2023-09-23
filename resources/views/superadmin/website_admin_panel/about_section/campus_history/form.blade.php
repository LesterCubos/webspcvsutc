@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">About</li>
        <li class="breadcrumb-item"><a href="{{ route('campus_history.index') }}">Campus History Section</a></li>
        <li class="breadcrumb-item active">Create History</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($campushistory) ? 'Edit Campus History' : 'Create New Campus History' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($campushistory) ? route('campus_history.update', $campushistory->id) : route('campus_history.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($campushistory)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $campushistory->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="body" class="form-label">Body:</label>
                    <textarea style="height: 500px" id="body" name="body" class="form-control tinymce-editor">{{ $campushistory->body ?? old('body') }}</textarea>
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
                        <img style="width:600px" id="image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($campushistory) ? Storage::url($campushistory->image) : '' }}" alt="Image preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                   
                    <a href="{{ route('campus_history.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
       
                </div>
            </form>
        </div>
    </div>
</section>


<script>
    // create onchange event listener for image input
    document.getElementById('image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an image, create a preview in image_preview
            document.getElementById('image_preview').src = URL.createObjectURL(file)
        }
    }
</script>

{{-- <script>
    $('#summernote').summernote({
      placeholder: 'Descrption',
      tabsize: 2,
      height: 500
    });
</script> --}}


@endsection
