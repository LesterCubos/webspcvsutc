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
                <div class="form-group">
                    <label for="poster">Image</label>
                    <input type="file" id="poster" name="poster" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                </div>
                <br>
                <div class="shrink-0 my-2">
                    <img style="width:600px" id="poster_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($admin_announce) ? Storage::url($admin_announce->poster) : '' }}" alt="poster preview" />
                </div>
                {{-- <div class="form-group">
                    <label for="poster" class="form-label">Image</label>
                    <br>
                    <input type="file" id="poster" name="poster" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="poster_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($admin_announce) ? Storage::url($admin_announce->poster) : '' }}" alt="poster preview" />
                    </div>
                </div> --}}
                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('admin_announces.index')}}" class="btn btn-light">Cancel</a>
              </form>
              <br>
                
            </div>
        </div>
    </div>
</div>

<script>
    // create onchange event listener for featured_poster input
    document.getElementById('poster').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an poster, create a preview in featured_poster_preview
            document.getElementById('poster_preview').src = URL.createObjectURL(file)
        }
    }
</script>

@endsection