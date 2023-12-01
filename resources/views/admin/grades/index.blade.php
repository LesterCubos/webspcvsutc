@extends('admin.admin_master')
@section('title','List of All Grades')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Grades</li>
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
        @elseif (session('notif.danger'))
          <div class="alert alert-danger fade in alert-dismissible show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
            </button>    
            <i class="bi bi-exclamation-circle-fill" style="margin-right: 5px; font-size: 18px"></i>
            <strong>{{ session('notif.danger') }}</strong>
          </div>
        @endif
    </div>
    @livewire('admin-grades-search')
</div>

@endsection