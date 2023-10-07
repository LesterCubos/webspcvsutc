@extends('superadmin.superadmin_master')
@section('title','Discover Tanza Section')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Homepage</li>
            <li class="breadcrumb-item active">Discover Tanza Section</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Discover Tanza Section</h2>
            <a href="{{ route('discover_tanza_infos.create') }}" class="btn btn-success">Add</a>
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
            <th scope="col">Headline</th>
            <th scope="col">Sub-Headline</th>
            <th scope="col">Content</th>
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @forelse ($discover_tanza_infos as $discover_tanza_info)
            <tr>
                <th scope="row">{{ $discover_tanza_info->id }}</th>
                <td>{{ $discover_tanza_info->headline }}</td>
                <td>{{ $discover_tanza_info->subheadline }}</td>
                <td>{!! Str::limit($discover_tanza_info->content,'500','...') !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($discover_tanza_info->image) }}" alt="{{ $discover_tanza_info->headline }}" srcset=""></td>
                <td>{{ $discover_tanza_info->created_at }}</td>
                <td>{{ $discover_tanza_info->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('discover_tanza_infos.destroy', $discover_tanza_info->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('discover_tanza_infos.edit', $discover_tanza_info->id) }}"><i class="ri-edit-box-fill"></i></a>
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
