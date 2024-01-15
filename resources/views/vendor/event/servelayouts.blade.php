<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CvSU Tanza') }}</title>

        <!-- Icon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/campus_seal.png') }}">

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
        <link rel="stylesheet" href="{{ asset('css/campuscalendar.css') }}">

        {{-- Breadcrumb CSS File --}}
        <link href="{{ asset('css/breadcrumbs.css') }}" rel="stylesheet">

        {{-- <title>Event</title> --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="{{asset('vendor/event/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/event/css/custom.css')}}" rel="stylesheet"> 
</head>
<body class="antialiased">

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="topbar d-flex align-items-center fixed-top">
    <div class="container align-items-center justify-content-center justify-content-md-between">
      <div class="brand-name align-items-center d-none d-md-flex" id="orgname">
        <a href="#">Cavite State University</a>
      </div>
      <div class="social-links d-flex align-items-center">
        @foreach ($socialmedias as $socialmedia)
          <a href="{{ $socialmedia->link }}" target="_blank"><i class="{{ $socialmedia->icon }}"></i></a>
        @endforeach
      </div>
    </div>
  </div>
  <!-- End Top Bar -->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="/" class="logo me-auto">
        <img src="{{ asset('img/CvsuSeal_logo_edit.png') }}" alt="Logo" width="150" height="50">
      </a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
          <li class="dropdown"><a class="{{ Request::is('about_campus_history', 'about_mvg','about_uni_seal','about_uni_officials','about_campus_officials','about_contact_info') ? 'active' : '' }}" href="#">About</a>
            <ul>
              <li><a href="about_campus_history">Campus History</a></li>
              <li><a href="about_mvg">Vision, Mission, and Quality Policy</a></li>
              <li><a href="about_uni_seal">Campus Seals</a></li>
              <li><a href="about_uni_officials">University Officials</a></li>
              <li><a href="about_campus_officials">Campus Officials</a></li>
              <li><a href="about_contact_info">Contact Information</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="{{ Request::is('admission_requirements_procedure','admission_programs_offered','admission_contact') ? 'active' : '' }}" href="#">Admission</a>
            <ul>
              <li><a href="admission_programs_offered">Undergraduate Programs</a></li>
              {{-- <li><a href="https://apps.cvsu.edu.ph/admission/sign-in/?mibextid=WaXdOe&fbclid=IwAR32WGvGfzwSEg_ueJDQCzqj2fAfqW9FDELSWcIkWi74DnJ_9enCZ9ql0mk">Admission Procedure</a></li> --}}
              <li><a href="admission_requirements_procedure">Admission Procedure</a></li>
              <li><a href="admission_contact">Contact Information</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="{{ Request::is('services_studentorgs','admin_departments','admin_office_registrar','admin_clinic','admin_cashier','admin_osas','admin_dit','admin_ted','admin_das','admin_dom','admin_hr','admin_mis','admin_qaac','admin_research','admin_library') ? 'active' : '' }}" href="#">Administration</a>
            <ul>
              <li><a href="admin_departments">Departments</a></li>
              <li><a href="admin_osas">Office of the Student Affairs Services</a></li>
              <li><a href="admin_office_registrar">Office of the Campus Registrar</a></li>
              <li><a href="admin_clinic">Clinic</a></li>
              {{-- <li><a href="admin_cashier">Cashier</a></li> --}}
              {{-- <li><a href="admin_qaac">QAAC</a></li> --}}
              <li><a href="admin_research">Research & Extension</a></li>
              <li><a href="admin_library">Library</a></li>
              <li><a href="services_studentorgs">Student Organizations</a>
              </li>

            </ul>
          </li>
          
          {{-- <li class="dropdown"><a class="{{ Request::is('services_csg','services_acadorgs','services_nonacadorgs','services_newsandupdates','newsandupdates_news*','services_announcements','announcements*','services_campuscalendar','services_jobvacancies','jobvacancies*') ? 'active' : '' }}" href="#">Services</a>
            <ul>
              <li><a href="services_studentorgs">Student Organizations</a>
              </li>
              <li><a href="services_newsandupdates">News Updates</a></li>
              <li><a href="services_announcements">Announcements</a></li>
              <li><a href="services_campuscalendar">Campus Calendar</a></li>
              <li><a href="services_jobvacancies">Job Vacancies</a></li>
            </ul>
          </li> --}}
          <li class=""><a href="student_login">Student Portal</a>
            {{-- <ul>
              <li><a href="student_login">Student Portal</a></li>
            </ul> --}}
          </li>
          <li class=""><a class="{{ Request::is('services_jobvacancies') ? 'active' : '' }}" href="services_jobvacancies">Careers</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- Default dropstart button -->
      <!--<div class="btn-group dropstart wrapper">-->
      <!--  <div id="campusesButton" type="button" class="button" data-bs-toggle="dropdown" aria-expanded="false">-->
      <!--    <div class="icon"><i class="bi bi-grid-fill"></i></div>-->
      <!--    <span>Campuses</span> -->
      <!--  </div>-->
      <!--  <ul class="dropdown-menu">-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu.edu.ph/" target="_blank">Main Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu.edu.ph/bacoor/" target="_blank">Bacoor Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu.edu.ph/carmona/" target="_blank">Carmona Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu.edu.ph/cavite-city-campus/" target="_blank">Cavite City Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu.edu.ph/general-trias-campus/" target="_blank">General Trias Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu-imus.edu.ph/home/" target="_blank">Imus Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu.edu.ph/maragondon-campus/" target="_blank">Maragondon Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://www.cvsu-naic.edu.ph/" target="_blank">Naic Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu-rosario.edu.ph/" target="_blank">Rosario Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu.edu.ph/silang-campus/" target="_blank">Silang Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="/" target="_blank">Tanza Campus</a></button></li>-->
      <!--    <li><button class="dropdown-item" type="button"><a href="https://cvsu-trececampus.com/" target="_blank">Trece Martires City Campus</a></button></li>-->
      <!--  </ul>-->
      <!--</div>-->

    </div>

    <div class="progress-container">
      <div class="progress-bar" id="bar"></div>
    </div>
    
  </header><!-- End Header -->

  <main id="main" class="main">
    <div id="contain" class="container">

      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs" style="margin-bottom: 20px; margin-top: 130px">
        {{-- <div class="bread d-flex align-items-center"></div> --}}
        <nav>
          <div class="container" style="height: 50px">
            <ol>
              <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
              <li>Services</li>
              <li>Campus Calendar</li>
            </ol>
            {{-- Comment this p tag before living. Issue:views --}}
            <p class="view"><i class='bx bx-bar-chart'></i> <span>{{ $totalViews }}</span> Total Views</p> 
          </div>
        </nav>

      </div><!-- End Breadcrumbs -->

      @yield('content')
    </div>
    <!-- ======= Footer ======= -->
    @include('incshow.footer')

  </main>
    @include('incshow.scroll-top')

    <!--  Main JS File -->
    <script src="{{ asset('vendor/main.js') }}"></script>
    <script src="{{ asset('vendor/new.js') }}"></script>
    {{-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="{{asset('vendor/event/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('vendor/event/js/parsley.js')}}"></script>

    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      @section('content_script')   
      @show

    
</body>
</html>