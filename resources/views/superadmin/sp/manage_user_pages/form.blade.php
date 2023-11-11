@extends('superadmin.sp.sp_superadmin_master')

@section('title','Add New User')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(#ffff, #f4c2fe, #f4c2fe, #f4c2fe );">
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
            <div class="card">
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
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control  @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Input First Name"required>
                  @error('first_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="surname">Last Name</label>
                  <input type="text" class="form-control  @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old('surname') }}" placeholder="Input Surname" required>
                  @error('surname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="middle_name">Middle Name</label>
                  <input type="text" class="form-control  @error('middle_name') is-invalid @enderror" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" placeholder="Input Middle Name" required>
                  @error('middle_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="student_number">Student Number</label>
                  <input type="number" class="form-control  @error('student_number') is-invalid @enderror" id="student_number" name="student_number" value="{{ old('student_number') }}" placeholder="Input Student Number" required>
                  @error('student_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="sex">Sex</label>
                  <select type="text" id="sex" name="sex" class="form-control @error('sex') is-invalid @enderror" value="{{ old('sex') }}" required>
                      <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                      <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                      <option value="Others" {{ old('sex') == 'Others' ? 'selected' : '' }}>Others</option>
                  </select>
                  @error('sex')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="civil_status">Civil Status</label>
                  <select type="text" id="civil_status" name="civil_status" class="form-control @error('civil_status') is-invalid @enderror" value="{{ old('civil_status') }}" required>
                      <option value="Single" {{ old('civil_status') == 'Single' ? 'selected' : '' }}>Single</option>
                      <option value="Married" {{ old('civil_status') == 'Married' ? 'selected' : '' }}>Married</option>
                      <option value="Widow" {{ old('civil_status') == 'Widow' ? 'selected' : '' }}>Widow</option>
                  </select>
                  @error('civil_status')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nationality">Nationality</label>
                  <input type="text" class="form-control  @error('nationality') is-invalid @enderror" id="nationality" name="nationality" value="{{ old('nationality') }}" placeholder="Input Nationality" required>
                  @error('nationality')
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
                  <label for="age">Age</label>
                  <input type="number" class="form-control  @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age') }}" placeholder="Input Age" required>
                  @error('age')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="birthday">Birthday</label>
                  <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}" required>
                  @error('birthday')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="birth_place">Birth Place</label>
                  <input type="text" class="form-control  @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place') }}" placeholder="Input Birth Place" required>
                  @error('birth_place')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="contact_number">Contact Number</label>
                  <input type="number" class="form-control  @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" placeholder="Input Contact Number" required>
                  @error('contact_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" placeholder="Input Adress" required>
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="postal_code">Postal Code</label>
                  <input type="number" class="form-control  @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" placeholder="Input Postal Code" required>
                  @error('postal_code')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="elementary_school">Elemantary School</label>
                  <input type="text" class="form-control  @error('elementary_school') is-invalid @enderror" id="elementary_school" name="elementary_school" value="{{ old('elementary_school') }}" placeholder="Input Elemantary School" required>
                  @error('elementary_school')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="juniorhigh_school">Junior High School</label>
                  <input type="text" class="form-control  @error('juniorhigh_school') is-invalid @enderror" id="juniorhigh_school" name="juniorhigh_school" value="{{ old('juniorhigh_school') }}" placeholder="Input Junior High School" required>
                  @error('juniorhigh_school')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="seniorhigh_school">Senior High School</label>
                  <input type="text" class="form-control  @error('seniorhigh_school') is-invalid @enderror" id="seniorhigh_school" name="seniorhigh_school" value="{{ old('seniorhigh_school') }}" placeholder="Input Senior High School" required>
                  @error('seniorhigh_school')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="program">Program</label>
                  <select type="text" id="program" name="program" class="form-control @error('program') is-invalid @enderror" value="{{ old('program') }}" required>
                      <option value="Bachelor of Science in Business Aadministration major in Business Management" {{ old('program') == 'Bachelor of Science in Business Aadministration major in Business Management' ? 'selected' : '' }}>Bachelor of Science in Business Aadministration major in Business Management</option>
                      <option value="Bachelor of Science in Information Technology" {{ old('program') == 'Bachelor of Science in Information Technology' ? 'selected' : '' }}>Bachelor of Science in Information Technology</option>
                      <option value="Bachelor ofF Elementary Education" {{ old('program') == 'Bachelor ofF Elementary Education' ? 'selected' : '' }}>Bachelor ofF Elementary Education</option>
                      <option value="Bachelor of Secondary Education major in English" {{ old('program') == 'Bachelor of Secondary Education major in English' ? 'selected' : '' }}>Bachelor of Secondary Education major in English</option>
                      <option value="Bachelor of Secondary Education major in Mathematics" {{ old('program') == 'Bachelor of Secondary Education major in Mathematics' ? 'selected' : '' }}>Bachelor of Secondary Education major in Mathematics</option>
                      <option value="Bachelor of Science in Hospitality Management" {{ old('program') == 'Bachelor of Science in Hospitality Management' ? 'selected' : '' }}>Bachelor of Science in Hospitality Management</option>
                      <option value="Bachelor of Science in Tourism Management" {{ old('program') == 'Bachelor of Science in Tourism Management' ? 'selected' : '' }}>Bachelor of Science in Tourism Management</option>
                      <option value="Bachelor of Science in Psychology" {{ old('program') == 'Bachelor of Science in Psychology' ? 'selected' : '' }}>Bachelor of Science in Psychology</option>
                      <option value="None" {{ old('program') == 'None' ? 'selected' : '' }}>None</option>
                  </select>
                  @error('program')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="undergraduate_year">Year</label>
                  <select type="text" id="undergraduate_year" name="undergraduate_year" class="form-control @error('undergraduate_year') is-invalid @enderror" value="{{ old('undergraduate_year') }}" required>
                      <option value="First Year" {{ old('undergraduate_year') == 'First Year' ? 'selected' : '' }}>First Year</option>
                      <option value="Second Year" {{ old('undergraduate_year') == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                      <option value="Third Year" {{ old('undergraduate_year') == 'Third Year' ? 'selected' : '' }}>Third Year</option>
                      <option value="Fourth Year" {{ old('undergraduate_year') == 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
                      <option value="None" {{ old('undergraduate_year') == 'None' ? 'selected' : '' }}>None</option>
                  </select>
                  @error('undergraduate_year')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="student_classification">Student Classification</label>
                  <select type="text" id="student_classification" name="student_classification" class="form-control @error('student_classification') is-invalid @enderror" value="{{ old('student_classification') }}" required>
                      <option value="Continuing" {{ old('student_classification') == 'Continuing' ? 'selected' : '' }}>Continuing</option>
                      <option value="New" {{ old('student_classification') == 'New' ? 'selected' : '' }}>New</option>
                      <option value="Transferee" {{ old('student_classification') == 'Transferee' ? 'selected' : '' }}>Transferee</option>
                      <option value="Shiftee" {{ old('student_classification') == 'Shiftee' ? 'selected' : '' }}>Shiftee</option>
                      <option value="Returnee" {{ old('student_classification') == 'Returnee' ? 'selected' : '' }}>Returnee</option>
                      <option value="Cross Enrollee" {{ old('student_classification') == 'Cross Enrollee' ? 'selected' : '' }}>Cross Enrollee</option>
                      <option value="None" {{ old('student_classification') == 'None' ? 'selected' : '' }}>None</option>
                  </select>
                  @error('student_classification')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="registration_status">Registration Status</label>
                  <select type="text" id="registration_status" name="registration_status" class="form-control @error('registration_status') is-invalid @enderror" value="{{ old('registration_status') }}" required>
                      <option value="Regular" {{ old('registration_status') == 'Regular' ? 'selected' : '' }}>Regular</option>
                      <option value="Irregular" {{ old('registration_status') == 'Irregular' ? 'selected' : '' }}>Irregular</option>
                      <option value="None" {{ old('registration_status') == 'None' ? 'selected' : '' }}>None</option>
                  </select>
                  @error('registration_status')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="guardian_name">Guardian Name</label>
                  <input type="text" class="form-control  @error('guardian_name') is-invalid @enderror" id="guardian_name" name="guardian_name" value="{{ old('guardian_name') }}" placeholder="Input Guardian Name" required>
                  @error('guardian_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="guardian_number">Guardian Number</label>
                  <input type="number" class="form-control  @error('guardian_number') is-invalid @enderror" id="guardian_number" name="guardian_number" value="{{ old('guardian_number') }}" placeholder="Input Guardian Contact Number" required>
                  @error('guardian_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="guardian_occupation">Guardian Occupation</label>
                  <input type="text" class="form-control  @error('guardian_occupation') is-invalid @enderror" id="guardian_occupation" name="guardian_occupation" value="{{ old('guardian_occupation') }}" placeholder="Input Guardian Occupation" required>
                  @error('guardian_occupation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="guardian_address">Guardian Address</label>
                  <input type="text" class="form-control  @error('guardian_address') is-invalid @enderror" id="guardian_address" name="guardian_address" value="{{ old('guardian_address') }}" placeholder="Input Guardian Address" required>
                  @error('guardian_address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                  @error('email')
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
                      <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>student</option>
                  </select>
                  @error('role')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                {{-- <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputConfirmPassword1">Confirm Password</label>
                  <input type="password" class="form-control @error('confirmpassword') is-invalid @enderror"  id="password_confirmation" class="block mt-1 w-full" name="password_confirmation" placeholder="Password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div> --}}
                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('superadmin.sp.manage_user_pages.index')}}" class="btn btn-light">Cancel</a>
              </form>
              <br>
                
            </div>
        </div>
    </div>
</div>
@endsection
