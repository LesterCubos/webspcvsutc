@extends('admin.admin_master')
@section('title', 'Dashboard')
@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="row">
      <div class="col-sm-12 mb-4 mb-xl-0 text-center" style="margin-top: 40px">
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

    <div class="row" style="margin-top: 60px">

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
                  <h4 class="card-title">Latest Announcement Post</h4>
                  <div class="row">
                      <div class="col-sm-12">
                          {{-- dito ilalagay announcment --}}
                          @php ($a = 0)
                          @foreach($admin_announces as $admin_announce)
                            <div class="activity-item d-flex">
                              @if ($admin_announce->created_at->format('m') == $month)
                                @php ($a++)
                                <div class="activite-label">
                                  @if ($announcediff[$admin_announce->id][0] < 60)
                                    {{ $announcediff[$admin_announce->id][0] }} sec ago
                                  @elseif ($announcediff[$admin_announce->id][1] < 60)   
                                    {{ $announcediff[$admin_announce->id][1] }} min ago
                                  @elseif ($announcediff[$admin_announce->id][2] < 24)   
                                    {{ $announcediff[$admin_announce->id][2] }} hr ago
                                  @elseif ($announcediff[$admin_announce->id][3] <= 31)   
                                    {{ $announcediff[$admin_announce->id][3] }} day ago
                                  @endif
                                </div>
                                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                {{-- <div class="activity-content">
                                  {{ $admin_announce->title }}
                                  <p>{!! Str::limit($admin_announce->content,'250','...') !!}</p>
                                </div> --}}
                                <div class="card text-center">
                                  <div class="card-header">
                                    {{ $admin_announce->created_at }}
                                  </div>
                                  <div class="card-body">
                                    <h5 class="card-title">{{ $admin_announce->title }}
                                    </h5>
                                    <p class="card-text">{{ $admin_announce->content }}</p>
                                  </div>
                                </div>

                              @endif
                            </div><!-- End activity item-->
                          @endforeach
                          @if (empty($a))
                            <div class="activity-content">
                              No New Data
                            </div>    
                          @endif
                          {{-- real --}}
                          {{-- @foreach ($admin_announces as $admin_announce)
                          <div class="card text-center">
                            <div class="card-header">
                              {{ $admin_announce->created_at }}
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">{{ $admin_announce->title }}
                              </h5>
                              <p class="card-text">{{ $admin_announce->content }}</p>
                            </div>
                          </div>
                          @endforeach --}}
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
