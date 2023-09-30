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

  <!-- ======= Header ======= -->
  {{-- @include('incshow.header') --}}
  <div id="topbar" class="topbar d-flex align-items-center">
    <div class="container-xl d-flex justify-content-center justify-content-md-between">
      <div class="brand-name d-flex align-items-center">
        <a>Cavite State University</a>
      </div>

      <div class="social-links d-none d-md-flex align-items-center">
        @foreach ($socialmedias as $socialmedia)
          <a href="{{ $socialmedia->link }}" class=""><i class="{{ $socialmedia->icon }}"></i></a>
        @endforeach
      </div>
      {{-- <div class="login d-none d-md-flex align-items-center">
        @if (Route::has('login'))
                <div class="admin">
                    @auth
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        <span>|</span>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
      </div> --}}

    </div>
  </div>
  <!-- End Top Bar -->

  <header id="header" class="header">

    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div class="logo-header d-flex align-items-center">
        <a href="/" class="logo d-flex align-items-center">
          <img src="{{ asset('img/CvsuSeal_logo_edit.png') }}" alt="Logo" width="150" height="50">
        </a>
      </div>
      <nav id="navbar" class="navbar ms-auto p-2">
        <ul>
          <li><a href="/">Home</a></li>
          <li class="dropdown"><a href="#">About</a>
            <ul>
              <li><a href="about_campus_history">Campus History</a></li>
              <li><a href="about_mvg">Vision, Mission, and Goals</a></li>
              <li><a href="about_uni_seal">University Seals</a></li>
              <li><a href="about_uni_officials">University Officials</a></li>
              <li><a href="about_campus_officials">Campus Officials</a></li>
              <li><a href="about_contact_info">Contact Information</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#">Admission</a>
            <ul>
              <li><a href="admission_requirements_procedure">Admission Requirements and Procedure</a></li>
              <li><a href="admission_programs_offered">Program Offerings</a></li>
              <li><a href="admission_result">Admission Result</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#">Administration</a>
            <ul>
              <li><a href="admin_office_registrar">Office of the Campus Registrar</a></li>
              <li><a href="admin_clinic">Clinic</a></li>
              <li><a href="admin_cashier">Cashier</a></li>
              <li><a href="admin_osas">Office of the Student Affairs Services</a></li>
              <li><a href="admin_dit">Department of Information Technlogy</a></li>
              <li><a href="admin_ted">Teacher Education Department</a></li>
              <li><a href="admin_das">Department of Arts and Sciences</a></li>
              <li><a href="admin_dom">Department of Management</a></li>
              <li><a href="admin_hr">Human Resource Management</a></li>
              <li><a href="admin_mis">Management Information S</a></li>
              <li><a href="admin_qaac">QAAC</a></li>
              <li><a href="admin_research">Research Extension</a></li>
              <li><a href="admin_library">Library</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="{{ Request::is('services_campuscalendar') ? 'active' : '' }}" href="#">Services</a>
            <ul>
              <li class="dropdown"><a href="#">Student Affairs</a>
                <ul>
                  <li><a href="services_csg">Central Student Goverment</a></li>
                  <li><a href="services_acadorgs">Academic Organizations</a></li>
                  <li><a href="services_nonacadorgs">Non-Academic Organizations</a></li>
                </ul>
              </li>
              <li><a href="services_newsandupdates">News and Updates</a></li>
              <li><a href="services_announcements">Announcements</a></li>
              <li><a href="services_campuscalendar">Campus Calendar</a></li>
              <li><a href="services_jobvacancies">Job Vacancies</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#">Portal</a>
            <ul>
              <li><a href="student_login">Student Portal</a></li>

              <li><a href="/login">MIS Portal</a></li>
            </ul>
          </li>

          {{-- <li>
            <form class="d-flex ms-4" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit" id="yellow">Search</button>
            </form>
          </li> --}}

          {{-- <li><span>|</span></li> --}}

        <!-- Default dropstart button -->
        <div class="btn-group dropstart wrapper">
          <div type="button" class="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="icon"><i class="bi bi-grid-fill"></i></div>
            <span>Campuses</span> 
          </div>
          <ul class="dropdown-menu">
            <li><button class="dropdown-item" type="button">Main Campus</button></li>
            <li><button class="dropdown-item" type="button">Bacoor Campus</button></li>
            <li><button class="dropdown-item" type="button">Carmona Campus</button></li>
            <li><button class="dropdown-item" type="button">Cavite City Campus</button></li>
            <li><button class="dropdown-item" type="button">General Trias Campus</button></li>
            <li><button class="dropdown-item" type="button">Imus Campus</button></li>
            <li><button class="dropdown-item" type="button">Maragondon Campus</button></li>
            <li><button class="dropdown-item" type="button">Naic Campus</button></li>
            <li><button class="dropdown-item" type="button">Rosario Campus</button></li>
            <li><button class="dropdown-item" type="button">Silang Campus</button></li>
            <li><button class="dropdown-item" type="button">Tanza Campus</button></li>
            <li><button class="dropdown-item" type="button">Trece Martires City Campus</button></li>
          </ul>
        </div>


        </ul>

        
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>

    <div class="progress-container">
      <div class="progress-bar" id="bar"></div>
  </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main" class="main">
    <div id="contain" class="container">

      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs" style="margin-bottom: 20px">
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
