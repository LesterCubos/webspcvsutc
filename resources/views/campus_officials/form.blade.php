@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="{{ route('campus_officials.index') }}">Campus Official Page</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($campus_official) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($campus_official) ? route('campus_officials.update', $campus_official->id) : route('campus_officials.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($campus_official)
                    @method('put')
                @endisset


                <br>
                <div>
                    <label for="org_image" class="form-label">Image</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose org_image</span> --}}
                        <input type="file" id="org_image" name="org_image" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="org_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($campus_official) ? Storage::url($campus_official->org_image) : '' }}" alt="Image preview" />
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
    // create onchange event listener for featured_org_image input
    document.getElementById('org_image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an org_image, create a preview in featured_org_image_preview
            document.getElementById('org_image_preview').src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
