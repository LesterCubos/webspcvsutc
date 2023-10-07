@extends('superadmin.superadmin_master')
@section('title','Contact Information')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">About</li>
            <li class="breadcrumb-item active">Contact Information Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Contact Information Page</h2>

            @if ($nullbtn > 0)
                <a href="{{ route('contact_infos.create') }}" class="btn btn-success" style="pointer-events: none; background-color: #989fa7">Add</a>
            @else
                <a href="{{ route('contact_infos.create') }}" class="btn btn-success">Add</a>
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
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            @forelse ($contact_infos as $contact_info)
            <tr>
                <th scope="row">{{ $contact_info->id }}</th>
                <td>{{ $contact_info->campus_address }}</td>
                <td>{{ $contact_info->campus_email }}</td>
                <td>{{ $contact_info->campus_number }}</td>
                <td>{{ $contact_info->created_at }}</td>
                <td>{{ $contact_info->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('contact_infos.destroy', $contact_info->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('contact_infos.edit', $contact_info->id) }}"><i class="ri-edit-box-fill"></i></a>
                        @csrf
                        @method('DELETE')

                        <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
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
