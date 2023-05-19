{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">CvSU Student Organizations</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>University Officials Page</h2>
                <a href="{{ route('about_orgs.create') }}" class="btn btn-success">Add New Organization</a>
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
            <th scope="col">Organization Name</th>
            <th scope="col">Organization Description</th>
            <th scope="col">Type</th>
            <th scope="col">Organization Positions and Members</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($about_orgs as $about_org)
            <tr>
                <th scope="row">{{ $about_org->id }}</th>
                <td>{{ $about_org->org_name }}</td>
                <td>{!! $about_org->desc !!}</td>
                <td>{{ $about_org->type }}</td>
                <td>{!! $about_org->org_members !!}</td>
                <td>{{ $about_org->created_at }}</td>
                <td>{{ $about_org->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('about_orgs.destroy', $about_org->id) }}" class="d-grid gap-2">

                        <a class="btn btn-primary btn-rounded" href="{{ route('about_orgs.edit', $about_org->id) }}" style="margin-right: 5px">Edit</a>

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