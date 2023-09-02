<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />



    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            {{-- <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                <div class="input-box">
                    <span class="icon"><i class="bi bi-person-circle"></i></span>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <label>Email</label>
                </div>
        </div>

        <!-- Password -->
        <div>
            {{-- <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                <div class="input-box">
                    <span class="icon"><i class="bi bi-shield-lock-fill"></i></span>
                    <input type="password" name="password" id="password" required autocomplete="current-password" />
                    <label>Password</label>
                </div>
        </div>
        <!-- Show Password -->
        <div class="checkbox">
            <input class="box" type="checkbox" id="remember" onclick="myFunction()">
            <label class="form-check-label" for="check" > Show Password</label>
        </div>

        <!-- Remember Me -->
        {{-- <div class="checkbox" >
            <input id="remember_me" type="checkbox" class="box" name="remember">
            <label for="remember_me" class="inline-flex items-center">{{ __('Remember me') }}</label>
        </div> --}}

        {{-- <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button> --}}
        <input class="btn" name="submit" type="submit" value="Login" />

        <div class="flex items-center justify-end mt-4 forgot-password">


            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

        </div>
    </form>
</x-guest-layout>
