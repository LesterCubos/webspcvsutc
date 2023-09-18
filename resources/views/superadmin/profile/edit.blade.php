{{-- <x-app-layout>
    <x-slot name="">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    @extends('superadmin.superadmin_master')
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @section('content')

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i>Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{ asset('img/profile.jpeg') }}" alt="Profile" class="rounded-circle">
                <div style="font-family: var(--font-secondary); font-size: 20px; font-weight: bold; margin-top: 10px">{{ Auth::guard('superadmin')->user()->name }}</div>
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

                @include('superadmin.profile.partials.update-profile-information-form')

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
    </section>

    {{-- <div class="box">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
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
    </div> --}}

    @endsection

{{-- </x-app-layout> --}}
