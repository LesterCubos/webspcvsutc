@extends('student.student_master')
@section('title', 'Virtual RegForm')
@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Virtual RegForm</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Virtual RegForm</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="margin-top: 50px; border-radius: 10px; padding-left: 50px; padding-right: 50px; padding-bottom: 100px;">
            <div class="header" style="text-align: center; margin-top: 20px">
                <h4 style="font-weight: bolder; color: green">Cavite State University</h4>
                <h5 style="font-weight: bolder; color: purple">Tanza Campus</h5>
                <h6 style="font-weight: bolder; color: #000">Virtual Registration Form</h6>
            </div>
            <div class="col-lg-12">
                <div class="row" style="margin-top: 20px; color: green; font-weight: bolder; display: flex; justify-content: space-between;">
                    <div class="col" style="display: flex;">
                        @foreach ($users as $user)
                            <p>Student Number: <p style="color: #000; margin-left: 5px">{{ $user->studentNumber }}</p></p>
                        @endforeach
                    </div>
                    <div class="col" style="display: flex;">
                        @foreach ($legends as $legend)
                            <p>Semester: <p style="color: #000; margin-left: 5px">{{ $legend->semester }}</p></p>
                        @endforeach
                    </div>
                    <div class="col" style="display: flex;">
                        @foreach ($legends as $legend)
                            <p>School Year: <p style="color: #000; margin-left: 5px">{{ $legend->schoolyear }}</p></p>
                        @endforeach
                    </div>
                </div>
                <div class="row" style="margin-top: 20px; color: green; font-weight: bolder; display: flex; justify-content: space-between;">
                    <div class="col" style="display: flex;">
                        @foreach ($users as $user)
                            <p>Student Name: <p style="color: #000; margin-left: 5px">{{ $user->firstName }} {{ strtoupper($user->middleName[0]) }}. {{ $user->lastName }}</p></p>
                        @endforeach
                    </div>
                    <div class="col" style="display: flex;">
                        <p>Date:</p>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px; color: green; font-weight: bolder; display: flex; justify-content: space-between;">
                    <div class="col" style="display: flex;">
                        @foreach ($users as $user)
                            <p>Course: <p style="color: #000; margin-left: 5px">{{ $user->course }}</p></p>
                        @endforeach
                    </div>
                    <div class="col" style="display: flex;">
                        <p>Year:</p>
                    </div>
                    <div class="col" style="display: flex;">
                        <p>Section:</p>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px; color: green; font-weight: bolder; border: 2px solid purple; text-align: center">
                    <div class="col-sm" style=" border: 2px solid purple; padding: 5px;">
                        Course Code
                    </div>
                    <div class="col-sm-4" style=" border: 2px solid purple; padding: 5px;">
                        Course Description
                    </div>
                    <div class="col-sm" style=" border: 2px solid purple; text-align: center; padding: 5px;">
                        Units
                    </div>
                    <div class="col-sm" style=" border: 2px solid purple; text-align: center; padding: 5px;">
                        Day
                    </div>
                    <div class="col-sm-3" style=" border: 2px solid purple; text-align: center; padding: 5px;">
                        Time
                    </div>
                    <div class="col-sm" style=" border: 2px solid purple; text-align: center; padding: 5px;">
                        Room
                    </div>
                </div>
                <div class="row" style="height: 300px; border: 2px solid purple; text-align: center; border-top: none">
                    <div class="col-sm" style=" border: 2px solid purple; text-align: center; padding: 5px; border-top: none">
                        @foreach ($schedcodes as $schedcode)
                            <p style="color: #000">{{ $schedcode->course_name }}</p>
                        @endforeach
                    </div>
                    <div class="col-sm-4" style=" border: 2px solid purple; text-align: center; padding: 5px; border-top: none">
                        @foreach ($subjects as $sub)
                            <p style="color: #000">{{ $sub->subjectTitle }}</p>
                        @endforeach
                    </div>
                    <div class="col-sm" style=" border: 2px solid purple; text-align: center; padding: 5px; border-top: none">
                        @foreach ($schedcodes as $schedcode)
                            <p style="color: #000">{{ $schedcode->units }}</p>
                        @endforeach
                    </div>
                    <div class="col-sm" style=" border: 2px solid purple; text-align: center; padding: 5px; border-top: none">
                        
                    </div>
                    <div class="col-sm-3" style=" border: 2px solid purple; text-align: center; padding: 5px; border-top: none">
                        
                    </div>
                    <div class="col-sm" style=" border: 2px solid purple; text-align: center; padding: 5px; border-top: none">
                        
                    </div>
                </div>
                <div class="row" style="border: 2px solid purple; text-align: center; border-top: none; color: green; ; font-weight: bolder; border-bottom: none">
                    <div class="col-sm" style="border: 2px solid purple; text-align: center; padding: 5px; border-top: none; border-bottom: 4px solid purple">
                        LABORATORY FEES
                    </div>
                    <div class="col-sm-4" style="border: 2px solid purple; text-align: center; padding: 5px; border-top: none;  border-bottom: 4px solid purple">
                        ASSESSMENT
                    </div>
                    <div class="col-sm" style="border: 2px solid purple; text-align: center; padding: 5px; border-top: none; border-bottom: none">
                        
                    </div>
                </div>
                <div class="row" style="height: 300px; border: 2px solid purple; text-align: center; border-top: none; color: green; ; font-weight: bolder;">
                    <div class="col-sm" style="border: 2px solid purple; text-align: center; padding: 5px; border-top: none">
                        
                    </div>
                    <div class="col-sm-4" style="border: 2px solid purple; text-align: center; padding: 5px; border-top: none">
                        
                    </div>
                    <div class="col-sm" style="border: 2px solid purple; text-align: center; padding: 5px; border-top: none;">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection