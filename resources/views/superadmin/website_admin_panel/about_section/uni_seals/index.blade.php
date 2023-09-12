{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('superadmin.superadmin_master')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">About</li>
            <li class="breadcrumb-item active">University Seal Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>University Seal Page</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add Image</button> --}}
            @if ( $nullbtn > 0)
                <a href="{{ route('uni_seals.create') }}" class="btn btn-success" style="pointer-events: none; background-color: #989fa7">Add</a>
            @else
                <a href="{{ route('uni_seals.create') }}" class="btn btn-success">Add</a>
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
            <th scope="col">Content</th>
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($uni_seals as $uni_seal)
            <tr>
                <th scope="row">{{ $uni_seal->id }}</th>
                <td >{!! $uni_seal->content !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($uni_seal->image) }}" alt="{{ $uni_seal->content }}" srcset=""></td>
                <td>{{ $uni_seal->created_at }}</td>
                <td>{{ $uni_seal->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('uni_seals.destroy', $uni_seal->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('uni_seals.edit', $uni_seal->id) }}"><i class="ri-edit-box-fill"></i></a>
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
