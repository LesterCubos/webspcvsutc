@extends('admin.admin_master')
@section('title', 'Dashboard')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="row">
      <div class="col-sm-12 mb-4 mb-xl-0 text-center" style="margin-top: 40px">
        <h4 class="font-weight-bold text-dark ">Welcome to CvSU-TC Student Portal</h4>
        <h4 style="color: purple">
            <?php  date_default_timezone_set('Asia/Manila');
              echo "Today is " . date("l, m-d-Y. h:i a");?>
        </h4>
      </div>
    </div>

    <div style="margin-top: 50px; margin-bottom: 20px">
      @if (session('success'))
        <div class="alert alert-success fade in alert-dismissible show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px;">x</span>
          </button>
          <i class="bi bi-check-circle-fill" style="margin-right: 5px; font-size: 18px"></i>    
          <strong style="font-weight: bolder">{{ session('success') }}</strong> {{ __('You are logged in as Admin!!') }}
        </div>
      @endif
    </div>

    @if(session('success'))
      <div class="row">
    @else
      <div class="row" style="margin-top: 60px">
    @endif
        <div class="row flex-grow">
            <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px">
                  <div class="card-body">
                      <h4 class="card-title">Total Students</h4>
                      <h4 class="text-dark font-weight-bold mb-2" style="font-size: 16px">{{$studentusers}}</h4>
                  </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px">
                  <div class="card-body">
                      <h4 class="card-title">Total Student Information Request</h4>
                      <h4 class="text-dark font-weight-bold mb-2" style="font-size: 16px">Total : {{$totalStuChanReq}}</h4>
                      <h4 class="text-dark font-weight-bold mb-2" style="font-size: 16px">Pending - {{$pendingStuChanReq}}</h4>
                      <h4 class="text-dark font-weight-bold mb-2" style="font-size: 16px">Completed - {{$completedStuChanReq}}</h4>
                  </div>
                </div>
           </div>

           <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
            <div class="card" style="border-radius: 15px">
              <div class="card-body">
                  <h4 class="card-title">Total Requested Document</h4>
                  <h4 class="text-dark font-weight-bold mb-2" style="font-size: 16px">Total: {{$totalRequestDoc}}</h4>
                  <h4 class="text-dark font-weight-bold mb-2" style="font-size: 16px">Pending - {{$pendingReqDoc}}</h4>
                  <h4 class="text-dark font-weight-bold mb-2" style="font-size: 16px">Processing - {{$processingReqDoc}}</h4>
                  <h4 class="text-dark font-weight-bold mb-2" style="font-size: 16px">Completed - {{$completedReqDoc}}</h4>
              </div>
            </div>
           </div>

           <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
            <div class="card" style="border-radius: 15px">
              <div class="card-body">
                  <h4 class="card-title">Total Announcement</h4>
                  <h4 class="text-dark font-weight-bold mb-2" style="font-size: 16px">{{$totalAnnounce}}</h4>
              </div>
            </div>
           </div>

        </div>
    </div>
    <br>
    <div class="row d-flex">
        <div class="col-lg-12 d-flex grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Latest Announcement Post</h4>
                  <br>
                  <div class="row">
                      
                      <div class="col-sm-12">
                          @php ($a = 0)
                          @foreach($admin_announces as $admin_announce)
                            
                              @if ($admin_announce->created_at->format('m') == $month)
                                @php ($a++)
                                <div class="card text-start font-weight-bold text-primary h5 border-0">
                                  @if ($announcediff[$admin_announce->id][0] < 60)
                                    {{ $announcediff[$admin_announce->id][0] }} sec ago
                                  @elseif ($announcediff[$admin_announce->id][1] < 60)   
                                    {{ $announcediff[$admin_announce->id][1] }} min ago
                                  @elseif ($announcediff[$admin_announce->id][2] < 24)   
                                    {{ $announcediff[$admin_announce->id][2] }} hr ago
                                  @elseif ($announcediff[$admin_announce->id][3] <= 31)   
                                    {{ $announcediff[$admin_announce->id][3] }} day/s ago
                                  @endif
                                </div>
                                <div class="card text-center">
                                  <div class="card-header font-weight-bold">
                                    {{ $admin_announce->created_at }}
                                  </div>
                                  <div class="card-body">
                                    <h5 class="h4" style="color: green">{{ $admin_announce->title }}
                                    </h5>
                                    <p class="lead" style="color: black">{!! Str::limit($admin_announce->content,'250','...') !!}</p>
                                  </div>
                                </div>
                                <br>
                              @endif
                          @endforeach
                          @if (empty($a))
                            <div class="activity-content">
                              No New Data
                            </div>    
                          @endif
                      </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
