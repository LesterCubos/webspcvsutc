@extends('superadmin.superadmin_master')
@section('title','Cashier')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Cashier Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Cashier Page</h2>
            <a href="{{ route('cashiers.create') }}" class="btn btn-success">Add</a>



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
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @forelse ($cashiers as $cashier)
            <tr>
                <th scope="row">{{ $cashier->id }}</th>
                <td>{{ $cashier->title }}</td>
                <td>{!! $cashier->content !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($cashier->img) }}" alt="{{ $cashier->title }}" srcset=""></td>
                <td>{{ $cashier->created_at }}</td>
                <td>{{ $cashier->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('cashiers.destroy', $cashier->id) }}" class="d-grid gap-2">
                        <a class="btn" id="icon_edit" href="{{ route('cashiers.edit', $cashier->id) }}"><i class="ri-edit-box-fill"></i></a>
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Data Found...</div>
                    </td>  
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
