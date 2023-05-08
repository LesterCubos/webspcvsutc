{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Department of Management Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Department of Management Page</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add pic</button> --}}
            <a href="{{ route('doms.create') }}" class="btn btn-success">Add</a>



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
            @foreach ($doms as $dom)
            <tr>
                <th scope="row">{{ $dom->id }}</th>
                <td>{{ $dom->title }}</td>
                <td>{!! $dom->content !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($dom->img) }}" alt="{{ $dom->title }}" srcset=""></td>
                <td>{{ $dom->created_at }}</td>
                <td>{{ $dom->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('doms.destroy', $dom->id) }}" class="d-grid gap-2">

                        <a class="btn btn-primary btn-rounded" href="{{ route('doms.edit', $dom->id) }}" style="margin-right: 5px">Edit</a>

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