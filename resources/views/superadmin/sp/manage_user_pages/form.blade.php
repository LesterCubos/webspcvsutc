@extends('superadmin.sp.sp_superadmin_master')


@section('content')

<div class="email-wrapper" style="background-image: linear-gradient(#ffff, #00922C, #00922C, #00922C );">
  <div class="pagename">
    {{-- <h1>Dashboard</h1> --}}
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.sp.dashboard') }}" class="abreadlink"><i class="fa fa-home"></i> Home</a></li>
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

  {{-- <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          
        </div>
      </div>
  </div> --}}

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
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf
            
                    <!-- Name -->
                    {{-- <div>
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div> --}}
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                              <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-account-outline text-primary"></i>
                              </span>
                            </div>
                            <input type="name" class="form-control form-control-lg border-left-0  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Input full Name" required autocomplete="name" autofocus>
  
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                              <i class="mdi mdi-email-outline text-primary"></i>
                            </span>
                          </div>
                          <input type="email" class="form-control form-control-lg border-left-0  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required autocomplete="email" autofocus>

                          @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <div class="input-group">
                          <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                              <i class="mdi mdi-lock-outline text-primary"></i>
                            </span>
                          </div>
                          <input style="width: 10px" id="myInput" type="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" name="password" placeholder="Input Password" required autocomplete="new-password">

                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                    </div> --}}
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword">Confirm Password</label>
                        <div class="input-group">
                          <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                              <i class="mdi mdi-lock-outline text-primary"></i>
                            </span>
                          </div>
                          <input style="width: 10px" id="myInput" type="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" name="password" placeholder="Input Password" required autocomplete="current-password">

                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                    </div> --}}
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    
                    
                    <div class="flex text-center" style="padding-top: 10px">
                        <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Register') }}</button>
                        
                        <a href="{{ route('superadmin.sp.manage_user_pages.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                     
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
