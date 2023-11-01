@extends('admin.admin_master')
@section('title','Manage Announcement')
@section('content')
<div class="content-wrapper" style="background-image: url('../img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_announces.index') }}" class="abreadlink">Announcement</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Manage Announcement</li>
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
                <br>
                <h4>{{ isset($admin_announce) ? 'Edit Announcement' : 'Add Announcement' }}</h4>
        </div>
    </div>
    </div>

    <div class="card" style="margin-top: 50px; border-radius: 10px">
        <div class="card">
            <div class="card-body">
              <form class="forms-sample" method="POST" action="{{ isset($admin_announce) ? route('admin_announces.update', $admin_announce->id) : route('admin_announces.store') }}" enctype="multipart/form-data">
                @csrf
                @isset($admin_announce)
                    @method('put')
                    <br>
                    <label for="switch">Status</label>
                    @livewire('switch-status', ['model' => $admin_announce, 'field' => 'isActive'], key($admin_announce->id))
                @endisset
                <br>


                <div class="form-group">
                  <label for="title">Subject</label>
                  <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Insert title here..">
                  @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="content">Content</label> 
                  <input type="text" class="form-control tinymce-editor @error('content') is-invalid @enderror" id="content" name="content" value="{{ old('content') }}" placeholder="Input content">
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