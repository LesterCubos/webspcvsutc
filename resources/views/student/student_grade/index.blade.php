@extends('student.student_master')
@section('title', 'Student Grade')
@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Gtades</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Grade</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    @livewire('student-grade-search')

</div>

@endsection