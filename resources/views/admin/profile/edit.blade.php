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

<div class="content-wrapper" style="background-image: linear-gradient(#ffff, #f4c2fe, #f4c2fe, #f4c2fe );">
    <div class="pagetitle">
        <h1>Profile</h1>
        <!-- Breadcrumb -->
        <nav class="flex" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-3">
            @if(Auth::user()->role == 'superadmin')
              @php $dash = "superadmin.dashboard" @endphp
            @elseif(Auth::user()->role === 'admin')
              @php $dash = "admin.dashboard" @endphp
            @elseif(Auth::user()->role === 'student')
              @php $dash = "student.dashboard" @endphp
            @endif
            <li class="inline-flex items-center">
              <a href="{{ route($dash) }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Dashboard
              </a>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="#" class="ml-1 text-sm font-bold text-purple-900 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Profile</a>
              </div>
            </li>
          </ol>
        </nav>
    </div>

    <div class="box">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <div class="max-w-xl">
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
                <div class="max-w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection

{{-- </x-app-layout> --}}
