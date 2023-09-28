{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Office of Registrar Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Office of Registrar Page</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add pic</button> --}}
            <a href="{{ route('office_registrars.create') }}" class="btn btn-success">Add</a>



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
            <th scope="col">pic</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($office_registrars as $office_registrar)
            <tr>
                <th scope="row">{{ $office_registrar->id }}</th>
                <td>{{ $office_registrar->title }}</td>
                <td>{!! $office_registrar->content !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($office_registrar->pic) }}" alt="{{ $office_registrar->title }}" srcset=""></td>
                <td>{{ $office_registrar->created_at }}</td>
                <td>{{ $office_registrar->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('office_registrars.destroy', $office_registrar->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('office_registrars.edit', $office_registrar->id) }}"><i class="ri-edit-box-fill"></i></a>
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