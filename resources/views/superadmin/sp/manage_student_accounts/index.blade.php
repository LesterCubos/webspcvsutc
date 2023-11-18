@extends('superadmin.sp.sp_superadmin_master')

@section('title','student List')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
  <div class="pagetitle">
    <h1>Manage Students Account</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.sp.dashboard') }}" class="abreadlink">
          <i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage Student</li>
        <li class="breadcrumb-item active" style="font-weight: 700">List of Students</li>
    </ol>
    </nav>
  </div><!-- End Page Title -->
  <div style="margin-top: 50px; margin-bottom: 20px">
      @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }} 
        </div>
      @endif

      @if(session('notif.danger'))
        <div class="alert alert-danger">
            {{ session('notif.danger') }} 
        </div>
      @endif
  </div>

  @livewire('student-account-search')

</div>

@endsection
