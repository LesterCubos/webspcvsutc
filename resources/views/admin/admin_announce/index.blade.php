@extends('admin.admin_master')
@section('title','List of All Announcements')
@section('content')
<div class="content-wrapper" style="background-image: url('../img/bg.png'); background-repeat: no-repeat; background-size: 100% 100%;">
  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
  <div class="pagetitle">
      <h1>Announcement</h1>
      <nav>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
            <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" style="font-weight: 700">Announcement</li>
      </ol>
      </nav>
  </div><!-- End Page Title -->

  {{-- @livewire('carousel-search') --}}

  <div class="card" style="margin-top: 50px; border-radius: 10px">
      <div class="card-body">
          <h4 class="card-title">Announcement Table</h4>
          <button type="button" class="btn btn-primary btn-icon-text">
            <a href="{{ route('admin_announces.create') }}" style="color:white">
              <i class="mdi mdi-plus-circle btn-icon-prepend"></i>
              Add Announcement</a>
          </button>
          <div class="table-responsive pt-3">
          <table class="table table-bordered">
              <thead>
              <tr>
                  <th>
                  ID
                  </th>
                  <th>
                  Subject
                  </th>
                  <th>
                  Content
                  </th>
                  <th>
                  Poster
                  </th>
                  <th>
                  Created At
                  </th>
                  <th>
                  Updated At
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
                  @forelse ($admin_announces as $admin_announce)
                      <tr>
                          <td>
                              {{ $admin_announce->id }}
                          </td>
                          <td>
                              {{ $admin_announce->title }}
                          </td>
                          <td>
                              {!! Str::limit($admin_announce->content,'250','...') !!}
                          </td>
                          
                          <td>{{ $admin_announce->created_at }}</td>
                          <td>{{ $admin_announce->updated_at }}</td>
                          <td>
                            @if ($admin_announce->isActive == 1)
                                Show
                            @else
                                Hidden    
                            @endif
                          </td>
                          <td>
                              {{ $admin_announce->created_at }}
                          </td>
                          <td>
                            <form method="post" action="{{ route('admin_announces.destroy', $admin_announce->id) }}" class="d-grid gap-2">      
                              <a class="btn" id="icon_edit" href="{{ route('admin_announces.edit', $admin_announce->id) }}"><i class="ri-edit-box-fill"></i></a>
                              @csrf
                              @method('DELETE')
      
                              <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                            </form>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="8" style="text-align: center; font-size: 24px">
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
@endsection