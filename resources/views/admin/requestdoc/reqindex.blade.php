@extends('admin.admin_master')
@section('title','Manage Request Options')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Request Options</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
            <li class="breadcrumb-item" style="font-weight: 700">Request Documents</li>
            <li class="breadcrumb-item active" style="font-weight: 700">Request Options</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <a href="{{ route('requestdocs.index') }}" class="btn btn-info btn-icon-text">
        <i class="icon-arrow-left btn-icon-prepend"></i>
        Go Back
    </a>

    <div style="margin-top: 20px; margin-bottom: 20px">
        @if(session('notif.success'))
          <div class="alert alert-success fade in alert-dismissible show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
            </button>    
            <i class="bi bi-check-circle-fill" style="margin-right: 5px; font-size: 18px"></i>   
            <strong>{{ session('notif.success') }}</strong>
          </div>
        @elseif (session('notif.danger'))
          <div class="alert alert-danger fade in alert-dismissible show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
            </button>    
            <i class="bi bi-exclamation-circle-fill" style="margin-right: 5px; font-size: 18px"></i>
            <strong>{{ session('notif.danger') }}</strong>
          </div>
        @endif
    </div>

    @if(session('notif.success') || session('notif.danger'))
      <div class="row">
    @else
        <div class="row" style="margin-top: 20px">
    @endif
        @livewire('reqoption-search')
        <div class="col-xl-3 grid-margin-lg-0 grid-margin stretch-card">
          <div class="card"  style="border-radius: 10px">
            <div class="card-body">
                <h4 class="card-title mb-3">Request Option {{ isset($reqoption) ? 'Edit' : 'Add' }}</h4>
                <form method="post" action="{{ isset($reqoption) ? route('reqoptions.update', $reqoption->id) : route('reqoptions.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- add @method('put') for edit mode --}}
                    @isset($reqoption)
                        @method('put')
                    @endisset
                    <br>
                    
                    <div class="form-group">
                        <label for="reqoption">Request Option:</label>
                        <input type="text" class="form-control  @error('reqoption') is-invalid @enderror" id="reqoption" name="reqoption" value="{{ $reqoption->reqoption ?? old('reqoption') }}" placeholder="Input Option" required>
                        @error('reqoption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $reqoption->price ?? old('price') }}" step="0.01" placeholder="Input Price" required>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
    
                    <div class="flex text-center" style="padding-top: 10px">
                        <button class="btn btn-success ">{{ __('Save') }}</button>
                    </div>
                </form>

            </div>
          </div>
        </div>
      </div>
    
</div>
@endsection
