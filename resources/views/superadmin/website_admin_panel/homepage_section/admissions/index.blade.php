@extends('superadmin.superadmin_master')
@section('title','Admission')
@section('content')
<div class="pagetitle">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Homepage</li>
        <li class="breadcrumb-item active">Admission Section</li>
    </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h2>Admission Section</h2>


            <a href="{{ route('admissions.create') }}" class="btn btn-success">Add</a>
        <br>
        <br>

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
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @forelse ($admissions as $admission)
            <tr>
                <th scope="row">{{ $admission->id }}</th>
                <td>{{ $admission->title }}</td>

                <td>{!! $admission->descrip !!}</td>
                <td>{{ $admission->created_at }}</td>
                <td>{{ $admission->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('admissions.destroy', $admission->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('admissions.edit', $admission->id) }}"><i class="ri-edit-box-fill"></i></a>
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
