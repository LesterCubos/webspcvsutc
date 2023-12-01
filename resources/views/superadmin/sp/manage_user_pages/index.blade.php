@extends('superadmin.sp.sp_superadmin_master')

@section('title','User List')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
  <div class="pagetitle">
    <h1>Manage Users</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.sp.dashboard') }}" class="abreadlink">
          <i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage User</li>
        <li class="breadcrumb-item active" style="font-weight: 700">List of Users</li>
    </ol>
    </nav>
  </div><!-- End Page Title -->
  <div style="margin-top: 50px; margin-bottom: 20px">
      @if(session('notif.success'))
        <div class="alert alert-success fade in alert-dismissible show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="font-size:20px">×</span>
          </button> 
          <i class="bi bi-check-circle-fill" style="margin-right: 5px; font-size: 18px"></i>   
          <strong>{{ session('notif.success') }}</strong>
        </div>
      @endif

      @if(session('notif.danger'))
        <div class="alert alert-danger fade in alert-dismissible show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="font-size:20px">×</span>
          </button>
          <i class="bi bi-exclamation-circle-fill" style="margin-right: 5px; font-size: 18px"></i>   
          <strong>{{ session('notif.danger') }}</strong>
        </div>
      @endif
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    @if(session('notif.success') || session('notif.danger'))
      <div class="card">
    @else
      <div class="card" style="margin-top: 50px">
    @endif
        <div class="card-body">
          <h1 class="display-4">Add and Sync <strong style="color: #ec37fc; font-weight: bold">USERS</strong> needs to be created.</h1>
          <br>

          {{-- <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if (session('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
            @endif

            <div class="row mb-3">
              <div class="col-md-3">
                <input type="file" class="form-control file-upload-info" name="file">
              </div>
            </div>
            <button class="btn btn-info">Import User Data</button>
          </form> --}}

          <br>
          
          <form action="{{ route('sync-data') }}" method="GET">
            @csrf
            <a href="{{ route('superadmin.sp.manage_user_pages.form')}}" class="btn btn-success btn-icon-text"><i class="bi bi-person-plus-fill btn-icon-prepend" style="font-size: 1.225rem;"></i>Add New User</a>
            <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-check-fill" style="font-size: 1.225rem; margin-right: 5px"></i>Sync Data</button>
            <a class="btn btn-warning btn-icon-text" href="{{ route('export') }}"><i class="bi bi-file-earmark-arrow-down-fill btn-icon-prepend" style="font-size: 1.225rem; margin-right: 5px"></i>Export User Data</a>
        </form>
        </div>
      </div>
  </div>

  @livewire('user-search')

</div>

@endsection
