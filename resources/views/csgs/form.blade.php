@extends('layouts.admin')
@section('content')
<div class="pagename">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
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



<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($csg) ? route('csgs.update', $csg->id) : route('csgs.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($csg)
                    @method('put')
                @endisset
                <h6>Content</h6>
                <br>
                <div>
                    <label for="description" class="form-label">Title</label>
                    <textarea id="description" name="description" class="form-control tinymce-editor">{{ $csg->title ?? old('title') }}</textarea>

                </div>
                <br>
                <div>
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control tinymce-editor">{{ $csg->content ?? old('content') }}</textarea>
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
                    <h6>CSG MEMBERS</h6>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $csg->name ?? old('name') }}">
                </div>

                <br>
                <div>
                    {{-- <h6>name</h6> --}}
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ $csg->position ?? old('position') }}">
                </div>
                <br>
                {{-- <div>
                    <label for="desc" class="form-label">CSG CONTENT/Description</label>
                    <textarea style="height: 250px" id="desc" name="desc" class="form-control tinymce-editor">{{ $csg->desc ?? old('desc') }}</textarea>
                </div>

                <br> --}}

                {{-- <div>
                    <x-input-label for="name" value="name" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$carousel_item->name ?? old('name')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div> --}}



                {{-- <div>
                    <x-input-label for="description" value="description" /> --}}
                    {{-- use textarea-input component that we will create after this --}}
                    {{-- <x-textarea-input id="description" name="description" class="mt-1 block w-full" required autofocus>{{ $carousel_item->description ?? old('description') }}</x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div> --}}
                <br>


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
