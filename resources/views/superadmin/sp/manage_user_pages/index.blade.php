@extends('superadmin.sp.sp_superadmin_master')


@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(#ffff, #f4c2fe, #f4c2fe, #f4c2fe );">
  <div class="pagetitle">
    {{-- <h1>Dashboard</h1> --}}
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.sp.dashboard') }}" class="abreadlink">
          <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage User</li>
        <li class="breadcrumb-item active" style="font-weight: 700">List of Users</li>
    </ol>
    </nav>
  </div><!-- End Page Title -->
  
  @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }} 
        </div>
  @endif

  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h1 class="display-4">Select Upload CSV file if multiple users needs to be created. Make sure ff the ff format.</h1>
          <a href="" class="btn btn-success btn-rounded btn-fw">Upload CSV file</a>
          <a href="{{ route('superadmin.sp.manage_user_pages.form')}}" class="btn btn-success btn-rounded btn-fw">Add New User</a>
        </div>
      </div>
  </div>

  @livewire('user-search')

</div>
@endsection
