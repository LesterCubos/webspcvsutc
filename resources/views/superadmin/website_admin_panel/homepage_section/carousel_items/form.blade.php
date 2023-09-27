@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Homepage</li>
        <li class="breadcrumb-item"><a href="{{ route('carousel_items.index') }}">Hero Section</a></li>
        <li class="breadcrumb-item active">Add Image</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($carousel_item) ? 'Edit Banner' : 'Add New Banner' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($carousel_item) ? route('carousel_items.update', $carousel_item->id) : route('carousel_items.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($carousel_item)
                    @method('put')
                    <br>
                    <label for="switch" class="form-label">Status:</label>
                    @livewire('switch-status', ['model' => $carousel_item, 'field' => 'isActive'], key($carousel_item->id))
                @endisset
                
                
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $carousel_item->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                {{-- <div>
                    <x-input-label for="title" value="Title" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$carousel_item->title ?? old('title')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div> --}}

                <div>
                    <label for="content" class="form-label">Content:</label>
                    <textarea id="content" name="content" class="form-control" required autofocus>{{ $carousel_item->content ?? old('content') }}</textarea>
                </div>

                {{-- <div>
                    <x-input-label for="content" value="Content" /> --}}
                    {{-- use textarea-input component that we will create after this --}}
                    {{-- <x-textarea-input id="content" name="content" class="mt-1 block w-full" required autofocus>{{ $carousel_item->content ?? old('content') }}</x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                </div> --}}
                <br>
                <div>
                    <label for="featured_image" class="form-label">Featured Image:</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose image</span> --}}
                        <input type="file" id="featured_image" name="featured_image" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="featured_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($carousel_item) ? Storage::url($carousel_item->featured_image) : '' }}" alt="Featured image preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('carousel_items.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                 
                </div>
            </form>
        </div>
    </div>
</section>


<script>
    // create onchange event listener for featured_image input
    document.getElementById('featured_image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an image, create a preview in featured_image_preview
            document.getElementById('featured_image_preview').src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
