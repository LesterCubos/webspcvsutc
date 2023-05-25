@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">News and Update Section</li>
        <li class="breadcrumb-item active">Add News</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($new) ? 'Edit' : 'Add' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($new) ? route('news.update', $new->id) : route('news.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($new)
                    @method('put')
                @endisset
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="news_title" class="form-label">News Title</label>
                    <input type="text" class="form-control" id="news_title" name="news_title" value="{{ $new->news_title ?? old('news_title') }}" required autofocus>
                </div>
                <br>
                <div>
                    {{-- <h6>Title</h6> --}}
                    <label for="news_headline" class="form-label">News Headline</label>
                    <input type="text" class="form-control" id="headlline" name="news_headline" value="{{ $new->news_headline ?? old('news_headline') }}" required autofocus>
                </div>
                <br>
                {{-- <div>
                    <x-input-label for="title" value="Title" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$carousel_item->title ?? old('title')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div> --}}

                <div>
                    <label for="news_content" class="form-label">News Content</label>
                    <textarea style="height: 250px" id="news_content" name="news_content" class="form-control tinymce-editor" required autofocus>{{ $new->news_content ?? old('news_content') }}</textarea>
                </div>

                {{-- <div>
                    <x-input-label for="content" value="Content" /> --}}
                    {{-- use textarea-input component that we will create after this --}}
                    {{-- <x-textarea-input id="content" name="content" class="mt-1 block w-full" required autofocus>{{ $carousel_item->content ?? old('content') }}</x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                </div> --}}
                <br>
                <div>
                    <label for="news_image" class="form-label">News Image</label>
                    <br>
                    <label class="block mt-2">
                        {{-- <span class="sr-only">Choose news_image</span> --}}
                        <input type="file" id="news_image" name="news_image" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="news_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($new) ? Storage::url($new->news_image) : '' }}" alt="news_image preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                  
                    <a href="{{ route('news.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                    
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // create onchange event listener for featured_news_image input
    document.getElementById('news_image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an news_image, create a preview in featured_news_image_preview
            document.getElementById('news_image_preview').src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
