@extends('layouts.admin')
@section('description')
<div class="pagename">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">csghboard</li>
        <li class="breadcrumb-item"><a href="{{ route('csgs.index') }}">Central Student Government Page</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page name -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($csg) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<div>
    <label for="description" class="form-label">description</label>
    <textarea style="height: 250px" id="description" name="description" class="form-control tinymce-editor">{{ $csg->description ?? old('description') }}</textarea>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($csg) ? route('csgs.update', $csg->id) : route('csgs.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($csg)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control tinymce-editor">{{ $csg->desc ?? old('desc') }}</textarea>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    @if(URL::previous())
                        <a href="{{ URL::previous() }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                    @endif
                </div>
            </form>
        </div>

    </div>
</section>



@endsection
