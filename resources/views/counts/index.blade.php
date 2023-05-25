{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Counts Section</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Counts Section</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add Image</button> --}}
            <a href="{{ route('counts.create') }}" class="btn btn-success">Add</a>

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
            <th scope="col">Category</th>
            <th scope="col">Value</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($counts as $count)
            <tr>
                <th scope="row">{{ $count->id }}</th>
                <td>{{ $count->category }}</td>
                <td>{{ $count->value }}</td>
                <td>{{ $count->created_at }}</td>
                <td>{{ $count->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('counts.destroy', $count->id) }}" class="d-grid gap-2">
                        <a class="btn" id="icon_edit" href="{{ route('counts.edit', $count->id) }}"><i class="ri-edit-box-fill"></i></a>
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
