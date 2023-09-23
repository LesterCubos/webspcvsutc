@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">About</li>
        <li class="breadcrumb-item"><a href="{{ route('uni_officials.index') }}">University Officials Page</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page name -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($uni_official) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($uni_official) ? route('uni_officials.update', $uni_official->id) : route('uni_officials.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($uni_official)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="official_name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="official_name" name="official_name" value="{{ $uni_official->official_name ?? old('official_name') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="official_position" class="form-label">Position:</label>
                    <input type="text" class="form-control" id="official_position" name="official_position" value="{{ $uni_official->official_position ?? old('official_position') }}" required autofocus>
                </div>

                <br>
                <div>
                    <label for="official_contactnum" class="form-label">Contact Number:</label>
                    <input type="number" class="form-control" id="official_contactnum" name="official_contactnum" value="{{ $uni_official->contact_number ?? old('official_contactnum') }}">
                </div>

                <br>
                <div>
                    <label for="official_email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="official_email" name="official_email" value="{{ $uni_official->official_email ?? old('official_email') }}">
                </div>

                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('uni_officials.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                    
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
