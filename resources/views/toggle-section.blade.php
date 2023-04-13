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

            <form method="post" action="{{ url('/toggle-section') }}">
                @csrf
                <button type="submit" class="toggle-button">
                    {{ session('show_section', false) ? 'Hide section' : 'Show section' }}
                </button>
            </form>



    </div>
</div>

@endsection
