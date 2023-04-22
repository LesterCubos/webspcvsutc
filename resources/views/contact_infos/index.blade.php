{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Contact Information Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Contact Information Page</h2>

            <a href="{{ route('contact_infos.create') }}" class="btn btn-success">Add</a>

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
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($contact_infos as $contact_info)
            <tr>
                <th scope="row">{{ $contact_info->id }}</th>
                <td>{{ $contact_info->campus_address }}</td>
                <td>{{ $contact_info->campus_email }}</td>
                <td>{{ $contact_info->campus_number }}</td>
                <td>{{ $contact_info->created_at }}</td>
                <td>{{ $contact_info->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('contact_infos.destroy', $contact_info->id) }}" class="d-grid gap-2">

                        <a class="btn btn-primary btn-rounded" href="{{ route('contact_infos.edit', $contact_info->id) }}" style="margin-right: 5px">Edit</a>

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
