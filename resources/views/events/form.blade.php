@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Event Section</a></li>
        <li class="breadcrumb-item active">Add Event</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($event) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($event)
                    @method('put')
                @endisset
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control" id="date" name="date" value="{{ $event->date ?? old('date') }}" required autofocus>
                </div>
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="event_title" class="form-label">Event Title</label>
                    <input type="text" class="form-control" id="event_title" name="event_title" value="{{ $event->event_title ?? old('event_title') }}" required autofocus>
                </div>
                <br>
                {{-- <div>
                    <x-input-label for="title" value="Title" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$carousel_item->title ?? old('title')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div> --}}

                <div>
                    <label for="desc" class="form-label">Description</label>
                    <textarea style="height: 250px" id="desc" name="desc" class="form-control" required autofocus>{{ $event->desc ?? old('desc') }}</textarea>
                </div>

                {{-- <div>
                    <x-input-label for="desc" value="desc" /> --}}
                    {{-- use textarea-input component that we will create after this --}}
                    {{-- <x-textarea-input id="desc" name="desc" class="mt-1 block w-full" required autofocus>{{ $carousel_item->desc ?? old('desc') }}</x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('desc')" />
                </div> --}}
                <br>
                {{-- <div>
                    <label for="image" class="form-label">Featured Image</label>
                    <br>
                    <label class="block mt-2"> --}}
                        {{-- <span class="sr-only">Choose image</span> --}}
                        {{-- <input type="file" id="image" name="image" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($event) ? Storage::url($event->image) : '' }}" alt="Image preview" />
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
