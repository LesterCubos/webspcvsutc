@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Courses</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card" style="margin-top: 50px; border-radius: 10px">
        <div class="card-body">
            <h4 class="card-title">Courses Table</h4>
            {{-- <p class="card-description">
             Add and Edit<code>Courses</code>
            </p> --}}
            <button type="button" class="btn btn-primary btn-icon-text">
                <i class="mdi mdi-plus-circle btn-icon-prepend"></i>
                Add Course
            </button>
            <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                    Schedule Code
                    </th>
                    <th>
                    Program
                    </th>
                    <th>
                    Course Name
                    </th>
                    <th>
                    Instructor Name
                    </th>
                    <th>
                    Instructor Email
                    </th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>
                                {{ $course->schedcode }}
                            </td>
                            <td>
                                {{ $course->program }}
                            </td>
                            <td>
                                {{ $course->course_name }}
                            </td>
                            <td>
                                {{ $course->instructor_name }}
                            </td>
                            <td>
                                {{ $course->instructor_email }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; font-size: 24px">
                                <div class="py-5" style="">No Data Found...</div>
                            </td>  
                        </tr> 
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection