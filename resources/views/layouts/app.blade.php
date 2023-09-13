<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CvSU-TC Student Portal</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
     <!-- Google Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=McLaren&family=Poppins:wght@400;500;600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">


    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('vendors/sp/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sp/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sp/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/sp/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/sp/campus_seal.jpg') }}" />
    {{-- <link type="image/png" rel="shortcut icon" href="{{ asset('Cavite_State_University_(CvSU).png') }}" /> --}}


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        <main>
            @yield('content')
        </main>
    </div>

    <!-- base:js -->
    <script src="{{ asset('vendors/sp/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('js/sp/off-canvas.js') }}"></script>
    <script src="{{ asset('js/sp/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/sp/template.js') }}"></script>
    <!-- endinject -->


</body>
</html>
