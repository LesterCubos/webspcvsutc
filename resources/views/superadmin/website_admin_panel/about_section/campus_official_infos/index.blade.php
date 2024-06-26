@extends('superadmin.superadmin_master')
@section('title','List of Campus Officials')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">About</li>
            <li class="breadcrumb-item active">Campus Officials Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Campus Officials Page</h2>
            <a href="{{ route('campus_official_infos.create') }}" class="btn btn-success">Add Campus Official</a>
        </div>
    </div>

    @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }}
        </div>
    @endif

    {{-- table for official info --}}
    <table class="table table-bordered table-hover border-primary">
        <thead class="table-display text-center">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Email</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            @forelse ($campus_official_infos as $campus_official_info)
            <tr>
                <th scope="row">{{ $campus_official_info->id }}</th>
                <td>{{ $campus_official_info->name }}</td>
                <td>{{ $campus_official_info->position }}</td>
                <td>{{ $campus_official_info->contact }}</td>
                <td>{{ $campus_official_info->email }}</td>
                <td>{{ $campus_official_info->created_at }}</td>
                <td>{{ $campus_official_info->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('campus_official_infos.destroy', $campus_official_info->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('campus_official_infos.edit', $campus_official_info->id) }}"><i class="ri-edit-box-fill"></i></a>
                        @csrf
                        @method('DELETE')

                        <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Data Found...</div>
                    </td>  
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
