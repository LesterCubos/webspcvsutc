@extends('student.student_master')

@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(#ffff, #00922C, #00922C, #00922C );">
    <div class="row">
      <div class="col-sm-12 mb-4 mb-xl-0 text-center">
        <h4 class="font-weight-bold text-dark ">Welcome to CvSU-TC Student Portal</h4>
        {{-- <p class="font-weight-normal mb-2 text-muted">Student Portal</p> --}}

            {{-- @if (session('status'))
                <p class="alert alert-success" role="alert">
                    {{ session('status') }}
                </p>
            @endif
            {{ __('You are logged in as Super Admin!') }} --}}


        <h4 style="color: purple">
            <?php  date_default_timezone_set('Asia/Manila');
              echo "Today is " . date("l, m-d-Y. h:i a");?>
        </h4>
      </div>
    </div>

    <div class="row">

        <div class="row flex-grow">
            <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px">
                  <div class="card-body">
                      <h4 class="card-title">Total Users</h4>
                      <p>23% increase in conversion</p>
                      <h4 class="text-dark font-weight-bold mb-2">43,981</h4>
                  </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px">
                  <div class="card-body">
                      <h4 class="card-title">Total Student</h4>
                      <p>6% decrease in earnings</p>
                      <h4 class="text-dark font-weight-bold mb-2">55,543</h4>
                  </div>
                </div>
           </div>

           <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
            <div class="card" style="border-radius: 15px">
              <div class="card-body">
                  <h4 class="card-title">Total Instructor</h4>
                  <p>23% increase in conversion</p>
                  <h4 class="text-dark font-weight-bold mb-2">43,981</h4>
              </div>
            </div>
           </div>

           <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
            <div class="card" style="border-radius: 15px">
              <div class="card-body">
                  <h4 class="card-title">Total Admin</h4>
                  <p>23% increase in conversion</p>
                  <h4 class="text-dark font-weight-bold mb-2">43,981</h4>
              </div>
            </div>
           </div>

        </div>
    </div>
    <br>
    <div class="row d-flex">
        <div class="col-xl-8 d-flex grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Website Audience Metrics</h4>
                  <div class="row">
                    <div class="col-lg-5">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit amet cumque cupiditate</p>
                    </div>
                    <div class="col-lg-7">
                      <div class="chart-legends d-lg-block d-none" id="chart-legends"></div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12">
                          <canvas id="web-audience-metrics-satacked" class="mt-3"></canvas>
                      </div>
                  </div>

                </div>
              </div>
        </div>

        <div class="col-xl-4 grid-margin stretch-card">
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
          </div>
    </div>
</div>
@endsection
