@extends('superadmin.superadmin_master')
@section('title','Manage Other Links')
@section('content')
<div class="pagetitle">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item"><a href="{{ route('other_links.index') }}">Other Links</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($other) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($other) ? route('other_links.update', $other->id) : route('other_links.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($other)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $other->name ?? old('name') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="link" class="form-label">Link:</label>
                    <textarea id="link" name="link" class="form-control" required autofocus>{{ $other->link ?? old('link') }}</textarea>
                </div>
                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('other_links.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                  
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
