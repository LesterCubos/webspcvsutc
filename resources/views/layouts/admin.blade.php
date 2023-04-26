<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CvSU-TC Admin</title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset('img/Cavite_State_University_(CvSU).png') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css')}}" rel="stylesheet">

    {{-- Preconnect Links  --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Heebo:wght@300;400&display=swap" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/adminstyle.css') }}" rel="stylesheet">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
      <!-- include summernote css/js -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- include summernote css/js-->
     {{-- <link href="{{ asset('css/summernote-bs4.css')}}" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> --}}

</head>
<body>

    @include('layouts.navigation')
    @include('incadmin.sidebar')

    <main class="main" id="main">
        @yield('content')
    </main>
    <footer id="footer" class="footer">
        <div class="copyright">
          &copy; Copyright <strong><span>CVSU Tanza Campus</span></strong>. All Rights Reserved <?php echo date("Y.");?>
        </div>

    </footer><!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>


    <script src="{{ asset('js/summernote-bs4.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/adminmain.js') }}"></script>
</body>
</html>
