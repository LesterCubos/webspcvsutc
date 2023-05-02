
{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Programs Offered Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Program Offered Section</h2>
            {{-- <button href="{{ route('program_offers.create') }}" type="submit" name="" class="btn btn-success">Add Image</button> --}}
            <a href="{{ route('programs_offers.create') }}" class="btn btn-success">Add Program</a>
        </div>
    </div>

    @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }}
        </div>
    @endif



    <table class="table table-bordered table-hover border-primary">
        <thead class="table-display text-center">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Program Offered</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($programs_offers as $programs_offer)
            <tr>
                <th scope="row">{{ $programs_offer->id }}</th>
                <td>{{ $programs_offer->title }}</td>
                <td>{!! $programs_offer->desc !!}</td>
                <td>{{ $programs_offer->created_at }}</td>
                <td>{{ $programs_offer->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('programs_offers.destroy', $programs_offer->id) }}" class="d-grid gap-2">

                        {{-- <a class="btn btn-info" href="{{ route('program_offers.show', $programs_offer->id) }}">Show</a> --}}

                        <a class="btn btn-primary btn-rounded" href="{{ route('programs_offers.edit', $programs_offer->id) }}" style="margin-right: 5px">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection
