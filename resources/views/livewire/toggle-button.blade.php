@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    {{-- <h1>Dashboard</h1> --}}
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Switch Section Control</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="form-check form-switch">
    <input type="checkbox" class="form-check-input" wire:model="hasStock" id="toggle-switch1">
    <label class="form-check-label" for="toggle-switch1">Services Section</label>
</div>
@endsection
