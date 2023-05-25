{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Discover Tanza Section</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Discover Tanza Section</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add Image</button> --}}
            <a href="{{ route('discover_tanza_infos.create') }}" class="btn btn-success">Add</a>

            {{-- <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" id="show-section-switch" value="$showSection ? 'checked' : '' }}">
                <label class="form-check-label" for="show-section-switch">Show Section</label>
            </div> --}}

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
            @foreach ($discover_tanza_infos as $discover_tanza_info)
            <tr>
                <th scope="row">{{ $discover_tanza_info->id }}</th>
                <td>{{ $discover_tanza_info->headline }}</td>
                <td>{{ $discover_tanza_info->subheadline }}</td>
                <td>{!! $discover_tanza_info->content !!}</td>
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
            @endforeach
        </tbody>
    </table>

@endsection
