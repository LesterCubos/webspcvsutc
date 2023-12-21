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
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" style="text-align: center; margin-top: 20px; color: green; border: 4px solid purple;">
                      <thead>
                        <tr>
                            <th style="border-right: 4px solid purple; border-bottom: 4px solid purple; font-weight: bolder;">Course Code</th> 
                            <th style="border-right: 4px solid purple; border-bottom: 4px solid purple; font-weight: bolder;">Course Description</th> 
                            <th style="border-right: 4px solid purple; border-bottom: 4px solid purple; font-weight: bolder;">Units</th> 
                            <th style="border-right: 4px solid purple; border-bottom: 4px solid purple; font-weight: bolder;">Day</th> 
                            <th style="border-right: 4px solid purple; border-bottom: 4px solid purple; font-weight: bolder;">Time</th> 
                            <th style="border-bottom: 4px solid purple; font-weight: bolder;">Room</th> 
                        </tr>
                      </thead>
                      <tbody>
                        <tr style="height: 300px;">
                          <td style="border-right: 4px solid purple; vertical-align: top;">
                            @foreach ($schedcodes as $schedcode)
                                <p style="color: #000">{{ $schedcode->course_name }}</p>
                            @endforeach
                          </td>
                          <td style="border-right: 4px solid purple; vertical-align: top;">
                            @foreach ($subjects as $sub)
                                <p style="color: #000">{{ $sub->subjectTitle }}</p>
                            @endforeach
                          </td>
                          <td style="border-right: 4px solid purple; vertical-align: top;">
                            @foreach ($schedcodes as $schedcode)
                                <p style="color: #000">{{ $schedcode->units }}</p>
                            @endforeach
                          </td>
                          <td style="border-right: 4px solid purple; vertical-align: top;">
                            $ 123.21
                          </td>
                          <td style="border-right: 4px solid purple; vertical-align: top">
                            April 05, 2015
                          </td>
                          <td style=" vertical-align: top;">
                            April 05, 2015
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered" style="text-align: center; color: green; border: 4px solid purple; border-top: none">
                      <thead>
                        <tr>
                            <th style="border-right: 4px solid purple; border-bottom: 4px solid purple; font-weight: bolder;">LABORATORY FEES</th> 
                            <th style="border-right: 4px solid purple; border-bottom: 4px solid purple; font-weight: bolder;">ASSESSMENT</th>
                            <th style="border-bottom: none;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr style="height: 300px;">
                          <td style="border-right: 4px solid purple; vertical-align: top">
                            
                          </td>
                          <td style="border-right: 4px solid purple; vertical-align: top">
                            
                          </td>
                          <td style="border-right: 4px solid purple; vertical-align: top; width: 300px; border-top: none">
                            
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection