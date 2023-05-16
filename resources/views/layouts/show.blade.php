<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'CvSU Tanza') }}</title>

        <!-- Icon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/Cavite_State_University_(CvSU).png') }}">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=McLaren&family=Poppins:wght@400;500;600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">


        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">

        {{-- Main CSS File --}}
        <link rel="stylesheet" href="{{ asset('css/mainshow.css') }}">
        {{-- Breadcrumb CSS File --}}
        <link href="{{ asset('css/breadcrumbs.css') }}" rel="stylesheet">
        {{-- About CSS File --}}
        <link href="{{ asset('css/history.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mvg.css') }}" rel="stylesheet">
        <link href="{{ asset('css/uniseal.css') }}" rel="stylesheet">
        <link href="{{ asset('css/uniofficials.css') }}" rel="stylesheet">
        <link href="{{ asset('css/campusofficials.css') }}" rel="stylesheet">
        <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
        {{-- Admission CSS File --}}
        <link href="{{ asset('css/admissiomrandp.css') }}" rel="stylesheet">
        <link href="{{ asset('css/programsoffered.css') }}" rel="stylesheet">
        {{-- Administration CSS File --}}
        <link href="{{ asset('css/ocr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/clinic.css') }}" rel="stylesheet">
        <link href="{{ asset('css/cashier.css') }}" rel="stylesheet">
        <link href="{{ asset('css/osas.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dit.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ted.css') }}" rel="stylesheet">
        <link href="{{ asset('css/das.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/hr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mis.css') }}" rel="stylesheet">
        <link href="{{ asset('css/qaac.css') }}" rel="stylesheet">
        <link href="{{ asset('css/researche.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lib.css') }}" rel="stylesheet">
        <link href="{{ asset('css/csg.css') }}" rel="stylesheet">
        <link href="{{ asset('css/acad.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nonacad.css') }}" rel="stylesheet">
</head>
<body class="antialiased">

    @include('incshow.header')

    <main id="main">
        @yield('content')
        @include('incshow.footer')
    </main>
    @include('incshow.scroll-top')
    @include('incshow.script')
</body>
</html>
