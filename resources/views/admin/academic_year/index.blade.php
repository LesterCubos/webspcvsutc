@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Academic Year</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Academic Year</li>
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

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="margin-top: 50px; border-radius: 10px">
            <div class="card-body">
                <h4 class="card-title" style="font-size: 20px">Academic Year</h4>
                <p class="card-description" style="font-size: 16px">
                    <code>View</code> Academic Year
                </p>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Semester
                      </th>
                      <th>
                        Academic Year
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($legends as $legend)
                      <tr>
                        <td>
                        {{ $legend->semester }}
                        </td>
                        <td>
                          {{ $legend->schoolyear }}
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
                {{-- Pagination --}}
                {{-- <div class="d-flex justify-content-center" style="margin-top: 20px">
                  {!! $legends->links() !!}
                </div> --}}
              </div>
            </div>
        </div>
    </div>

    {{-- @if(session('notif.success') || session('notif.danger'))
      <div class="row">
    @else
        <div class="row" style="margin-top: 50px">
    @endif
        @livewire('academic-year-search')
        <div class="col-xl-3 grid-margin-lg-0 grid-margin stretch-card">
          <div class="card"  style="border-radius: 10px">
            <div class="card-body">
                <h4 class="card-title mb-3">Academic Year {{ isset($academicyear) ? 'Edit' : 'Add' }}</h4>
                <form method="post" action="{{ isset($academicyear) ? route('academic_years.update', $academicyear->id) : route('academic_years.store') }}" enctype="multipart/form-data">
                    @csrf
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
      </div> --}}
    
</div>
@endsection
