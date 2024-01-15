@extends('superadmin.sp.sp_superadmin_master')
@section('title','Dashboard')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="row">
      <div class="col-sm-12 mb-4 mb-xl-0 text-center" style="margin-top: 40px">
        <h4 class="font-weight-bold text-dark ">Welcome to CvSU-TC Student Portal</h4>
            @if (session('status'))
                <p class="alert alert-success" role="alert">
                    {{ session('status') }}
                </p>
            @endif
            {{ __('You are logged in as Super Admin!') }}


        <h4 style="color: purple">
            <?php  date_default_timezone_set('Asia/Manila');
              echo "Today is " . date("l, m-d-Y. h:i a");?>
        </h4>
      </div>
    </div>

    <div class="row" style="margin-top: 60px">

        <div class="row flex-grow">
            <div class="col-xxl-3 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px">
                  <div class="card-body">
                      <h4 class="card-title">Total Users</h4>
                      <h4 class="text-dark font-weight-bold mb-2">{{$totalusers}}</h4>
                  </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px">
                  <div class="card-body">
                      <h4 class="card-title">Total Student Users</h4>
                      <h4 class="text-dark font-weight-bold mb-2">{{$studentusers}}</h4>
                  </div>
                </div>
           </div>

           <div class="col-xxl-3 col-md-3 grid-margin stretch-card">
            <div class="card" style="border-radius: 15px">
              <div class="card-body">
                  <h4 class="card-title">Total Admin User</h4>
                  <h4 class="text-dark font-weight-bold mb-2">{{$adminusers}}</h4>
              </div>
            </div>
           </div>

           <div class="col-xxl-3 col-md-3 grid-margin stretch-card">
            <div class="card" style="border-radius: 15px">
              <div class="card-body">
                  <h4 class="card-title">Total SuperAdmin Users</h4>
                  <h4 class="text-dark font-weight-bold mb-2">{{$superadminusers}}</h4>
              </div>
            </div>
           </div>

        </div>
    </div>
    <br>
    <div class="row d-flex">

        <div class="col-xl-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-3">Recent Activity</h4>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="text-dark">
                      @if($recacts->count() > 0)
                      @foreach ($recacts as $recact)
                          @if ($recact->actname == 'Sync User')
                            <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                              <div class="mr-3"><i class="ri-user-received-fill icon-md" style="color: #37b246"></i></div>
                              <div class="font-weight-bold mr-sm-4">
                                <div>{{ $recact->actname }}</div>
                                @if (time() - strtotime($recact->created_at) < 60)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) }} sec ago</div>
                                @elseif (time() - strtotime($recact->created_at) / 60 > 60)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 60 }} min ago</div>
                                @elseif (time() - strtotime($recact->created_at) / 3600 > 24)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 3600 }} hrs ago</div>
                                @else
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 86400 }} day ago</div>
                                @endif
                              </div>
                              <div><h6 class="font-weight-bold text-info ml-sm-2">{{ $recact->actinfo }}</h6></div>
                            </div>
                          @elseif ($recact->actname == 'Add User')
                            <div class="d-flex pb-3 border-bottom justify-content-between">
                              <div class="mr-3"><i class="ri-user-add-fill icon-md" style="color:#f8b500"></i></div>
                              <div class="font-weight-bold mr-sm-4">
                                <div>{{ $recact->actname }}</div>
                                @if (time() - strtotime($recact->created_at) < 60)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) }} sec ago</div>
                                @elseif (time() - strtotime($recact->created_at) / 60 > 60)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 60 }} min ago</div>
                                @elseif (time() - strtotime($recact->created_at) / 3600 > 24)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 3600 }} hrs ago</div>
                                @else
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 86400 }} day ago</div>
                                @endif
                              </div>
                              <div><h6 class="font-weight-bold text-info ml-sm-2">{{ $recact->actinfo }}</h6></div>
                            </div>
                          @elseif ($recact->actname == 'Export User')
                            <div class="d-flex pb-3 border-bottom justify-content-between">
                              <div class="mr-3"><i class="ri-user-shared-2-fill icon-md" style="color:#4d4dff"></i></div>
                              <div class="font-weight-bold mr-sm-4">
                                <div>{{ $recact->actname }}</div>
                                @if (time() - strtotime($recact->created_at) < 60)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) }} sec ago</div>
                                @elseif (time() - strtotime($recact->created_at) / 60 > 60)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 60 }} min ago</div>
                                @elseif (time() - strtotime($recact->created_at) / 3600 > 24)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 3600 }} hrs ago</div>
                                @else
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 86400 }} day ago</div>
                                @endif
                              </div>
                              <div><h6 class="font-weight-bold text-info ml-sm-2">{{ $recact->actinfo }}</h6></div>
                            </div>
                          @elseif ($recact->actname == 'Reset Password')
                          <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                            <div class="mr-3"><i class="ri-delete-bin-2-fill icon-md" style="color: #913831"></i></div>
                            <div class="font-weight-bold mr-sm-4">
                              <div>{{ $recact->actname }}</div>
                              @if (time() - strtotime($recact->created_at) < 60)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) }} sec ago</div>
                                @elseif (time() - strtotime($recact->created_at) / 60 > 60)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 60 }} min ago</div>
                                @elseif (time() - strtotime($recact->created_at) / 3600 > 24)
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 3600 }} hrs ago</div>
                                @else
                                  <div class="text-muted font-weight-normal mt-1">{{ time() - strtotime($recact->created_at) / 86400 }} day ago</div>
                                @endif
                            </div>
                            <div><h6 class="font-weight-bold text-info ml-sm-2">{{ $recact->actinfo }}</h6></div>
                          </div>
                          @endif
                      @endforeach
                    @else
                      <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                        <div class="mr-3"><i class="bi bi-exclamation-square-fill icon-md" style="color: red"></i></div>
                        <div class="font-weight-bold mr-sm-4">
                          <div>No Recent Activity</div>
                          <div class="text-muted font-weight-normal mt-1">NONE</div>
                        </div>
                        <div><h6 class="font-weight-bold text-info ml-sm-2">0</h6></div>
                      </div>
                    @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
