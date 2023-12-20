@extends('admin.admin_master')
@section('title','Manage Instructor Page')
@section('content')

<div class="content-wrapper" style="background-image: url('/img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
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
            <p class="card-description" style="font-size: 16px; color: green">
              Edit the show/hide status of <code>Instructor Page</code>. Click the toggle switch to show the instructor login page. 
              Then, click the toggle switch AGAIN to hide the instructor login page.
            </p>
            <p class="card-description" style="font-size: 16px; color: green">
              Go to this link to access the instructor login page: <code>'http://127.0.0.1:8000/instructor_page_login' </code> add this extension <code>'/instructor_page_login'</code> in the end of CvSU Tanza website link.
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