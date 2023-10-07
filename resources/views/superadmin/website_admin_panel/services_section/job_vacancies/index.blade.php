@extends('superadmin.superadmin_master')
@section('title','Job Vacancies')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">Job Vacancies Page</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Job Vacancies Page</h2>
            <a href="{{ route('job_vacancies.create') }}" class="btn btn-success">Add</a>
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
            <th scope="col">Job Title</th>
            <th scope="col">Description</th>
            <th scope="col">Poster</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            @forelse ($job_vacancies as $job_vacancy)
            <tr>
                <th scope="row">{{ $job_vacancy->id }}</th>
                <td>{{ $job_vacancy->title }}</td>
                <td>{!! Str::limit($job_vacancy->description,'250','...') !!} </td>
                <td><img style="width:250px" src="{{ Storage::url($job_vacancy->jobposter) }}" alt="{{ $job_vacancy->title }}" srcset=""></td>
                <td>{{ $job_vacancy->created_at }}</td>
                <td>{{ $job_vacancy->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('job_vacancies.destroy', $job_vacancy->id) }}" class="d-grid gap-2">                        <a class="btn" id="icon_edit" href="{{ route('job_vacancies.edit', $job_vacancy->id) }}"><i class="ri-edit-box-fill"></i></a>
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


