{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">News Update Section</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>News Update Section</h2>
            {{-- <button href="{{ route('carousel_items.create') }}" type="submit" name="" class="btn btn-success">Add Image</button> --}}
            <a href="{{ route('news.create') }}" class="btn btn-success">Add</a>

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
            <th scope="col">News Title</th>
            <th scope="col">Headline</th>
            <th scope="col">Content</th>
            <th scope="col">News Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            {{-- populate our carousel item data --}}
            @foreach ($news as $new)
            <tr>
                <th scope="row">{{ $new->id }}</th>
                <td>{{ $new->news_title }}</td>
                <td>{{ $new->news_headline }}</td>
                <td >{!! Str::limit($new->news_content,'250','...') !!}</td>
                <td><img style="width:250px" src="{{ Storage::url($new->news_image) }}" alt="{{ $new->news_title }}" srcset=""></td>
                <td>{{ $new->created_at }}</td>
                <td>{{ $new->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('news.destroy', $new->id) }}" class="d-grid gap-2">

                        <a class="btn" id="icon_edit" href="{{ route('news.edit', $new->id) }}"><i class="ri-edit-box-fill"></i></a>

                        @csrf
                        @method('DELETE')

                        <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $news->links() !!}
    </div>

@endsection
