@extends('superadmin.superadmin_master')
@section('content')
<div class="pagetitle">
    <h1></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item"><a href="{{ route('social_media.index') }}">Social Media Links</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($socialmedia) ? 'Edit' : 'Add' }}</h4>


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" on:click.prevent="$dispatch('open-modal', 'icon_selection')">
            {{ __('Browse Icons') }}
        </button>
    
        <!-- Modal -->
        <div name="icon_selection" class="modal fade modal-xl" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <form method="post" action="" class="p-6">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Browse Icons</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Use the following pattern to add the Icons to anywhere in your project. <code>&lt;i class=&quot;<strong>bi bi-discord</strong>&quot;&gt;&lt;/i&gt;</code> Replace the bold part with the below icon names. Copy and paste it in the Icon field.
                        </p>
                        <div class="iconslist">
                            <div class="icon">
                                <i class="bi bi-discord"></i>
                                <div class="label">bi bi-discord</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-discord"></i>
                                <div class="label">bx bxl-discord</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-discord-alt"></i>
                                <div class="label">bx bxl-discord-alt</div>
                            </div>
                            <div class="icon">
                                <i class="ri-discord-fill"></i>
                                <div class="label">ri-discord-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-discord-line"></i>
                                <div class="label">ri-discord-line</div>
                            </div>
                            <div class="icon">
                                <i class="bi bi-facebook"></i>
                                <div class="label">bi bi-facebook</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-facebook"></i>
                                <div class="label">bx bxl-facebook</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-facebook-circle"></i>
                                <div class="label">bx bxl-facebook-circle</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-facebook-square"></i>
                                <div class="label">bx bxl-facebook-square</div>
                            </div>
                            <div class="icon">
                                <i class="ri-facebook-box-fill"></i>
                                <div class="label">ri-facebook-box-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-facebook-box-line"></i>
                                <div class="label">ri-facebook-box-line</div>
                            </div>
                            <div class="icon">
                                <i class="ri-facebook-circle-fill"></i>
                                <div class="label">ri-facebook-circle-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-facebook-circle-line"></i>
                                <div class="label">ri-facebook-circle-line</div>
                            </div>
                            <div class="icon">
                                <i class="ri-facebook-fill"></i>
                                <div class="label">ri-facebook-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-facebook-line"></i>
                                <div class="label">ri-facebook-line</div>
                            </div>
                            <div class="icon">
                                <i class="bi bi-google"></i>
                                <div class="label">bi bi-google</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-google"></i>
                                <div class="label">bx bxl-google</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-google-plus"></i>
                                <div class="label">bx bxl-google-plus</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-google-plus-circle"></i>
                                <div class="label">bx bxl-google-plus-circle</div>
                            </div>
                            <div class="icon">
                                <i class="ri-google-fill"></i>
                                <div class="label">ri-google-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-google-line"></i>
                                <div class="label">ri-google-line</div>
                            </div>
                            <div class="icon">
                                <i class="bi bi-instagram"></i>
                                <div class="label">bi bi-instagram</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-instagram"></i>
                                <div class="label">bx bxl-instagram</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-instagram-alt"></i>
                                <div class="label">bx bxl-instagram-alt</div>
                            </div>
                            <div class="icon">
                                <i class="ri-instagram-fill"></i>
                                <div class="label">ri-instagram-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-instagram-line"></i>
                                <div class="label">ri-instagram-line</div>
                            </div>
                            <div class="icon">
                                <i class="bi bi-linkedin"></i>
                                <div class="label">bi bi-linkedin</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-linkedin"></i>
                                <div class="label">bx bxl-linkedin</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-linkedin-square"></i>
                                <div class="label">bx bxl-linkedin-square</div>
                            </div>
                            <div class="icon">
                                <i class="ri-linkedin-box-fill"></i>
                                <div class="label">ri-linkedin-box-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-linkedin-box-line"></i>
                                <div class="label">ri-linkedin-box-line</div>
                            </div>
                            <div class="icon">
                                <i class="ri-linkedin-fill"></i>
                                <div class="label">ri-linkedin-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-linkedin-line"></i>
                                <div class="label">ri-linkedin-line</div>
                            </div>
                            <div class="icon">
                                <i class="bi bi-twitter"></i>
                                <div class="label">bi bi-twitter</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-twitter"></i>
                                <div class="label">bx bxl-twitter</div>
                            </div>
                            <div class="icon">
                                <i class="ri-twitter-fill"></i>
                                <div class="label">ri-twitter-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-twitter-line"></i>
                                <div class="label">ri-twitter-line</div>
                            </div>
                            <div class="icon">
                                <i class="bi bi-youtube"></i>
                                <div class="label">bi bi-youtube</div>
                            </div>
                            <div class="icon">
                                <i class="bx bxl-youtube"></i>
                                <div class="label">bx bxl-youtube</div>
                            </div>
                            <div class="icon">
                                <i class="ri-youtube-fill"></i>
                                <div class="label">ri-youtube-fill</div>
                            </div>
                            <div class="icon">
                                <i class="ri-youtube-line"></i>
                                <div class="label">ri-youtube-line</div>
                            </div>                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </div>
                </div>
            </form>
        </div>

    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($socialmedia) ? route('social_media.update', $socialmedia->id) : route('social_media.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- add @method('put') for edit mode --}}
                @isset($socialmedia)
                    @method('put')
                @endisset
                <br>
                <div>
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $socialmedia->name ?? old('name') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="icon" class="form-label">Icon:</label>
                    <input type="text" class="form-control" id="icon" name="icon" value="{{ $socialmedia->icon ?? old('icon') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="link" class="form-label">Link:</label>
                    <textarea style="height: 100px" id="link" name="link" class="form-control" required autofocus>{{ $socialmedia->link ?? old('link') }}</textarea>
                </div>
                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('social_media.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                  
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
