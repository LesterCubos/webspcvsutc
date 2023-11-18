@extends('superadmin.sp.sp_superadmin_master')

@section('title','Add New User')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.sp.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage User</li>
        <li class="breadcrumb-item active">Add New User</li>
    </ol>
    </nav>
  </div><!-- End Page name -->
  
  @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }} 
        </div>
  @endif

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card" style="margin-top: 50px">
        <div class="card-body">
          <br>
          <h4>{{ isset($user) ? 'Edit User' : 'Add New User' }}</h4>
        </div>
      </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <form class="forms-sample" method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input type="text" class="form-control  @error('firstName') is-invalid @enderror" id="firstName" name="firstName" value="{{ old('firstName') }}" placeholder="Input First Name"required>
                  @error('firstName')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control  @error('lastName') is-invalid @enderror" id="lastName" name="lastName" value="{{ old('lastName') }}" placeholder="Input lastName" required>
                  @error('lastName')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="middleName">Middle Name</label>
                  <input type="text" class="form-control  @error('middleName') is-invalid @enderror" id="middleName" name="middleName" value="{{ old('middleName') }}" placeholder="Input Middle Name" required>
                  @error('middleName')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Input Email Name" required>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="studentNumber">Account Number</label>
                  <input type="number" class="form-control  @error('studentNumber') is-invalid @enderror" id="studentNumber" name="studentNumber" value="{{ old('studentNumber') }}" placeholder="Input Student Number" required>
                  @error('studentNumber')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select type="text" id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}" required>
                      <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                      <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                  </select>
                  @error('gender')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="status">Civil Status</label>
                  <select type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}" required>
                      <option value="Single" {{ old('status') == 'Single' ? 'selected' : '' }}>Single</option>
                      <option value="Married" {{ old('status') == 'Married' ? 'selected' : '' }}>Married</option>
                      <option value="Widow" {{ old('status') == 'Widow' ? 'selected' : '' }}>Widow</option>
                  </select>
                  @error('status')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="citizenship">Citizenship</label>
                  <input type="text" class="form-control  @error('citizenship') is-invalid @enderror" id="citizenship" name="citizenship" value="{{ old('citizenship') }}" placeholder="Input Citizenship" required>
                  @error('citizenship')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="religion">Religion</label>
                  <input type="text" class="form-control  @error('religion') is-invalid @enderror" id="religion" name="religion" value="{{ old('religion') }}" placeholder="Input Religion" required>
                  @error('religion')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="dateOfBirth">Birthday</label>
                  <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control @error('dateOfBirth') is-invalid @enderror" value="{{ old('dateOfBirth') }}" required>
                  @error('dateOfBirth')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="street">Street</label>
                  <input type="text" class="form-control  @error('street') is-invalid @enderror" id="street" name="street" value="{{ old('street') }}" placeholder="Input Street" required>
                  @error('street')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="barangay">Barangay</label>
                  <input type="text" class="form-control  @error('barangay') is-invalid @enderror" id="barangay" name="barangay" value="{{ old('barangay') }}" placeholder="Input Barangay" required>
                  @error('barangay')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="municipality">Municipality</label>
                  <input type="text" class="form-control  @error('municipality') is-invalid @enderror" id="municipality" name="municipality" value="{{ old('municipality') }}" placeholder="Input Municipality" required>
                  @error('municipality')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="province">Province</label>
                  <input type="text" class="form-control  @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province') }}" placeholder="Input Province" required>
                  @error('province')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="mobilePhone">Contact Number</label>
                  <input type="number" class="form-control  @error('mobilePhone') is-invalid @enderror" id="mobilePhone" name="mobilePhone" value="{{ old('mobilePhone') }}" placeholder="Input Contact Number" required>
                  @error('mobilePhone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="role">Role</label>
                  <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" required>
                      <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>superadmin</option>
                      <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                  </select>
                  @error('role')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <a href="{{ route('superadmin.sp.manage_user_pages.index')}}" class="btn btn-light">Cancel</a>
                </div>
              </form>
              <br>
                
            </div>
        </div>
    </div>
</div>
@endsection
