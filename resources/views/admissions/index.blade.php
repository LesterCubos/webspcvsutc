{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Admission Section</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Admission Section</h2>

            <a href="{{ route('admissions.create') }}" class="btn btn-success">Add</a>



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
            {{-- <th scope="col">Image</th> --}}
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($admissions as $admission)
            <tr>
                <th scope="row">{{ $admission->id }}</th>
                <td>{{ $admission->title }}</td>
                {{-- <td><img style="width:250px" src="{{ Storage::url($admission->bg_pic) }}" alt="{{ $admission->title }}" srcset=""></td> --}}
                <td>{{ $admission->descrip }}</td>
                <td>{{ $admission->created_at }}</td>
                <td>{{ $admission->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('admissions.destroy', $admission->id) }}" class="d-grid gap-2">

                        {{-- <a class="btn btn-info" href="{{ route('admissions.show', $admission->id) }}">Show</a> --}}

                        <a class="btn btn-primary btn-rounded" href="{{ route('admissions.edit', $admission->id) }}" style="margin-right: 5px">Edit</a>

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


