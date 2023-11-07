@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    @php
        $routeName = Route::currentRouteName();
    @endphp
    <div class="pagetitle">
        <h1>Downloadable Forms</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
            @if ($routeName == 'downloadable_forms.index')
                <li class="breadcrumb-item active" style="font-weight: 700">Downloadable Forms</li>
            @else
                <li class="breadcrumb-item">Downloadable Forms</li>
                <li class="breadcrumb-item active" style="font-weight: 700">Add File</li>
            @endif
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div style="margin-top: 50px">
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="margin-top: 50px; border-radius: 10px">
            <div class="card-body">
                @if ($routeName == 'downloadable_forms.index')
                    <h4 class="card-title">Downloadable Form</h4>
                    <p class="card-description">
                    <code>Upload File</code> 
                    </p>
                    <a class="btn btn-primary btn-icon-text" href="{{ route('downloadable_forms.create') }}">
                        <i class="mdi mdi-plus-circle btn-icon-prepend"></i>Add Files
                    </a>
                @endif
                @livewire('file-upload')
            </div>
        </div>
    </div>
</div>

@endsection