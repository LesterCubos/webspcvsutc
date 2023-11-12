@extends('student.student_master')
@section('title', 'Student Information')
@section('content')

    <div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
        <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
        <div class="pagetitle">
            <h1>Student Information</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}" class="abreadlink">
                    <i class="bi bi-house-fill"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" style="font-weight: 700">Student Information</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card" style="margin-top: 110px">
                <div class="card-body">
                    <form method="POST" action="{{ route('student.user.profile.store') }}" enctype="multipart/form-data">
                        @csrf
            
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
            
                        <div class="row mb-3">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end" style="font-size: 20px; font-weight: bolder">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">
            
                                @if (empty(Auth::user()->avatar))
                                    <img height="90" src="{{ asset('img/default.png') }}" alt="Profile Photo" style="width:80px;margin-top: 10px;">
                                @else
                                  <img src="/avatars/{{ Auth::user()->avatar }}" style="width:80px;margin-top: 10px;">
                                @endif
                                
            
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
        <div class="row">
            @foreach ( $users as $user)
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card" style="border-radius: 10px">
                    <div class="card-body">
                        <h4 class="card-title">Basic Information</h4>
                        <form class="forms-sample">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" placeholder="{{ $user->first_name }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" placeholder="{{ $user->middle_name }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" placeholder="{{ $user->surname }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="{{ $user->email }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" id="age" placeholder="{{ $user->age }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="text" class="form-control" id="birthday" placeholder="{{ $user->birthday }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="birth_place">Place of Birth</label>
                            <input type="text" class="form-control" id="birth_place" placeholder="{{ $user->birth_place }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="sex">Sex</label>
                            <input type="text" class="form-control" id="sex" placeholder="{{ $user->sex }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="civil_status">Civil Status</label>
                            <input type="text" class="form-control" id="civil_status" placeholder="{{ $user->civil_status }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="nationality">Nationality</label>
                            <input type="text" class="form-control" id="nationality" placeholder="{{ $user->nationality }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" id="religion" placeholder="{{ $user->religion }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact No.</label>
                            <input type="text" class="form-control" id="contact_number" placeholder="{{ $user->contact_number }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="{{ $user->address }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" placeholder="{{ $user->postal_code }}" readonly="readonly">
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
        
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card" style="border-radius: 10px">
                    <div class="card-body">
                        <h4 class="card-title">Educational Background</h4>
                        <form class="forms-sample">
                        <div class="form-group row">
                            <label for="student_number" class="col-sm-3 col-form-label">Student Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="student_number" placeholder="{{ $user->student_number }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="program" class="col-sm-3 col-form-label">Program</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="program" placeholder="{{ $user->program }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="undergraduate_year" class="col-sm-3 col-form-label">Year</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="undergraduate_year" placeholder="{{ $user->undergraduate_year }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_classification" class="col-sm-3 col-form-label">Student Classification</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="student_classification" placeholder="{{ $user->student_classification }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="registration_status" class="col-sm-3 col-form-label">Registration Status</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="registration_status" placeholder="{{ $user->registration_status }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="elementary_school" class="col-sm-3 col-form-label">Elememtary School</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="elementary_school" placeholder="{{ $user->elementary_school }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="juniorhigh_school" class="col-sm-3 col-form-label">Junior High School</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="juniorhigh_school" placeholder="{{ $user->juniorhigh_school }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="seniorhigh_school" class="col-sm-3 col-form-label">Senior High School</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="seniorhigh_school" placeholder="{{ $user->seniorhigh_school }}" readonly="readonly">
                            </div>
                        </div>
                        <h4 class="card-title">Guardian Information</h4>
                        <div class="form-group row">
                            <label for="guardian_name" class="col-sm-3 col-form-label">Guardian Name</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="guardian_name" placeholder="{{ $user->guardian_name }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="guardian_number" class="col-sm-3 col-form-label">Guardian Number</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="guardian_number" placeholder="{{ $user->guardian_number }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="guardian_occupation" class="col-sm-3 col-form-label">Guardian Occupation</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="guardian_occupation" placeholder="{{ $user->guardian_occupation }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="guardian_address" class="col-sm-3 col-form-label">Guardian Address</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="guardian_address" placeholder="{{ $user->address }}" readonly="readonly">
                            </div>
                        </div>
                        <a href="{{ route('superadmin.sp.manage_user_pages.index')}}" class="btn btn-dark btn-lg btn-block" style="margin-top: 330px">Back</a>
                        </form>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
@endsection
