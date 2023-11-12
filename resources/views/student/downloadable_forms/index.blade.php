@extends('student.student_master')
@section('title', 'Downloadable Forms')
@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Downloadable Forms</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Downloadable Forms</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="margin-top: 50px; border-radius: 10px">
            <div class="card-body">
                <h4 class="card-title">Downloadable Form</h4>
                <p class="card-description">
                <code>Download File</code> 
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>
                            File Name
                        </th>
                        <th>
                            Action
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($files as $file)
                        <tr>
                            <td>
                            {{ $file->title }}
                            </td>
                            <td>
                            <div class="d-flex">
                                {{-- <iframe src="{{ Storage::url($file->name) }}" frameborder="0" style="width: 100%; height: 500px;"></iframe> --}}
                                <a href="/student/files{{$file->id}}" class="btn btn-info" target="_blank" style="margin-right: 5px"><i class="icon-download"></i></a> 
                                {{-- <button wire:click="download({{ $file->id }})" class="btn btn-info" style="margin-right: 5px"><i class="icon-download"></i></button> --}}
                            </div>
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
                    {{-- Pagination --}}
                    {{-- <div class="d-flex justify-content-center" style="margin-top: 20px">
                    {!! $files->links() !!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection