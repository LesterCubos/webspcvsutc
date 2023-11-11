@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Instructor Page Switch</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="bi bi-house-fill"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Instructor Page Switch</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="margin-top: 50px; border-radius: 10px">
          <div class="card-body">
            <h4 class="card-title">Instructor Page Switch</h4>
            <p class="card-description">
              Edit the status of <code>Instructor Page</code>
            </p>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Name
                    </th>
                    <th>
                      Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($switchs as $key => $switch)
                    <tr class="table-primary">
                        <td>{{ $switch->name }}</td>
                        <td>
                            @livewire('toggle-status', ['model' => $switch, 'field' => 'isActive'], key($switch->id))
                        </td>
                    </tr>
                        @empty
                            <tr>
                                <td colspan="2" style="text-align: center; font-size: 24px">
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
    
</div>

@endsection