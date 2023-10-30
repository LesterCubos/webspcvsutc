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
    <div class="card" style="margin-top: 50px; border-radius: 10px">
        <div class="card-body">
            <h4 class="card-title">Courses Table</h4>
            {{-- <p class="card-description">
             Add and Edit<code>Courses</code>
            </p> --}}
            <a class="btn btn-primary btn-icon-text" href="{{ route('courses.create') }}">
                <i class="mdi mdi-plus-circle btn-icon-prepend"></i>Add Course
            </a>
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
                    <th>
                    Status
                    </th>
                    <th>
                    Action
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
                            <td>
                                @if($course->isActive == 1)
                                <label class="badge badge-success">Active</label>
                                @elseif($course->isActive == 0)
                                    <label class="badge badge-danger">Inactive</label>
                                @endif
                              </td>
                            <td>
                                <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('courses.edit', $course->id) }}"><i class="icon-open"></i></a>
                                <!-- Button trigger modal -->
                                <button id="icon_delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion">
                                    <i class="icon-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="confirm-user-deletion" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete this Academic Year?') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form method="POST" action="{{ route('courses.destroy', $course->id) }}">
                                        @csrf
                                        @method('delete')
  
                                        <div class="modal-body">
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Once the Academic Year is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this Academic Year.') }}
                                        </p>
                                        <br>
                                        <div class="form-group">
                                            <label for="password">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-color:black">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
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