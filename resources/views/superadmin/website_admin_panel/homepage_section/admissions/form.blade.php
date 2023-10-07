@extends('superadmin.superadmin_master')
@section('title','Manage Admission Section')
@section('content')
<div class="pagetitle">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Homepage</li>
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
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $admission->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="descrip" class="form-label">Description:</label>
                    <textarea id="descrip" name="descrip" class="form-control tinymce-editor">{{ $admission->descrip ?? old('descrip') }}</textarea>
                </div>
                <br>
        
                
                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('admissions.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>

                </div>
            </form>
        </div>
    </div>
</section>


@endsection
