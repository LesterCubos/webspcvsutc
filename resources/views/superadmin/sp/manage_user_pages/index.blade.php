@extends('superadmin.sp.sp_superadmin_master')


@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(#ffff, #f4c2fe, #f4c2fe, #f4c2fe );">
  <div class="pagetitle">
    {{-- <h1>Dashboard</h1> --}}
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.sp.dashboard') }}" class="abreadlink">
          <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage User</li>
        <li class="breadcrumb-item active" style="font-weight: 700">List of Users</li>
    </ol>
    </nav>
  </div><!-- End Page Title -->
  
  @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }} 
        </div>
  @endif

  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h1 class="display-4">Select Upload CSV file if multiple users needs to be created. Make sure ff the ff format.</h1>
          <a href="" class="btn btn-success btn-rounded btn-fw">Upload CSV file</a>
          <a href="{{ route('superadmin.sp.manage_user_pages.form')}}" class="btn btn-success btn-rounded btn-fw">Add New User</a>
        </div>
      </div>
  </div>

  {{-- <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>ROLE</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id}}</td>
                      <td>{{ $user->name}}</td>
                      <td>Photoshop</td>
                      <td>{{ $user->email}}</td>
                      <td>{{ $user->role}}</td>
                      <td class="text-success"> 28.76% <i class="mdi mdi-arrow-up"></i></td>
                      <td>
                        @if($user->status == 'active')
                        <label class="badge badge-success">{{ $user->status}}</label>
                        @elseif($user->status == 'inactive')
                        <label class="badge badge-danger">{{ $user->status}}</label>
                        @endif
                      </td>
                      <td>
                        <form method="post" action="{{ route('users.destroy', $user->id) }}" class="d-grid gap-2">
                       
                          
                          <a class="btn" id="icon_edit" href="{{ route('users.edit', $user->id) }}"><i class="ri-edit-box-fill"></i></a>
                          @csrf
                          @method('DELETE')

                          <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>Messsy</td>
                      <td>Flash</td>
                      <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                      <td><label class="badge badge-warning">In progress</label></td>
                    </tr>
                    <tr>
                      <td>John</td>
                      <td>Premier</td>
                      <td class="text-success"> 35.00% <i class="mdi mdi-arrow-up"></i></td>
                      <td><label class="badge badge-info">Fixed</label></td>
                    </tr>
                    <tr>
                      <td>Peter</td>
                      <td>After effects</td>
                      <td class="text-danger"> 82.00% <i class="mdi mdi-arrow-down"></i></td>
                      <td><label class="badge badge-success">Completed</label></td>
                    </tr>
                    <tr>
                      <td>Dave</td>
                      <td>53275535</td>
                      <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                      <td><label class="badge badge-warning">In progress</label></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
  </div> --}}

  {{-- <div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>AVATAR</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user->id}}</td>
                  <td class="py-1">
                    @if (empty($user->avatar))
                      <img src="{{ asset('img/default.png') }}" alt="Profile Photo">
                    @else
                      <img src="/avatars/{{ $user->avatar }}" alt="Profile Photo">
                    @endif
                  </td>
                  <td>{{ $user->name}}</td>
                  <td>Photoshop</td>
                  <td>{{ $user->email}}</td>
                  <td>{{ $user->role}}</td>
                  <td>
                    @if($user->status == 'active')
                      <label class="badge badge-success">{{ $user->status}}</label>
                    @elseif($user->status == 'inactive')
                      <label class="badge badge-danger">{{ $user->status}}</label>
                    @endif
                  </td>
                  <td>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> --}}

  @livewire('user-search')

</div>
@endsection
