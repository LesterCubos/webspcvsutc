@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Grades</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div style="margin-top: 50px; margin-bottom: 20px">
        @if(session('notif.success'))
            <div class="alert alert-success">
                {{ session('notif.success') }}
            </div>
        @elseif (session('notif.danger'))
            <div class="alert alert-danger">
                {{ session('notif.danger') }}
            </div>
        @endif
    </div>
    @livewire('admin-grades-search')
</div>

@endsection