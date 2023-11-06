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
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
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
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control  @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $user->first_name }}">
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control  @error('middle_name') is-invalid @enderror" id="middle_name" name="middle_name" value="{{ $user->middle_name }}">
                        @error('middle_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control  @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ $user->surname }}">
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control  @error('age') is-invalid @enderror" id="age" name="age" value="{{ $user->age }}">
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ $user->birthday }}">
                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birth_place">Place of Birth</label>
                        <input type="text" class="form-control  @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" value="{{ $user->birth_place }}">
                        @error('birth_place')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <select type="text" id="sex" name="sex" class="form-control @error('sex') is-invalid @enderror" value="{{ $user->sex }}">
                            <option value="Male" {{ $user->sex == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $user->sex == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Others" {{ $user->sex == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                        @error('sex')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="civil_status">Civil Status</label>
                        <select type="text" id="civil_status" name="civil_status" class="form-control @error('civil_status') is-invalid @enderror" value="{{ $user->civil_status }}">
                            <option value="Single" {{ $user->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="Married" {{ $user->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                            <option value="Widow" {{ $user->civil_status == 'Widow' ? 'selected' : '' }}>Widow</option>
                        </select>
                        @error('civil_status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control  @error('nationality') is-invalid @enderror" id="nationality" name="nationality" value="{{ $user->nationality }}">
                        @error('nationality')
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
                        <label for="contact_number">Contact No.</label>
                        <input type="number" class="form-control  @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" value="{{ $user->contact_number }}">
                        @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address" value="{{ $user->address }}">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="number" class="form-control  @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ $user->postal_code }}">
                        @error('postal_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <h4 class="card-title" style="font-size: 18px">Educational Background</h4>
                    <div class="form-group row">
                        <label for="student_number" class="col-sm-3 col-form-label">Student Number</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control  @error('student_number') is-invalid @enderror" id="student_number" name="student_number" value="{{ $user->student_number }}">
                            @error('student_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="program" class="col-sm-3 col-form-label">Program</label>
                        <div class="col-sm-9">
                            <select type="text" id="program" name="program" class="form-control @error('program') is-invalid @enderror" value="{{ $user->program }}">
                                <option value="Bachelor of Science in Business Aadministration major in Business Management" {{ $user->program == 'Bachelor of Science in Business Aadministration major in Business Management' ? 'selected' : '' }}>Bachelor of Science in Business Aadministration major in Business Management</option>
                                <option value="Bachelor of Science in Information Technology" {{ $user->program == 'Bachelor of Science in Information Technology' ? 'selected' : '' }}>Bachelor of Science in Information Technology</option>
                                <option value="Bachelor ofF Elementary Education" {{ $user->program == 'Bachelor ofF Elementary Education' ? 'selected' : '' }}>Bachelor ofF Elementary Education</option>
                                <option value="Bachelor of Secondary Education major in English" {{ $user->program == 'Bachelor of Secondary Education major in English' ? 'selected' : '' }}>Bachelor of Secondary Education major in English</option>
                                <option value="Bachelor of Secondary Education major in Mathematics" {{ $user->program == 'Bachelor of Secondary Education major in Mathematics' ? 'selected' : '' }}>Bachelor of Secondary Education major in Mathematics</option>
                                <option value="Bachelor of Science in Hospitality Management" {{ $user->program == 'Bachelor of Science in Hospitality Management' ? 'selected' : '' }}>Bachelor of Science in Hospitality Management</option>
                                <option value="Bachelor of Science in Tourism Management" {{ $user->program == 'Bachelor of Science in Tourism Management' ? 'selected' : '' }}>Bachelor of Science in Tourism Management</option>
                                <option value="Bachelor of Science in Psychology" {{ $user->program == 'Bachelor of Science in Psychology' ? 'selected' : '' }}>Bachelor of Science in Psychology</option>
                            </select>
                            @error('program')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="undergraduate_year" class="col-sm-3 col-form-label">Year</label>
                        <div class="col-sm-9">
                            <select type="text" id="undergraduate_year" name="undergraduate_year" class="form-control @error('undergraduate_year') is-invalid @enderror" value="{{ $user->undergraduate_year }}">
                            <option value="First Year" {{ $user->undergraduate_year == 'First Year' ? 'selected' : '' }}>First Year</option>
                            <option value="Second Year" {{ $user->undergraduate_year == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                            <option value="Third Year" {{ $user->undergraduate_year == 'Third Year' ? 'selected' : '' }}>Third Year</option>
                            <option value="Fourth Year" {{ $user->undergraduate_year == 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
                            </select>
                            @error('undergraduate_year')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_classification" class="col-sm-3 col-form-label">Student Classification</label>
                        <div class="col-sm-9">
                            <select type="text" id="student_classification" name="student_classification" class="form-control @error('student_classification') is-invalid @enderror" value="{{ $user->student_classification }}">
                            <option value="Continuing" {{ $user->student_classification == 'Continuing' ? 'selected' : '' }}>Continuing</option>
                            <option value="New" {{ $user->student_classification == 'New' ? 'selected' : '' }}>New</option>
                            <option value="Transferee" {{ $user->student_classification == 'Transferee' ? 'selected' : '' }}>Transferee</option>
                            <option value="Shiftee" {{ $user->student_classification == 'Shiftee' ? 'selected' : '' }}>Shiftee</option>
                            <option value="Returnee" {{ $user->student_classification == 'Returnee' ? 'selected' : '' }}>Returnee</option>
                            <option value="Cross Enrollee" {{ $user->student_classification == 'Cross Enrollee' ? 'selected' : '' }}>Cross Enrollee</option>
                            <option value="None" {{ $user->student_classification == 'None' ? 'selected' : '' }}>None</option>
                            </select>
                            @error('student_classification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="registration_status" class="col-sm-3 col-form-label">Registration Status</label>
                        <div class="col-sm-9">
                            <select type="text" cid="registration_status" name="registration_status" class="form-control @error('registration_status') is-invalid @enderror" value="{{ $user->registration_status }}">
                                <option value="Regular" {{ $user->registration_status == 'Regular' ? 'selected' : '' }}>Regular</option>
                                <option value="Irregular" {{ $user->registration_status == 'Irregular' ? 'selected' : '' }}>Irregular</option>
                                <option value="None" {{ $user->registration_status == 'None' ? 'selected' : '' }}>None</option>
                            </select>
                            @error('registration_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="elementary_school" class="col-sm-3 col-form-label">Elememtary School</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('elementary_school') is-invalid @enderror" id="elementary_school" name="elementary_school" value="{{ $user->elementary_school }}">
                            @error('elementary_school')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="juniorhigh_school" class="col-sm-3 col-form-label">Junior High School</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('juniorhigh_school') is-invalid @enderror" id="juniorhigh_school" name="juniorhigh_school" value="{{ $user->juniorhigh_school }}">
                            @error('juniorhigh_school')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="seniorhigh_school" class="col-sm-3 col-form-label">Senior High School</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('seniorhigh_school') is-invalid @enderror" id="seniorhigh_school" name="seniorhigh_school" value="{{ $user->seniorhigh_school }}">
                            @error('seniorhigh_school')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <h4 class="card-title" style="font-size: 18px">Guardian Information</h4>
                    <div class="form-group row">
                        <label for="guardian_name" class="col-sm-3 col-form-label">Guardian Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('guardian_name') is-invalid @enderror" id="guardian_name" name="guardian_name" value="{{ $user->guardian_name }}">
                            @error('guardian_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="guardian_number" class="col-sm-3 col-form-label">Guardian Number</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control  @error('guardian_number') is-invalid @enderror" id="guardian_number" name="guardian_number" value="{{ $user->guardian_number }}">
                            @error('guardian_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="guardian_occupation" class="col-sm-3 col-form-label">Guardian Occupation</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('guardian_occupation') is-invalid @enderror" id="guardian_occupation" name="guardian_occupation" value="{{ $user->guardian_occupation }}">
                            @error('guardian_occupation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="guardian_address" class="col-sm-3 col-form-label">Guardian Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('guardian_address') is-invalid @enderror" id="guardian_address" name="guardian_address" value="{{ $user->address }}">
                            @error('guardian_address')
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