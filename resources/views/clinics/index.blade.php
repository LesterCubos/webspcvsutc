{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Clinic Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Clinic Page</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add pic</button> --}}
            <a href="{{ route('clinics.create') }}" class="btn btn-success">Add</a>



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
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Picture</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($clinics as $clinic)
            <tr>
                <th scope="row">{{ $clinic->id }}</th>
                <td>{{ $clinic->title }}</td>
                <td>{!! $clinic->content !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($clinic->pic) }}" alt="{{ $clinic->title }}" srcset=""></td>
                <td>{{ $clinic->created_at }}</td>
                <td>{{ $clinic->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('clinics.destroy', $clinic->id) }}" class="d-grid gap-2">

                        <a class="btn btn-primary btn-rounded" href="{{ route('clinics.edit', $clinic->id) }}" style="margin-right: 5px">Edit</a>

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