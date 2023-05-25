{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Campus Officials Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Campus Officials Page</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add org_image</button> --}}
            <a href="{{ route('campus_officials.create') }}" class="btn btn-success">Add</a>

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
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($campus_officials as $campus_official)
            <tr>
                <th scope="row">{{ $campus_official->id }}</th>
                <td><img style="width:250px" src="{{ Storage::url($campus_official->org_image) }}" alt="{{ $campus_official->id }}" srcset=""></td>
                <td>{{ $campus_official->created_at }}</td>
                <td>{{ $campus_official->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('campus_officials.destroy', $campus_official->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('campus_officials.edit', $campus_official->id) }}"><i class="ri-edit-box-fill"></i></a>
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
