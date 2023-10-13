@extends('superadmin.sp.sp_superadmin_master')

@section('title','Add New User')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(#ffff, #f4c2fe, #f4c2fe, #f4c2fe );">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.sp.dashboard') }}" class="abreadlink"><i class="fa fa-home"></i> Dashboard</a></li>
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
                  <input type="text" class="form-control  @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Input First Name">
                  @error('first_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="surname">Last Name</label>
                  <input type="text" class="form-control  @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old('surname') }}" placeholder="Input Surname">
                  @error('surname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="middle_name">Middle Name</label>
                  <input type="text" class="form-control  @error('middle_name') is-invalid @enderror" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" placeholder="Input Middle Name">
                  @error('middle_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="student_number">Student Number</label>
                  <input type="number" class="form-control  @error('student_number') is-invalid @enderror" id="student_number" name="student_number" value="{{ old('student_number') }}" placeholder="Input Student Number">
                  @error('student_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="contact_number">Contact Number</label>
                  <input type="number" class="form-control  @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" placeholder="Input Contact Number">
                  @error('contact_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" placeholder="Input Adress">
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="guardian_name">Guardian Name</label>
                  <input type="text" class="form-control  @error('guardian_name') is-invalid @enderror" id="guardian_name" name="guardian_name" value="{{ old('guardian_name') }}" placeholder="Input Guardian Name">
                  @error('guardian_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="guardian_number">Guardian Number</label>
                  <input type="number" class="form-control  @error('guardian_number') is-invalid @enderror" id="guardian_number" name="guardian_number" value="{{ old('guardian_number') }}" placeholder="Input Guardian Contact Number">
                  @error('guardian_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="guardian_address">Guardian Address</label>
                  <input type="text" class="form-control  @error('guardian_address') is-invalid @enderror" id="guardian_address" name="guardian_address" value="{{ old('guardian_address') }}" placeholder="Input Guardian Address">
                  @error('guardian_address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                {{-- <div class="form-group">
                  <label for="status">Status</label>
                  
                  <select id="status" name="status" class="form-control">
                    @foreach ($users as $user)
                    @if($user->id === 'active'){
                      
                    }
                        
                    @else
                        
                    @endif
                    <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    @endforeach
                  </select> 
                </div>   --}}
                

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
                
                <div class="form-group">
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
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('superadmin.sp.manage_user_pages.index')}}" class="btn btn-light">Cancel</a>
              </form>
              <br>
                
            </div>
        </div>
    </div>
</div>
@endsection
