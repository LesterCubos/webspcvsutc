@extends('admin.admin_master')
@section('title','List of All Announcements')
@section('content')
<div class="content-wrapper" style="background-image: linear-gradient(#ffff, #f4c2fe, #f4c2fe, #f4c2fe );">
    <div class="pagetitle">
      <h1>Manage Users</h1>
      <nav>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
            <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
          <li class="breadcrumb-item">Manage Announce</li>
          <li class="breadcrumb-item active" style="font-weight: 700">List of All Announcements</li>
      </ol>
      </nav>
    </div><!-- End Page Title -->
    
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
  
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 class="display-4">Announcement</h1>
            <br>
            <br>
            <a href="{{ route('admin_announces.create')}}" class="btn btn-success btn-rounded btn-fw">Add New Announcement</a>
          </div>
        </div>
    </div>
  
  
</div>
@endsection