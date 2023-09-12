{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('superadmin.superadmin_master')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">About</li>
            <li class="breadcrumb-item active">Mission, Vision, Goal Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Mission, Vision, Goal Page</h2>
            
            <a href="{{ route('mvgs.create') }}" class="btn btn-success">Add</a>

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
            <th scope="col">Title Left</th>
            <th scope="col">Title Right</th>
            <th scope="col">Content</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>


        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($mvgs as $mvg)
            <tr>
                <th scope="row">{{ $mvg->id }}</th>
                <td>{{ $mvg->title1 }}</td>
                <td>{{ $mvg->title2 }}</td>
                <td style="width:500px">{!!$mvg->content !!}</td>
                <td>{{ $mvg->created_at }}</td>
                <td>{{ $mvg->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('mvgs.destroy', $mvg->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('mvgs.edit', $mvg->id) }}"><i class="ri-edit-box-fill"></i></a>
                        @csrf
                        @method('DELETE')

                        <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
