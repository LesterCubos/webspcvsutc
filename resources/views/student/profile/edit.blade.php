@if(Auth::user()->role == 'superadmin')
  @php $type = "superadmin.superadmin_master" @endphp
@elseif(Auth::user()->role === 'admin')
  @php $type = "admin.admin_master" @endphp
@elseif(Auth::user()->role === 'student')
  @php $type = "student.student_master" @endphp
@endif

@extends($type)
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title','Manage Profile')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(#ffff, #f4c2fe, #f4c2fe, #f4c2fe );">
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
          <li class="breadcrumb-item"><a href="{{ route($dash) }}" class="abreadlink"><i class="bi bi-house-fill" style="margin-right: 5px"></i>Home</a></li>
          
          <li class="breadcrumb-item active" style="font-weight: 700">Profile</li>
        </ol>
    </nav>
  </div>

    <div class="box">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <div class="max-w-xl">
                <div class="card-body">
                  <form method="POST" action="{{ route('student.user.profile.store') }}" enctype="multipart/form-data">
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
                    @include('admin.profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
