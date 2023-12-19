@extends('student.student_master')
@section('title', 'Request Documents')
@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    <div class="pagetitle">
        <h1>Request Documents</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" style="font-weight: 700">Request Documents</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div style="margin-top: 50px; margin-bottom: 20px">
        @if(session('notif.success'))
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="successModalLabel"><i class="bi bi-exclamation-circle-fill" style="color: red"></i> Notification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size:20px">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <strong style="font-size: 20px">{{ session('notif.success') }}</strong>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var successModal = new bootstrap.Modal(document.getElementById('successModal'), {});
                    successModal.show();
                });
            </script>
        @elseif (session('notif.danger'))
            <div class="alert alert-danger fade in alert-dismissible show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
            </button>    
            <i class="bi bi-exclamation-circle-fill" style="margin-right: 5px; font-size: 18px"></i>
            <strong>{{ session('notif.danger') }}</strong>
            </div>
        @endif
    </div>

    @livewire('student-request-search')
</div>

@endsection