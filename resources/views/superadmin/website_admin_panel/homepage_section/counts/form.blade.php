@extends('superadmin.superadmin_master')
@section('title','Manage Counts Section')
@section('content')
<div class="pagetitle">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Homepage</li>
        <li class="breadcrumb-item"><a href="{{ route('counts.index') }}">Counts Section</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($count) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($count) ? route('counts.update', $count->id) : route('counts.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($count)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="category" class="form-label">Category:</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ $count->category ?? old('category') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="value" class="form-label">Value:</label>
                    <input type="number" class="form-control" id="value" name="value" value="{{ $count->value ?? old('value') }}" required autofocus>
                </div>
                <br>
                
                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('counts.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                   
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
