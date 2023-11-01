@extends('admin.admin_master')
@section('title','List of All Announcements')
@section('content')
<div class="content-wrapper" style="background-image: url('../img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
  <div class="pagetitle">
      <h1>Announcement</h1>
      <nav>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
            <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" style="font-weight: 700">Announcement</li>
      </ol>
      </nav>
  </div><!-- End Page Title -->

  @livewire('admin-announce-search')
</div>
@endsection