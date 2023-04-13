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
@include('components.toggle-switch', ['name' => 'toggleSwitch1', 'label' => 'Toggle Switch 1'])
@include('components.toggle-switch', ['name' => 'toggleSwitch2', 'label' => 'Toggle Switch 2'])
@include('components.toggle-switch', ['name' => 'toggleSwitch3', 'label' => 'Toggle Switch 3'])

<div class="form-check form-switch">
    <input type="checkbox" class="form-check-input" wire:model="{{ $name }}" id="{{ $name }}">
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
</div>
<div class="form-check form-switch">
    <input type="checkbox" class="form-check-input" wire:model="{{ $name }}" id="{{ $name }}">
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
</div>
<div class="form-check form-switch">
    <input type="checkbox" class="form-check-input" wire:model="{{ $name }}" id="{{ $name }}">
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
</div>

@endsection
