{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('superadmin.superadmin_master')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Admission</li>
            <li class="breadcrumb-item active">Admission Results Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Admission Results</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add img</button> --}}
            <a href="{{ route('admission_results.create') }}" class="btn btn-success">Add</a>



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
            @forelse ($admission_results as $admission_result)
            <tr>
                <th scope="row">{{ $admission_result->id }}</th>
                <td>{{ $admission_result->title }}</td>
                {{-- <td>{!! $admission_result->content !!}</td> --}}
                <td>{!! Str::limit($admission_result->content,'250','...') !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($admission_result->img) }}" alt="{{ $admission_result->title }}" srcset=""></td>
                <td>{{ $admission_result->created_at }}</td>
                <td>{{ $admission_result->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('admission_results.destroy', $admission_result->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('admission_results.edit', $admission_result->id) }}"><i class="ri-edit-box-fill"></i></a>
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
