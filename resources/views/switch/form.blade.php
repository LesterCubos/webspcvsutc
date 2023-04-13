@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    {{-- <h1>Dashboard</h1> --}}
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="{{ route('switch.index') }}"> Section Switch Control</a></li>
        <li class="breadcrumb-item active">Add Swtich</li>
    </ol>
    </nav>
</div><!-- End Page Title -->


<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($swtch) ? 'Edit Switch' : 'Add Switch' }}</h4>
    </div>
</div>

<form method="post" action="{{ route('switch.update') }}">
    @csrf
    @foreach($switch as $swtch)
        <div class="form-check">
            <br>
                <div>
                    <label class="form-check-label" for="{{ $swtch->name }}">
                        {{ $swtch->name }}
                    </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $swtch->name ?? old('name') }}" required autofocus>
                </div>
            <br>
                <div>
                    <label for="section_" class="form-label">Switch Status</label>
                    <input class="form-check-input" type="checkbox" name="{{ $swtch->name }}" id="{{ $swtch->name }}" {{ $swtch->status ? 'checked' : '' }}>

                </div>

        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
