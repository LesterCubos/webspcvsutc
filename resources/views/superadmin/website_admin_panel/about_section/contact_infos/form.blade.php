@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">About</li>
        <li class="breadcrumb-item"><a href="{{ route('contact_infos.index') }}">Contact Information Page</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page name -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($contact_info) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($contact_info) ? route('contact_infos.update', $contact_info->id) : route('contact_infos.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($contact_info)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="campus_address" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="campus_address" name="campus_address" value="{{ $contact_info->campus_address ?? old('campus_address') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="campus_email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="campus_email" name="campus_email" value="{{ $contact_info->campus_email ?? old('campus_email') }}">
                </div>
                <br>
                <div>
                    <label for="campus_number" class="form-label">Contact Number:</label>
                    <input type="number" class="form-control" id="campus_number" name="campus_number" value="{{ $contact_info->campus_number ?? old('campus_number') }}">
                </div>

                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                   
                    <a href="{{ route('contact_infos.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                   
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
