@extends('admin.admin_master')

@section('content')

<div class="content-wrapper" style="background-image: url('../img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
    @php
        $routeName = Route::currentRouteName();
    @endphp
    <div class="pagetitle">
        <h1>Downloadable Forms</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
              <i class="mdi mdi-home-outline"></i> Dashboard</a></li>
            @if ($routeName == 'downloadable_forms.index')
                <li class="breadcrumb-item active" style="font-weight: 700">Downloadable Forms</li>
            @else
                <li class="breadcrumb-item">Downloadable Forms</li>
                <li class="breadcrumb-item active" style="font-weight: 700">Add File</li>
            @endif
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div style="margin-top: 50px">
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="margin-top: 50px; border-radius: 10px">
            <div class="card-body">
                <h4 class="card-title">Downloadable Form</h4>
                <p class="card-description">
                <code>Upload File</code> 
                </p>
                <a class="btn btn-primary btn-icon-text" href="{{ route('downloadable_forms.create') }}">
                    <i class="mdi mdi-plus-circle btn-icon-prepend"></i>Add Files
                </a>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>
                            File Name
                        </th>
                        <th>
                            Created At
                        </th>
                        <th>
                            Updated At
                        </th>
                        <th>
                            Action
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($files as $file)
                        <tr>
                            <td>
                            {{ $file->title }}
                            </td>
                            <td>
                            {{ $file->created_at }}
                            </td>
                            <td>
                            {{ $file->updated_at }}
                            </td>
                            <td>
                            <div class="d-flex">
                                {{-- <iframe src="{{ Storage::url($file->name) }}" frameborder="0" style="width: 100%; height: 500px;"></iframe> --}}
                                <a href="files{{$file->id}}" class="btn btn-primary" target="_blank" style="margin-right: 5px"><i class="icon-eye"></i></a> 
                                {{-- <button wire:click="download({{ $file->id }})" class="btn btn-info" style="margin-right: 5px"><i class="icon-download"></i></button> --}}
                                <form method="post" action="{{ route('downloadable_forms.destroy', $file->id) }}">      
                                    @csrf
                                    @method('DELETE')
                                    <button id="icon_delete" type="submit" class="btn btn-danger">
                                        <i class="icon-trash"></i>
                                    </button>
                                </form>
                            </div>
                            </td>
                        </tr>  
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; font-size: 24px">
                                <div class="py-5" style="">No Data Found...</div>
                            </td>  
                        </tr> 
                        @endforelse
                    </tbody>
                    </table>
                    {{-- Pagination --}}
                    {{-- <div class="d-flex justify-content-center" style="margin-top: 20px">
                    {!! $files->links() !!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection