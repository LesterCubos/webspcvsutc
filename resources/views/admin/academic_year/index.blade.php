@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Academic Year</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Academic Year</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div style="margin-top: 50px">
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

    <div class="row" style="margin-top: 50px">
        @livewire('academic-year-search')
        <div class="col-xl-3 grid-margin-lg-0 grid-margin stretch-card">
          <div class="card"  style="border-radius: 10px">
            <div class="card-body">
                <h4 class="card-title mb-3">Academic Year {{ isset($academicyear) ? 'Edit' : 'Add' }}</h4>
                <form method="post" action="{{ isset($academicyear) ? route('academic_years.update', $academicyear->id) : route('academic_years.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- add @method('put') for edit mode --}}
                    @isset($academicyear)
                        @method('put')
                        @livewire('toggle-status', ['model' => $academicyear, 'field' => 'isActive'], key($academicyear->id))
                    @endisset
                    <br>
                    <div class="form-group">
                        <label for="name">Academic Name:</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $academicyear->name ?? old('name') }}" placeholder="Input Academic Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ $academicyear->start_date ?? old('start_date') }}">
                        @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ $academicyear->end_date ?? old('end_date') }}">
                        @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
    
                    <div class="flex text-center" style="padding-top: 10px">
                        <button class="btn btn-success ">{{ __('Save') }}</button>
                    </div>
                </form>

            </div>
          </div>
        </div>
      </div>
    
</div>
@endsection
