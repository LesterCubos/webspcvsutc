@extends('admin.admin_master')
@section('title','Manage Request Documents')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Request Documents</h1>
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
                <form method="post" action="{{ isset($requestdoc) ? route('requestdocs.update', $requestdoc->id) : route('requestdocs.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- add @method('put') for edit mode --}}
                    @isset($requestdoc)
                        @method('put')
                    @endisset
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-size: 14px; color: #000; font-weight: bolder">STUDENT NAME</label>
                            <div class="col-sm-9">
                                <input type="text" name="studentName" id="studentName" class="form-control @error('studentName') is-invalid @enderror" value="{{ $requestdoc->studentName }}" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-size: 14px; color: #000; font-weight: bolder">STUDENT NUMBER</label>
                            <div class="col-sm-9">
                                <input type="text" name="studentNo" id="studentNo" class="form-control @error('studentNo') is-invalid @enderror" value="{{ $requestdoc->studentNo }}" readonly>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-size: 14px; color: #000; font-weight: bolder">COURSE</label>
                            <div class="col-sm-9">
                                <input type="text" name="prog" id="prog" class="form-control @error('prog') is-invalid @enderror" value="{{ $requestdoc->prog ?? old('prog') }}" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-size: 14px; color: #000; font-weight: bolder">ACADEMIC YEAR</label>
                            <div class="col-sm-9">
                                <input type="text" name="acadyear" id="aYear" class="form-control" value="{{ $requestdoc->aYear }}" readonly>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-size: 14px; color: #000; font-weight: bolder">SEMESTER</label>
                            <div class="col-sm-9">
                                <input type="text" name="sem" id="sem" class="form-control" value="{{ $requestdoc->sem }}" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <label style="font-size: 14px; color: #000; font-weight: bolder">REQUESTED DOCUMENTS</label>
                            <div class="form-group">
                                @foreach ($docs as $doc)
                                    <div class="form-check" style="margin-left: 50px">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" disabled="" checked="">
                                        {{$doc}}
                                        <i class="input-helper"></i></label>
                                    </div> 
                                @endforeach
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        @livewire('request-status')
                      </div>
                      <div class="form-group">
                        <label for="purpose" style="font-size: 14px; color: #000; font-weight: bolder">PURPOSE</label>
                        <textarea  name="purpose" id="purpose" class="form-control @error('purpose') is-invalid @enderror" value="{{ $requestdoc->purpose }}" rows="4" readonly>{!! $requestdoc->purpose !!}</textarea>
                    </div>
                    
                    <br>

    
                    <div class="flex text-center" style="padding-top: 10px">
                        <button class="btn btn-success ">{{ __('Save') }}</button>
                        <a href="{{ route('requestdocs.index') }}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection