@extends('superadmin.superadmin_master')
@section('title','List of Undergraduate Programs')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Admission</li>
            <li class="breadcrumb-item active">Undergraduate Programs Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Undergraduate Programs</h2> 
            <a href="{{ route('programs_offers.create') }}" class="btn btn-success">Add Program</a>
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
            <th scope="col">Program Offered</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            @forelse ($programs_offers as $programs_offer)
            <tr>
                <th scope="row">{{ $programs_offer->id }}</th>
                <td>{{ $programs_offer->title }}</td>
                <td>{!! $programs_offer->desc !!}</td>
                <td>{{ $programs_offer->created_at }}</td>
                <td>{{ $programs_offer->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('programs_offers.destroy', $programs_offer->id) }}" class="d-grid gap-2">
                        <a class="btn" id="icon_edit" href="{{ route('programs_offers.edit', $programs_offer->id) }}"><i class="ri-edit-box-fill"></i></a>
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
