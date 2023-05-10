{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagename">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Central Student Government Page</li>
        </ol>
        </nav>
    </div><!-- End Page name -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Central Student Government Page</h2>
            <a href="{{ route('csgs.create') }}" class="btn btn-success">Add CSG Member</a>
            @foreach ( $csgs as $csg )
            <a href="{{ route('csgs.create', $csg->id) }}" class="btn btn-success">Edit Description</a>
            @endforeach
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add img</button> --}}
        </div>
    </div>

    @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <br>

            <h4>Description</h4>
            @foreach ($csgs as $csg)
                <h2>{{ $csg->title }}</h2>
                <p>{!! $csg->content !!}</p>
            @endforeach
        </div>


        <div class="card-body">
            <br>
            <h3>List of Officials</h3>
            <table class="table table-bordered table-hover border-primary">
                <thead class="table-display text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>

                <tbody>
                    {{-- populate our carousel item data --}}
                    @foreach ($csgs as $csg)
                    <tr>
                        <th scope="row">{{ $csg->id }}</th>
                        <td>{{ $csg->name }}</td>
                        <td>{{ $csg->position}}</td>
                        <td>{{ $csg->created_at }}</td>
                        <td>{{ $csg->updated_at }}</td>
                        <td>
                            <form method="post" action="{{ route('csgs.destroy', $csg->id) }}" class="d-grid gap-2">

                                <a class="btn btn-primary btn-rounded" href="{{ route('csgs.edit', $csg->id) }}" style="margin-right: 5px">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>






@endsection
