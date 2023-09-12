<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CvSU Tanza') }}</title>
        <!-- Icon -->
        <link rel="icon" href="{{ asset('img/campus_seal.png') }}">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=McLaren&family=Poppins:wght@400;500;600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">

        <!--  Main CSS File -->
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        

    </head>
    <body>
        <img class="background" src="{{ asset('img/banner1.jpg') }}" alt="">

        <div class="wrapper">
            <div class="form-box login">
                
                <h1>CvSU Tanza Superadmin</h1>
                <div>
                    <form method="POST" action="{{ route('superadmin.login') }}">
                        @csrf
                        
                        @if (Session::has('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session::get('error')}}</strong>
                            </div>
                        @endif
                        <!-- Email Address -->
                        <div>
                                <div class="input-box">
                                    <span class="icon"><i class="bi bi-person-circle"></i></span>
                                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <label>Email</label>
                                </div>
                        </div>
                
                        <!-- Password -->
                        <div>
                            
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
                
                       
                        <input class="btn" name="submit" type="submit" value="Login" />
                
                        <div class="flex items-center justify-end mt-4 forgot-password">
                
                
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                
                        </div>
                    </form>
                </div>

            </div>
        </div>


        
        <script type="text/javascript" src="{{ asset('js/addjs.js') }}"></script>

        <script>
            function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }
        </script>
    </body>
</html>
