@extends('superadmin.superadmin_master')
@section('title','Manage MVG')
@section('content')
<div class="pagetitle">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">About</li>
        <li class="breadcrumb-item"><a href="{{ route('mvgs.index') }}">Mission, Vision, Goal Page</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($mvg) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($mvg) ? route('mvgs.update', $mvg->id) : route('mvgs.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($mvg)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="title1" class="form-label">Title Left:</label>
                    <input type="text" class="form-control" id="title" name="title1" value="{{ $mvg->title1 ?? old('title1') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="title2" class="form-label">Title Right:</label>
                    <input type="text" class="form-control" id="title2" name="title2" value="{{ $mvg->title2 ?? old('title2') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="content" class="form-label">Content:</label>
                    <textarea style="height: 250px" id="content" name="content" class="form-control tinymce-editor">{{ $mvg->content ?? old('content') }}</textarea>
                </div>
                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('mvgs.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                  
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
