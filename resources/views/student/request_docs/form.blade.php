@extends('student.student_master')
@section('title', 'Manage Request Documents')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Manage Request Documents</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
              <li class="breadcrumb-item">Request Documents</li>
            <li class="breadcrumb-item active" style="font-weight: 700">{{ isset($requestdoc) ? 'Edit' : 'Add' }} Request Documents</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border-radius: 10px; margin-top: 30px">
            <div class="card-body">
                <form method="post" action="{{ isset($requestdoc) ? route('request_docs.update', $requestdoc->id) : route('request_docs.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- add @method('put') for edit mode --}}
                    @isset($requestdoc)
                        @method('put')
                    @endisset
                    <br>
                    @livewire('request-docs-checkbox')
                    <br>
                    <div class="form-group">
                        <label for="purpose">Purpose:</label>
                        <textarea  name="purpose" id="purpose" class="form-control @error('purpose') is-invalid @enderror" value="{{ $requestdoc->purpose ?? old('purpose') }}" rows="4"></textarea>
                        @error('purpose')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
    
                    <div class="flex text-center" style="padding-top: 10px">
                        <button class="btn btn-success ">{{ __('Save') }}</button>
                        <a href="{{ route('request_docs.index') }}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection