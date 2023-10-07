@extends('superadmin.superadmin_master')
@section('title','List of University Officials')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">About</li>
            <li class="breadcrumb-item active">University Officials Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>University Officials Page</h2>
            <a href="{{ route('uni_officials.create') }}" class="btn btn-success">Add</a>
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
            @forelse ($uni_officials as $uni_official)
            <tr>
                <th scope="row">{{ $uni_official->id }}</th>
                <td>{{ $uni_official->official_name }}</td>
                <td>{{ $uni_official->official_position }}</td>
                <td>{{ $uni_official->official_contactnum }}</td>
                <td>{{ $uni_official->official_email }}</td>
                <td>{{ $uni_official->created_at }}</td>
                <td>{{ $uni_official->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('uni_officials.destroy', $uni_official->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('uni_officials.edit', $uni_official->id) }}"><i class="ri-edit-box-fill"></i></a>
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
