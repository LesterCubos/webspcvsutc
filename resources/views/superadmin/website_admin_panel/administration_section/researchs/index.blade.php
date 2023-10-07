{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('superadmin.superadmin_master')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Research and Extension Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Research and ExtensionPage</h2>
            @if ($nullbtn > 0)
                <a href="{{ route('researchs.create') }}" class="btn btn-success" style="pointer-events: none; background-color: #989fa7">Add</a>
            @else
                <a href="{{ route('researchs.create') }}" class="btn btn-success">Add</a>
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
            @forelse ($researchs as $research)
            <tr>
                <th scope="row">{{ $research->id }}</th>
                <td>{{ $research->title }}</td>
                <td>{!! $research->content !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($research->img) }}" alt="{{ $research->title }}" srcset=""></td>
                <td>{{ $research->created_at }}</td>
                <td>{{ $research->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('researchs.destroy', $research->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('researchs.edit', $researchs.edit) }}"><i class="ri-edit-box-fill"></i></a>
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
