@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
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
                    <label for="org_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="org_name" name="org_name" value="{{ $about_org->org_name ?? old('org_name') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="desc" class="form-label">Description</label>
                    <textarea style="height: 150px" id="desc" name="desc" class="form-control tinymce-editor">{{ $about_org->desc ?? old('desc') }}</textarea>
                </div>
                <br>
                    <label for="type" class="form-label">Type of Organization</label>
                    <select class="form-select"  id="type" name="type" aria-label="Default select example">
                        <option selected>{{ $about_org->type ?? old('type') }}</option>
                        <option value="Academic Organization")>Academic Organization</option>
                        <option value="Non-Academic Organization">Non-Academic Organization</option>
                    </select>
                <br>
                <div>
                    <label for="org_members" class="form-label">Organization Positions & Members</label>
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

@endsection
