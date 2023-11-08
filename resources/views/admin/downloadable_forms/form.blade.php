@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Downloadable Forms</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
              <li class="breadcrumb-item">Downloadable Forms</li>
            <li class="breadcrumb-item active" style="font-weight: 700">Add File</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="margin-top: 50px; border-radius: 10px">
            <div class="card-body">
              @livewire('file-upload')
            </div>
        </div>
    </div>
    
</div>

@endsection