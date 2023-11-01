@extends('admin.admin_master')
@section('title','Manage Announcement')

@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
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
                        <input type="text" class="form-control  @error('program') is-invalid @enderror" id="program" name="program" value="{{ $course->program ?? old('program') }}" placeholder="Input Program Name">
                        @error('program')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="course_name">Course Name:</label>
                        <input type="text" name="course_name" id="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{ $course->course_name ?? old('course_name') }}" placeholder="Input Course Name">
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
                        <label for="year_level">Year Level:</label>
                        <select type="text" id="year_level" name="year_level" class="form-control @error('year_level') is-invalid @enderror" value="{{ old('year_level') }}" required>
                            <option value="First Year" {{ old('year_level') == 'First Year' ? 'selected' : '' }}>First Year</option>
                            <option value="Second Year" {{ old('year_level') == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                            <option value="Third Year" {{ old('year_level') == 'Third Year' ? 'selected' : '' }}>Third Year</option>
                            <option value="Fourth Year" {{ old('year_level') == 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
                        </select>
                        @error('year_level')
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
                    <div class="form-group">
                        <label for="credits">Credits:</label>
                        <input type="number" name="credits" id="credits" class="form-control @error('credits') is-invalid @enderror" value="{{ $course->credits ?? old('credits') }}" placeholder="Input Credits">
                        @error('credits')
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

@endsection