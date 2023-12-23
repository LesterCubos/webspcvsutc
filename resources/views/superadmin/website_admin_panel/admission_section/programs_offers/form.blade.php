@extends('superadmin.superadmin_master')
@section('title','Manage Undergraduate Program')
@section('content')
<div class="pagetitle">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Admission</li>
        <li class="breadcrumb-item"><a href="{{ route('programs_offers.index') }}">Undergraduate Program Section</a></li>
        <li class="breadcrumb-item active">Add Program</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($programs_offer) ? 'Edit Program' : 'Add New Program' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">

            <form method="post" action="{{ isset($programs_offer) ? route('programs_offers.update', $programs_offer->id) : route('programs_offers.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($programs_offer)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="title" class="form-label">Program Name:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $programs_offer->title ?? old('title') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="desc" class="form-label">Full Description:</label>
                    <textarea id="desc" name="desc" class="form-control tinymce-editor" >{{ $programs_offer->desc ?? old('desc') }}</textarea>
                </div>
                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Publish') }}</button>
                    
                    <a href="{{ route('programs_offers.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
