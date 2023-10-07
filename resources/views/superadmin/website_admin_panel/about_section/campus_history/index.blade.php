@extends('superadmin.superadmin_master')
@section('title','Campus History')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">About</li>
            <li class="breadcrumb-item active">Campus History Section</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Campus History Section</h2>
            @if ($nullbtn > 0)
                <a href="{{ route('campus_history.create') }}" class="btn btn-success" style="pointer-events: none; background-color: #989fa7">Create History</a>
            @else
                <a href="{{ route('campus_history.create') }}" class="btn btn-success">Create History</a>
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
            <th scope="col">Body</th>
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @forelse ($campus_history as $campushistory)
            <tr>
                <th scope="row">{{ $campushistory->id }}</th>
                <td>{{ $campushistory->title }}</td>
                <td>{!!$campushistory->body!!}</td>
                <td><img style="width:250px" src="{{ Storage::url($campushistory->image) }}" alt="{{ $campushistory->title }}" srcset=""></td>
                <td>{{ $campushistory->created_at }}</td>
                <td>{{ $campushistory->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('campus_history.destroy', $campushistory->id) }}" class="d-grid gap-2">

                        {{-- <a class="btn btn-info" href="{{ route('campus_history.show', $campushistory->id) }}">Show</a> --}}

                       <a class="btn" id="icon_edit" href="{{ route('campus_history.edit', $campushistory->id) }}"><i class="ri-edit-box-fill"></i></a>
                        @csrf
                        @method('DELETE')

                        {{-- <button type="submit" class="btn btn-danger btn-rounded"><i class="ri-delete-bin-5-fill"></i></button> --}}
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


