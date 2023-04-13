@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Section Switch Control</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Section Switch Control</h2>
            {{-- <button href="{{ route('switch.create') }}" type="submit" name="" class="btn btn-success">Add Switch</button> --}}
            {{-- <a href="{{ route('switch.create') }}" class="btn btn-success">Add</a> --}}

            {{-- <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" id="show-section-switch" value="$showSection ? 'checked' : '' }}">
                <label class="form-check-label" for="show-section-switch">Show Section</label>
            </div> --}}

        </div>
    </div>

    {{-- @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }}
        </div>
    @endif --}}

    <form method="post" action="{{ route('switch.update','switch') }}">
        @csrf
        @foreach($switch as $swtch)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="{{ $swtch->name }}" id="{{ $swtch->name }}" {{ $swtch->status ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $swtch->name }}">
                    {{ $swtch->name }}
                </label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Save</button>
    </form>



@endsection
