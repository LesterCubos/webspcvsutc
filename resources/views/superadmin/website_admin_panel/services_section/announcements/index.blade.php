@extends('superadmin.superadmin_master')
@section('title','Announcement Section')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">Announcement Section</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Announcement Section</h2>
            <a href="{{ route('announcements.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>

    @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }}
        </div>
    @endif
    
    @livewire('announcement-search')

@endsection


