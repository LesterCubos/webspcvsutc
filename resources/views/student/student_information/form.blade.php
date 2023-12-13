@extends('student.student_master')
@section('title', 'Request Change Student Information')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Request Change Student Information</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
              <li class="breadcrumb-item">Student Information</li>
            <li class="breadcrumb-item active" style="font-weight: 700">Request Change Student Information</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border-radius: 10px; margin-top: 30px">
            <div class="card-body">
                <form method="post" action="{{ route('changeinforeqs.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    @foreach ($users as $user)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Student Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control  @error('studentNum') is-invalid @enderror" id="studentNum" name="studentNum" value="{{ $user->studentNumber }}" readonly>
                                                    @error('studentNum')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control @error('studentName') is-invalid @enderror" id="studentName" name="studentName" value="{{ $user->firstName }} {{ strtoupper($user->middleName[0]) }}. {{ $user->lastName }}" readonly>
                                                        @error('studentName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="form-group">
                                        <label for="request">Request</label>
                                        <textarea class="form-control @error('request') is-invalid @enderror" id="request" name="request" value="{{ old('request') }}" rows="10"></textarea>
                                        @error('request')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-end">
                            <button type="submit" class="btn btn-primary" style="margin-right: 10px">{{ __('Send') }}</button>
                            <a href="{{ route('student.student_information') }}" class="btn btn-warning">Cancel</a>
                        </div>
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection