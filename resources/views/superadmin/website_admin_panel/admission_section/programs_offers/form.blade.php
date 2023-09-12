@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Admission</li>
        <li class="breadcrumb-item"><a href="{{ route('programs_offers.index') }}">Programs Offered Section</a></li>
        <li class="breadcrumb-item active">Add Program</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($programs_offer) ? 'Edit Program' : 'Add New Program' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">

            <form method="post" action="{{ isset($programs_offer) ? route('programs_offers.update', $programs_offer->id) : route('programs_offers.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($programs_offer)
                    @method('put')
                @endisset
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="title" class="form-label">Program Name</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $programs_offer->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                {{-- <div>
                    <x-input-label for="title" value="Title" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$programs_offer->title ?? old('title')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div> --}}

                <div>
                    <label for="desc" class="form-label">Full Description</label>
                    <textarea id="desc" name="desc" class="form-control tinymce-editor" >{{ $programs_offer->desc ?? old('desc') }}</textarea>
                </div>

                {{-- <div>
                    <x-input-label for="content" value="Content" /> --}}
                    {{-- use textarea-input component that we will create after this --}}
                    {{-- <x-textarea-input id="content" name="content" class="mt-1 block w-full" required autofocus>{{ $programs_offer->content ?? old('content') }}</x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                </div> --}}
                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Publish') }}</button>
                    {{-- @if(URL::previous())
                        <a href="{{ URL::previous() }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                    @endif --}}
                    <a href="{{ route('programs_offers.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                </div>
            </form>
        </div>
    </div>
</section>


{{-- <script>
    // create onchange event listener for program_image input
    document.getElementById('program_image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an image, create a preview in program_image_preview
            document.getElementById('program_image_preview').src = URL.createObjectURL(file)
        }
    }
</script> --}}
@endsection
