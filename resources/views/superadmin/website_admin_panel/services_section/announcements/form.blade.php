@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item"><a href="{{ route('announcements.index') }}"> Announcement Section </a> </li>
        <li class="breadcrumb-item active"> Add Announcement</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($announcement) ? 'Edit Announcement' : 'Add Announcement' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($announcement) ? route('announcements.update', $announcement->id) : route('announcements.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($announcement)
                    @method('put')
                    <br>
                    <label for="switch" class="form-label">Status:</label>
                    @livewire('switch-status', ['model' => $announcement, 'field' => 'isActive'], key($announcement->id))
                @endisset
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $announcement->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="content" class="form-label">Content:</label>
                    <textarea style="height: 250px" id="content" name="content" class="form-control tinymce-editor">{{ $announcement->content ?? old('content') }}</textarea>
                </div>
                <br>
                <div>
                    <label for="poster" class="form-label">Featured Image:</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose poster</span> --}}
                        <input type="file" id="poster" name="poster" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="poster_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($announcement) ? Storage::url($announcement->poster) : '' }}" alt="Image preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                   
                    <a href="{{ route('announcements.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                  
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // create onchange event listener for featured_poster input
    document.getElementById('poster').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an poster, create a preview in featured_poster_preview
            document.getElementById('poster_preview').src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
