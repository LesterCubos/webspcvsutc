{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('superadmin.superadmin_master')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Department of Information Technology Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Department of Information Technology Page</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add Imagetton> --}}
            <a href="{{ route('dits.create') }}" class="btn btn-success">Add</a>



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
            <th scope="col">Content</th>
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @forelse ($dits as $dit)
            <tr>
                <th scope="row">{{ $dit->id }}</th>
                <td>{{ $dit->title }}</td>
                <td>{!! $dit->content !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($dit->img)}}" alt="{{ $dit->title }}" srcset=""></td>
                <td>{{ $dit->created_at }}</td>
                <td>{{ $dit->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('dits.destroy', $dit->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('dits.edit', $dit->id) }}"><i class="ri-edit-box-fill"></i></a>
                        @csrf
                        @method('DELETE')

                        {{-- <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button> --}}
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
