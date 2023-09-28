{{-- <x-app-layout>
    <x-slot name="">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    @if(Auth::user()->role == 'superadmin')
    @php $type = "superadmin.superadmin_master" @endphp
  @elseif(Auth::user()->role === 'admin')
    @php $type = "admin.admin_master" @endphp
  @elseif(Auth::user()->role === 'student')
    @php $type = "student.student_master" @endphp
  @endif
  
  @extends($type)
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @section('content')
  
      <div class="pagetitle">
          <h1>Profile</h1>
          <nav>
              <ol class="breadcrumb">
  
                @if(Auth::user()->role == 'superadmin')
                  @php $dash = "superadmin.dashboard" @endphp
                @elseif(Auth::user()->role === 'admin')
                  @php $dash = "admin.dashboard" @endphp
                @elseif(Auth::user()->role === 'student')
                  @php $dash = "student.dashboard" @endphp
                @endif
                <li class="breadcrumb-item"><a href="{{ route($dash) }}"><i class="bx bx-home"></i>Home</a></li>
                
                <li class="breadcrumb-item active">Profile</li>
              </ol>
          </nav>
      </div>
  
      {{-- <section class="section profile">
          <div class="row">
              <div class="col-xl-4">
              <div class="card">
                  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
  
                  <img src="{{ asset('img/profile.jpeg') }}" alt="Profile" class="rounded-circle">
                  <div style="font-family: var(--font-secondary); font-size: 20px; font-weight: bold; margin-top: 10px">{{ Auth::user()->name }}</div>
                  </div>
              </div>
              </div>
  
              <div class="col-xl-8">
  
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
  
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>
  
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>
  
              <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-delete">Delete Account</button>
                </li>
  
            </ul>
            <div class="tab-content pt-2">
  
              <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
  
                <!-- Profile Edit Form -->
                <form>
  
                  @include('profile.partials.update-profile-information-form')
  
                </form><!-- End Profile Edit Form -->
  
              </div>
  
              <div class="tab-pane fade pt-3" id="profile-delete">
  
                <!-- Delete Form -->
                <form>
  
                  @include('profile.partials.delete-user-form')
  
                </form><!-- End Delete Form -->
  
              </div>
  
              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>
  
                  @include('profile.partials.update-password-form')
  
                </form><!-- End Change Password Form -->
  
              </div>
  
            </div><!-- End Bordered Tabs -->
  
          </div>
        </div>
  
      </div>
          </div>
      </section> --}}
  
      <div class="box">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
              <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                  {{-- @livewire('profile') --}}
                  <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                        @csrf
  
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
  
                        <div class="row mb-3">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
  
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
              <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                  <div class="max-w-xl">
                      @include('profile.partials.update-profile-information-form')
                  </div>
              </div>
  
              <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                  <div class="max-w-xl">
                      @include('profile.partials.update-password-form')
                  </div>
              </div>
  
              <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                  <div class="max-w-xl">
                      @include('profile.partials.delete-user-form')
                  </div>
              </div>
          </div>
      </div>
  
      @endsection
  
  {{-- </x-app-layout> --}}
  