@extends('superadmin.superadmin_master')
@section('title','List of Other Links')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Settings</li>
            <li class="breadcrumb-item active">Other Links</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Other Links</h2>
            <a href="{{ route('other_links.create') }}" class="btn btn-success">Add</a>


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
            <th scope="col">Link</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>


        <tbody>
            @forelse ($others as $other)
            <tr>
                <th scope="row">{{ $other->id }}</th>
                <td>{{ $other->name }}</td>
                <td style="width:500px">{!!$other->link !!}</td>
                <td>{{ $other->created_at }}</td>
                <td>{{ $other->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('other_links.destroy', $other->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('other_links.edit', $other->id) }}"><i class="ri-edit-box-fill"></i></a>
                        @csrf
                        @method('DELETE')

                        <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Data Found...</div>
                    </td>  
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
