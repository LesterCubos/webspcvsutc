@extends('superadmin.sp.sp_superadmin_master')

@section('title','View User')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.sp.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage User</li>
        <li class="breadcrumb-item active">View User</li>
    </ol>
    </nav>
  </div><!-- End Page name -->

    <div class="row" style="margin-top: 110px">
      @if ($user->role == 'superadmin' || $user->role == 'admin')
        <div class="col-lg-12 grid-margin stretch-card">
      @else
        <div class="col-md-6 grid-margin stretch-card">
      @endif
          <div class="card" style="border-radius: 10px">
            <div class="card-body">
              <h4 class="card-title">Status</h4>
              <p class="card-description">
                Active / Inactive
              </p>
              @livewire('user-status', ['model' => $user, 'field' => 'isActive'], key($user->id))
              <br>
              <h4 class="card-title">Basic Information</h4>
              <p class="card-description">
                {{-- Basic form layout --}}
              </p>
              <form class="forms-sample">
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="{{ $user->firstName }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="middleName">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" placeholder="{{ $user->middleName }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="{{ $user->lastName }}" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" placeholder="{{ $user->email }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="dateOfBirth">Birthday</label>
                    <input type="text" class="form-control" id="dateOfBirth" placeholder="{{ $user->dateOfBirth }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" placeholder="{{ $user->gender }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="status">Civil Status</label>
                    <input type="text" class="form-control" id="status" placeholder="{{ $user->status }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="citizenship">Citizenship</label>
                    <input type="text" class="form-control" id="citizenship" placeholder="{{ $user->citizenship }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="religion">Religion</label>
                    <input type="text" class="form-control" id="religion" placeholder="{{ $user->religion }}" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="mobilePhone">Contact Number</label>
                  <input type="text" class="form-control" id="mobilePhone" placeholder="{{ $user->mobilePhone }}" readonly="readonly">
              </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="@if($user) {{ $user->street }} {{ $user->barangay }} {{ $user->municipality }}, {{ $user->province }}@endif" readonly="readonly">
                </div>
                @if ($user->role == 'superadmin' || $user->role == 'admin')
                <div class="form-group">
                  <label for="role">Role</label>
                  <input type="text" class="form-control" id="address" placeholder="{{ $user->role }}" readonly="readonly">
                </div>
                <a href="{{ route('superadmin.sp.manage_user_pages.index')}}" class="btn btn-dark btn-lg btn-block" style="margin-top: 50px">Back</a>
                @endif
              </form>
            </div>
          </div>
        </div>

        
        @if ($user->role == 'student')
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card" style="border-radius: 10px">
              <div class="card-body">
                <h4 class="card-title">Educational Background</h4>
                <p class="card-description">
                  {{-- Horizontal form layout --}}
                </p>
                <form class="forms-sample">
                  <div class="form-group row">
                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="role" placeholder="{{ $user->role }}" readonly="readonly">
                    </div>
                  </div>
                    <div class="form-group row">
                      <label for="studentNumber" class="col-sm-3 col-form-label">Student Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="studentNumber" placeholder="{{ $user->studentNumber }}" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="course" class="col-sm-3 col-form-label">course</label>
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
                        <input type="text" class="form-control" id="highschool" placeholder="{{ $user->highschool }}" readonly="readonly">
                      </div>
                    </div>
                    <h4 class="card-title">Guardian Information</h4>
                    <div class="form-group row">
                      <label for="guardian" class="col-sm-3 col-form-label">Guardian Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="guardian" placeholder="{{ $user->guardian }}" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="mobilePhone" class="col-sm-3 col-form-label">Guardian Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="mobilePhone" placeholder="{{ $user->mobilePhone }}" readonly="readonly">
                      </div>
                    </div>
                  <a href="{{ route('superadmin.sp.manage_user_pages.index')}}" class="btn btn-dark btn-lg btn-block" style="margin-top: 370px">Back</a>
                </form>
              </div>
            </div>
          </div>
        @endif
    </div>
    
</div>
@endsection
