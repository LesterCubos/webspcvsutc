<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="row mb-3">
            {{-- <form method="POST" action="{{ route('profile.image.upload') }}" enctype="multipart/form-data">
                @csrf
                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image:</label>
                    <div class="col-md-8 col-lg-9">
                        <img src="{{ asset('img/profile.jpeg') }}" alt="Profile">
                        <div class="pt-2">
                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                    </div>
            </form> --}}
            <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row mb-3">
                    <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>

                    <div class="col-md-6">
                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">

                        <img src="/avatars/{{ Auth::user()->avatar }}" style="width:80px;margin-top: 10px;">

                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Upload Profile') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- <div>
            <x-input-label for="name" :value="__('Name')" class="col-md-4 col-lg-3 col-form-label" />
            <div class="col-md-8 col-lg-9">
                <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
        </div> --}}

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-lg-3 col-form-label">Name:</label>
            <div class="col-md-8 col-lg-9">
              <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            </div>
        </div>

        <div class="row mb-3">
            {{-- <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" /> --}}


            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email:</label>
            <div class="col-md-8 col-lg-9">
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" >
            </div>


            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex text-center gap-4">
            {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}

            <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
