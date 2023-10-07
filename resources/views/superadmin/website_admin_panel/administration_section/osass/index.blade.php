@extends('superadmin.superadmin_master')
@section('title','Office of Student Affairs')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Office of Student Affairs Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Office of Student Affairs Page</h2>
            @if ($nullbtn > 0)
                <a href="{{ route('osass.create') }}" class="btn btn-success" style="pointer-events: none; background-color: #989fa7">Add</a>
            @else
                <a href="{{ route('osass.create') }}" class="btn btn-success">Add</a>
            @endif
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
            @forelse ($osass as $osas)
            <tr>
                <th scope="row">{{ $osas->id }}</th>
                <td>{{ $osas->title }}</td>
                <td>{!! $osas->content !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($osas->img) }}" alt="{{ $osas->title }}" srcset=""></td>
                <td>{{ $osas->created_at }}</td>
                <td>{{ $osas->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('osass.destroy', $osas->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('osass.edit', $osas->id) }}"><i class="ri-edit-box-fill"></i></a>
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
