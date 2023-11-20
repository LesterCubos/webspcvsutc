@extends('admin.admin_master')
@section('title','Manage Student Informations')

@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Student Informations</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
              <li class="breadcrumb-item">Student Informations</li>
            <li class="breadcrumb-item active" style="font-weight: 700">Edit Student Information</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="margin-top: 50px; border-radius: 10px">
            <div class="card-body">
                <form method="POST" action="{{ route('student_informations.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <h4 class="card-title" style="font-size: 18px">Student Information</h4>
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control  @error('firstName') is-invalid @enderror" id="firstName" name="firstName" value="{{ $user->firstName }}">
                        @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="middleName">Middle Name</label>
                        <input type="text" class="form-control  @error('middleName') is-invalid @enderror" id="middleName" name="middleName" value="{{ $user->middleName }}">
                        @error('middleName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control  @error('lastName') is-invalid @enderror" id="lastName" name="lastName" value="{{ $user->lastName }}">
                        @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dateOfBirth">Birthday</label>
                        <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control @error('dateOfBirth') is-invalid @enderror" value="{{ $user->dateOfBirth }}">
                        @error('dateOfBirth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select type="text" id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ $user->gender }}">
                            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Civil Status</label>
                        <select type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ $user->status }}">
                            <option value="Single" {{ $user->status == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="Married" {{ $user->status == 'Married' ? 'selected' : '' }}>Married</option>
                            <option value="Widow" {{ $user->status == 'Widow' ? 'selected' : '' }}>Widow</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="citizenship">Citizenship</label>
                        <input type="text" class="form-control  @error('citizenship') is-invalid @enderror" id="citizenship" name="citizenship" value="{{ $user->citizenship }}">
                        @error('citizenship')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="religion">Religion</label>
                        <input type="text" class="form-control  @error('religion') is-invalid @enderror" id="religion" name="religion" value="{{ $user->religion }}">
                        @error('religion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input type="text" class="form-control  @error('street') is-invalid @enderror" id="street" name="street" value="{{ $user->street }}">
                        @error('street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="barangay">Barangay</label>
                        <input type="text" class="form-control  @error('barangay') is-invalid @enderror" id="barangay" name="barangay" value="{{ $user->barangay }}">
                        @error('barangay')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="municipality">Municipality</label>
                        <input type="text" class="form-control  @error('municipality') is-invalid @enderror" id="municipality" name="municipality" value="{{ $user->municipality }}">
                        @error('municipality')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" class="form-control  @error('province') is-invalid @enderror" id="province" name="province" value="{{ $user->province }}">
                        @error('province')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <h4 class="card-title" style="font-size: 18px">Educational Background</h4>
                        <div class="form-group row">
                            <label for="studentNumber" class="col-sm-3 col-form-label">Student Number</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="studentNumber" placeholder="{{ $user->studentNumber }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course" class="col-sm-3 col-form-label">Course</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="course" placeholder="{{ $user->course }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="yearAdmitted" class="col-sm-3 col-form-label">Year Admitted</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="yearAdmitted" placeholder="{{ $user->yearAdmitted }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="semesterAdmitted" class="col-sm-3 col-form-label">Semester Admitted</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="semesterAdmitted" placeholder="{{ $user->semesterAdmitted }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="highschool" class="col-sm-3 col-form-label">High School</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control  @error('highschool') is-invalid @enderror" id="highschool" name="highschool" value="{{ $user->highschool }}">
                                @error('highschool')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    <h4 class="card-title" style="font-size: 18px">Guardian Information</h4>
                    <div class="form-group row">
                        <label for="guardian" class="col-sm-3 col-form-label">Guardian Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('guardian') is-invalid @enderror" id="guardian" name="guardian" value="{{ $user->guardian }}">
                            @error('guardian')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mobilePhone" class="col-sm-3 col-form-label">Guardian Number</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control  @error('mobilePhone') is-invalid @enderror" id="mobilePhone" name="mobilePhone" value="{{ $user->mobilePhone }}">
                            @error('mobilePhone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex text-center" style="margin-top: 50px">
                        <button class="btn btn-success ">{{ __('Save') }}</button>
                        <a href="{{ route('student_informations.index') }}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection