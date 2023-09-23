@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">About</li>
        <li class="breadcrumb-item"><a href="{{ route('campus_official_infos.index') }}">Campus Official Page</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($campus_official_info) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($campus_official_info) ? route('campus_official_infos.update', $campus_official_info->id) : route('campus_official_infos.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($campus_official_info)
                    @method('put')
                @endisset

                <br>
                <div>
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $campus_official_info->name ?? old('name') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="position" class="form-label">Position:</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ $campus_official_info->position ?? old('position') }}" required autofocus>
                </div>

                <br>
                <div>
                    <label for="contact" class="form-label">Contact Number:</label>
                    <input type="number" class="form-control" id="contact" name="contact" value="{{ $campus_official_info->contact ?? old('contact') }}">
                </div>

                <br>
                <div>
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $campus_official_info->email ?? old('email') }}">
                </div>

                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('campus_official_infos.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                    
                </div>
            </form>
        </div>
    </div>
</section>



@endsection
