@extends('student.student_master')
@section('title', 'Dashboard')
@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="row">
      <div class="col-sm-12 mb-4 mb-xl-0 text-center">
        <h4 class="font-weight-bold text-dark ">Welcome to CvSU-TC Student Portal</h4>
        <h4 style="color: purple">
            <?php  date_default_timezone_set('Asia/Manila');
              echo "Today is " . date("l, m-d-Y. h:i a");?>
        </h4>
      </div>
    </div>

    <div style="margin-top: 75px;">
      @if (session('success'))
        <div class="alert alert-success fade in alert-dismissible show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
          <i class="icon-circle-check" style="margin-right: 5px"></i>    
          <strong style="font-weight: bolder">{{ session('success') }}</strong> {{ __('You are logged in as Student!!') }}
        </div>
      @endif
    </div>

      @if(session('success'))
        <div class="row">
      @else
        <div class="row" style="margin-top: 100px">
      @endif
    {{-- <div class="row" style="margin-top: 100px"> --}}
            <div class="row flex-grow">
              <div class="col-xxl-4 col-md-9 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px">
                  <div class="card-body">
                      <h4 class="card-title">BASIC INFORMATION</h4>
                      {{-- @foreach ( $users as $user)
                        <p>{{ $user->firstName }}</p>
                      @endforeach
                       --}}
                      {{-- <h4 class="text-dark font-weight-bold mb-2">55,543</h4> --}}
                  </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px">
                  <div class="card-body">
                      <h4 class="card-title">Requested Document</h4>
                      <h6 class="text-dark mb-2">Total</h6>
                      <h6 class="text-dark mb-2">Pending</h6>
                      <h6 class="text-dark mb-2">Processing</h6>
                      <h6 class="text-dark mb-2">Completed</h6>
                  </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <div class="row d-flex">
        <div class="col-xl-12 d-flex grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Announcement</h4>
                  @foreach($admin_announces as $admin_announce)
                  @if ($admin_announce->isActive == 1)
                  <div class="card text-start">
                    <div class="card-header font-weight-bold">
                      Date: {{ $admin_announce->created_at }}
                    </div>
                    <div class="card-body text-center">
                      <h5 class="h4" style="color:Green">{{ $admin_announce->title }}
                      </h5>
                      <p class="lead text-center" style="color: black">{!! Str::limit($admin_announce->content,'250','...') !!}</p>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
        </div>

        {{-- <div class="col-xl-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-3">Recent Activity</h4>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="text-dark">
                      <div class="d-flex pb-3 border-bottom justify-content-between">
                        <div class="mr-3"><i class="mdi mdi-signal-cellular-outline icon-md"></i></div>
                        <div class="font-weight-bold mr-sm-4">
                          <div>Deposit has updated to Paid</div>
                          <div class="text-muted font-weight-normal mt-1">32 Minutes Ago</div>
                        </div>
                        <div><h6 class="font-weight-bold text-info ml-sm-2">$325</h6></div>
                      </div>
                      <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                        <div class="mr-3"><i class="mdi mdi-signal-cellular-outline icon-md"></i></div>
                        <div class="font-weight-bold mr-sm-4">
                          <div>Your Withdrawal Proceeded</div>
                          <div class="text-muted font-weight-normal mt-1">45 Minutes Ago</div>
                        </div>
                        <div><h6 class="font-weight-bold text-info ml-sm-2">$4987</h6></div>
                      </div>
                      <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                        <div class="mr-3"><i class="mdi mdi-signal-cellular-outline icon-md"></i></div>
                        <div class="font-weight-bold mr-sm-4">
                          <div>Deposit has updated to Paid                              </div>
                          <div class="text-muted font-weight-normal mt-1">1 Days Ago</div>
                        </div>
                        <div><h6 class="font-weight-bold text-info ml-sm-2">$5391</h6></div>
                      </div>
                      <div class="d-flex pt-3 justify-content-between">
                        <div class="mr-3"><i class="mdi mdi-signal-cellular-outline icon-md"></i></div>
                        <div class="font-weight-bold mr-sm-4">
                          <div>Deposit has updated to Paid</div>
                          <div class="text-muted font-weight-normal mt-1">3 weeks Ago</div>
                        </div>
                        <div><h6 class="font-weight-bold text-info ml-sm-2">$264</h6></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
