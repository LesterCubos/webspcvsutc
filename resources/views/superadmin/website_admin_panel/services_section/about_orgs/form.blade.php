@extends('superadmin.superadmin_master')
@section('title','Manage Student Organization Orgs')
@section('content')
<div class="pagetitle">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item"><a href="{{ route('about_orgs.index') }}">Student Organizations Page</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page name -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($about_org) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($about_org) ? route('about_orgs.update', $about_org->id) : route('about_orgs.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($about_org)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="org_name" class="form-label">Organization Name:</label>
                    <input type="text" class="form-control" id="org_name" name="org_name" value="{{ $about_org->org_name ?? old('org_name') }}" required autofocus>
                </div>
                <br>

                <div>
                    <label for="org_logo" class="form-label">Organization Logo:</label>
                    <br>
                    <label class="block mt-2">
                        <input type="file" id="org_logo" name="org_logo" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="org_logo_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($about_org) ? Storage::url($about_org->org_logo) : '' }}" alt="org_logo preview" />
                    </div>
                </div>
                <br>

                <div>
                    <label for="desc" class="form-label">Description:</label>
                    <textarea style="height: 150px" id="desc" name="desc" class="form-control tinymce-editor">{{ $about_org->desc ?? old('desc') }}</textarea>
                </div>
                <br>
                    <label for="type" class="form-label">Type of Organization:</label>
                    <select class="form-select"  id="type" name="type" aria-label="Default select example">
                        {{-- <option selected>{{ $about_org->type ?? old('type') }}</option> --}}
                        <option value="Academic Organization" {{ old('type') == 'Academic Organization' ? 'selected' : '' }}>Academic Organization</option>
                        <option value="Non-Academic Organization" {{ old('type') == 'Non-Academic Organization' ? 'selected' : '' }}>Non-Academic Organization</option>
                    </select>
                <br>
                <div>
                    <label for="org_members" class="form-label">Organization Positions & Members:</label>
                    <textarea style="height: 150px" id="org_members" name="org_members" class="form-control tinymce-editor">{{ $about_org->org_members ?? old('org_members') }}</textarea>
                </div>
                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{route('about_orgs.index')}}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
            
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    // create onchange event listener for featured_org_logo input
    document.getElementById('org_logo').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an org_logo, create a preview in featured_org_logo_preview
            document.getElementById('org_logo_preview').src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
