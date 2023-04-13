@extends('layouts.admin')
@section('content')

<div class="pagetitle">
    {{-- <h1>Dashboard</h1> --}}
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Show and Hide Section Switch Control</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <br>
            <h2>Show and Hide Section Switch Control</h2>

            <button type="button"
            wire:click="openDiv"
            class="px-4 py-2 text-purple-100 bg-purple-500">{{ $showDiv ? 'Hide section' : 'Show section' }}
        </button>
        @if ($showDiv)
        <div>
            <p>Show and Hide Dive Elements in laravel livewire</p>
        </div>
        @endif


            {{-- <form method="post" action="{{ url('/toggle-section') }}">
                @csrf
                <button type="submit" class="toggle-button">
                    {{ session('show_section', false) ? 'Hide section' : 'Show section' }}
                </button>
            </form> --}}

            {{-- <form method="post" action="{{ url('/toggle-section') }}">
                @csrf
                <button type="submit">{{ session('show_section', false) ? 'Hide section' : 'Show section' }}</button>
            </form> --}}

    </div>
</div>

@endsection
