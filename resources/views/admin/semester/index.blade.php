@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Semesters</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Semester</li>
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

    @if(session('notif.success') || session('notif.danger'))
      <div class="row">
    @else
        <div class="row" style="margin-top: 50px">
    @endif
        @livewire('semester-search')
        <div class="col-xl-3 grid-margin-lg-0 grid-margin stretch-card">
          <div class="card"  style="border-radius: 10px">
            <div class="card-body">
                <h4 class="card-title mb-3">Semester {{ isset($semester) ? 'Edit' : 'Add' }}</h4>
                <form method="post" action="{{ isset($semester) ? route('semesters.update', $semester->id) : route('semesters.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- add @method('put') for edit mode --}}
                    @isset($semester)
                        @method('put')
                        @livewire('toggle-status', ['model' => $semester, 'field' => 'isActive'], key($semester->id))
                    @endisset
                    @foreach ($acadyears as $acadyear)
                        @php($academicyear = $acadyear->name)
                    @endforeach
                    <br>
                    <div class="form-group">
                        <label for="academic_year">Academic Year:</label>
                        <input type="text" class="form-control  @error('academic_year') is-invalid @enderror" id="academic_year" name="academic_year" value="{{ $semester->cademic_year ?? $academicyear }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="semester_name">Semester:</label>
                        <input type="text" class="form-control  @error('semester_name') is-invalid @enderror" id="semester_name" name="semester_name" value="{{ $semester->semester_name ?? old('semester_name') }}" placeholder="Input Semester">
                        @error('semester_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ $semester->start_date ?? old('start_date') }}">
                        @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ $semester->end_date ?? old('end_date') }}">
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
