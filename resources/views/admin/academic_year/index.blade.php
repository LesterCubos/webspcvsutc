@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(#ffff, #f4c2fe, #f4c2fe, #f4c2fe );">
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
    <div class="row">
        <div class="col-xl-9 grid-margin-lg-0 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Academic Years</h4>
                <div class="table-responsive mt-3">
                  <table class="table table-header-bg">
                    <thead>
                      <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Start Year
                        </th>
                        <th>
                            End Year
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
                        @forelse ($academic_years as $academic_year)
                            <tr>
                                <td>
                                    <span class="mdi mdi-calendar-clock" style="margin-right: 5px; font-size: 18px; color: purple"></span>{{ $academic_year->name }}  
                                </td>
                                <td>
                                    {{ $academic_year->start_date }} 
                                </td>
                                <td>
                                    {{ $academic_year->end_date }} 
                                </td>
                                <td>
                                    {{ $academic_year->isActive }} 
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('academic_years.edit', $academic_year->id) }}"><i class="icon-open"></i></a>
                                    <!-- Button trigger modal -->
                                    <button id="icon_delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion">
                                        <i class="icon-trash"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form method="POST" action="">
                                            @csrf
                                            @method('delete')

                                            <div class="modal-body">
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                            </p>
                                            <br>
                                            <div class="form-group">
                                                <label for="password">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center; font-size: 24px">
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
        <div class="col-xl-3 grid-margin-lg-0 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Academic Year {{ isset($academicyear) ? 'Edit' : 'Add' }}</h4>
                <form method="post" action="{{ isset($academicyear) ? route('academic_years.update', $academic_year->id) : route('academic_years.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- add @method('put') for edit mode --}}
                    @isset($academicyear)
                        @method('put')
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
