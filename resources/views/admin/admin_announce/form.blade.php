@extends('admin.admin_master')
@section('title','Manage Announcement')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_announces.index') }}" class="abreadlink">Announcement</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">{{ isset($admin_announce) ? 'Edit Announcement' : 'Add Announcement' }}</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }} 
        </div>
     @endif


    <div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="margin-top: 50px; border-radius: 10px">
            <div class="card-body">
              <form class="forms-sample" method="POST" action="{{ isset($admin_announce) ? route('admin_announces.update', $admin_announce->id) : route('admin_announces.store') }}" enctype="multipart/form-data">
                @csrf
                @isset($admin_announce)
                    @method('put')
                    <br>
                    <label for="status">Status</label>
                    @livewire('toggle-status', ['model' => $admin_announce, 'field' => 'isActive'], key($admin_announce->id))
                @endisset
                <br>


                <div class="form-group">
                    <label for="title">Subject:</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $admin_announce->title ?? old('title') }}" placeholder="Input subject...">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Body:</label>
                    <input style="height:80px" type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror" value="{{ $admin_announce->content ?? old('content') }}" placeholder="Type Announcement here...">
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('admin_announces.index')}}" class="btn btn-light">Cancel</a>
              </form>
              <br>
                
            </div>
        </div>
    </div>
</div>

@endsection