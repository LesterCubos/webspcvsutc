@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Program Section</li>
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

            <form method="post" action="{{ route('switch.update', ['switch' => 1]) }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($program)
                    @method('put')
                @endisset
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $program->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                {{-- <div>
                    <x-input-label for="title" value="Title" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$program->title ?? old('title')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div> --}}

                <div>
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-control" required autofocus>{{ $program->content ?? old('content') }}</textarea>
                </div>

                {{-- <div>
                    <x-input-label for="content" value="Content" /> --}}
                    {{-- use textarea-input component that we will create after this --}}
                    {{-- <x-textarea-input id="content" name="content" class="mt-1 block w-full" required autofocus>{{ $program->content ?? old('content') }}</x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                </div> --}}
                <br>
                <div>
                    <label for="program_image" class="form-label">Program Image</label>
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
                    @if(URL::previous())
                        <a href="{{ URL::previous() }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                    @endif
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
