@extends('superadmin.superadmin_master')
@section('title','Program Section')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Homepage</li>
            <li class="breadcrumb-item active">Program Section</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Program Section</h2>
            <a href="{{ route('programs.create') }}" class="btn btn-success">Add Program</a>
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
            <th scope="col">Program Image</th>
            <th scope="col">Content</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @forelse ($programs as $program)
            <tr>
                <th scope="row">{{ $program->id }}</th>
                <td>{{ $program->title }}</td>
                <td><img style="width:250px" src="{{ Storage::url($program->program_image) }}" alt="{{ $program->title }}" srcset=""></td>
                <td>{{ $program->content }}</td>
                <td>{{ $program->created_at }}</td>
                <td>{{ $program->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('programs.destroy', $program->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('programs.edit', $program->id) }}"><i class="ri-edit-box-fill"></i></a>
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


