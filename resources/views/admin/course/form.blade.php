@extends('admin.admin_master')
@section('title','Manage Courses')

@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
              <li class="breadcrumb-item">Courses</li>
            <li class="breadcrumb-item active" style="font-weight: 700">{{ isset($course) ? 'Edit' : 'Add' }} Courses</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border-radius: 10px; margin-top: 30px">
            <div class="card-body">
                <form method="post" action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- add @method('put') for edit mode --}}
                    @isset($course)
                        @method('put')
                        <div class="form-group">
                            <label for="status">Status:</label>
                            @livewire('toggle-status', ['model' => $course, 'field' => 'isActive'], key($course->id))
                        </div> 
                    @endisset
                    <br>
                    <div class="form-group">
                        <label for="program">Program:</label>
                        @livewire('search-course')
                        @error('program')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="course_name">Course Name:</label>
                        @livewire('search-subject')
                        @error('course_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instructor_name">Instructor Name:</label>
                        <input type="text" name="instructor_name" id="instructor_name" class="form-control @error('instructor_name') is-invalid @enderror" value="{{ $course->instructor_name ?? old('instructor_name') }}" placeholder="Input Instructor Name">
                        @error('instructor_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instructor_email">Instructor Email:</label>
                        <input type="text" name="instructor_email" id="instructor_email" class="form-control @error('instructor_email') is-invalid @enderror" value="{{ $course->instructor_email ?? old('instructor_email') }}" placeholder="Input Instructor Email">
                        @error('instructor_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="section">Section:</label>
                        <input type="text" name="section" id="section" class="form-control @error('section') is-invalid @enderror" value="{{ $course->section ?? old('section') }}" placeholder="Input Section">
                        @error('section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="units">Units:</label>
                        <input type="number" name="units" id="units" class="form-control @error('units') is-invalid @enderror" value="{{ $course->units ?? old('units') }}" placeholder="Input Units">
                        @error('units')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @isset($course)
                        <div class="form-group">
                            <label for="sem">Semester:</label>
                            <input type="text" name="sem" id="sem" class="form-control" value="{{ $course->sem }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="acadyear">Academic Year:</label>
                            <input type="text" name="acadyear" id="acadyear" class="form-control" value="{{ $course->acadyear }}" readonly>
                        </div>
                    @endisset
                    <br>
    
                    <div class="flex text-center" style="padding-top: 10px">
                        <button class="btn btn-success ">{{ __('Save') }}</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
</div>

@endsection