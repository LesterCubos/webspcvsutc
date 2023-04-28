@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="{{ route('admissions.index') }}">Admission Section</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($admission) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($admission) ? route('admissions.update', $admission->id) : route('admissions.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($admission)
                    @method('put')
                @endisset
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $admission->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                {{-- <div>
                    <x-input-label for="title" value="Title" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$admission->title ?? old('title')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div> --}}

                <div>
                    <label for="descrip" class="form-label">Description</label>
                    <textarea id="descrip" name="descrip" class="form-control tinymce-editor">{{ $admission->descrip ?? old('descrip') }}</textarea>
                </div>

                {{-- <div>
                    <x-input-label for="descrip" value="descrip" /> --}}
                    {{-- use textarea-input component that we will create after this --}}
                    {{-- <x-textarea-input id="descrip" name="descrip" class="mt-1 block w-full" required autofocus>{{ $admission->descrip ?? old('descrip') }}</x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('descrip')" />
                </div> --}}
                <br>
                {{-- <div class="mb-6">
                    <label class="block">
                        <span class="">Status</span>
                        <input type="checkbox" name="status" {{ $admission->status==1?'checked':'' }}/>
                    </label>
                    @error('status')
                    <div class="flex items-center text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}
                {{-- <div>
                    <label for="bg_pic" class="form-label">Background Image</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose image</span> --}}
                        {{-- <input type="file" id="bg_pic" name="bg_pic" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="bg_pic_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($admission) ? Storage::url($admission->bg_pic) : '' }}" alt="Background image preview" />
                    </div>
                </div> --}}

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


{{-- <script>
    // create onchange event listener for bg_pic input
    document.getElementById('bg_pic').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an image, create a preview in bg_pic_preview
            document.getElementById('bg_pic_preview').src = URL.createObjectURL(file)
        }
    }
</script> --}}

@endsection
