
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CvSU Tanza') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Icon -->
    <link rel="icon" href="admin/assets/img/campus_seal.png">

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

</head>
<body>
<img class="background" src="{{ asset('img/banner1.jpg') }}" alt="">

<div class="wrapper">
    <div class="form-box login">
        <h1>CvSU Tanza Admin</h1>
        <form action="{{ route('login.post') }}" method="POST" name="login">
            @csrf
            <div class="input-box">
                <span class="icon"><i class="bi bi-person-circle"></i></span>
                <input type="text" name="username" required />
                <label>Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class="bi bi-shield-lock-fill"></i></span>
                <input type="password" name="password" id="password" required />
                <label>Password</label>
            </div>
            <div class="checkbox">
                <input class="box" type="checkbox" id="remember" onclick="myFunction()">
                <label class="form-check-label" for="check" > Show Password</label>
            </div>
            <input class="btn" name="submit" type="submit" value="Login"/>
        </form>
        <div class="login-register">
            <p>Not registered yet? <a href="{{ route('registration') }}">Register Here</a></p>

        </div>
    </div>
</div>

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
