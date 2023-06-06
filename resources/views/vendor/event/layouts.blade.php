<!DOCTYPE html>
{{-- <html lang="en"> --}}
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

    {{-- <title>Event</title> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{asset('vendor/event/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/event/css/custom.css')}}" rel="stylesheet"> 
  </head>
  
  <body>
    {{-- <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="{{ url('event') }}">Event</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="{{url('event')}}">Event Calender</a></li>
            <li><a href="{{url('event-list')}}">Event List</a></li>
          </ul>
        </div>
      </div>
    </nav> --}}
    {{-- @include('layouts.navigation')
    @include('incadmin.sidebar') --}}
    {{-- <div class="jumbotron">
      <div class="container">
           @yield('content')      
      </div>
    </div> --}}
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
          <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('img/Cavite_State_University_(CvSU).png') }}" alt="cvsu" class="rounded-circle">
            <span class="d-none d-lg-block">CvSU-TC Admin</span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

      {{-- <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">


            <li class="nav-item dropdown pe-3">

              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="{{ asset('img/profile.jpeg') }}" class="rounded-circle">
                <div>{{ Auth::user()->name }}</div> --}}
                {{-- <span class="d-none d-md-block dropdown-toggle ps-2"></span> --}}
              {{-- </a><!-- End Profile Iamge Icon --> --}}

              {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <a class="dropdown-item d-flex align-items-center" href="('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                          <i class="bi bi-box-arrow-right"></i>
                          <span>Logout</span>
                      </a>
                  </form>
                </li>

              </ul><!-- End Profile Dropdown Items --> --}}
            </li><!-- End Profile Nav -->

          </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link " id="nav_link" href="{{ route('dashboard') }}" active="request()->routeIs('dashboard')">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link " id="nav_link" href="{{url('event')}}">
            <i class="ri-calendar-event-fill"></i>
            <span>Event Calender</span>
          </a>
        </li><!-- End Event Nav -->

        <li class="nav-item">
          <a class="nav-link " id="nav_link" href="{{url('event-list')}}">
            <i class="ri-calendar-todo-fill"></i>
            <span>Event List</span>
          </a>
        </li><!-- End Event Nav -->
        
      </ul>

    </aside><!-- End Sidebar-->

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
  {{-- <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendor/quill/quill.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script> --}}



  <!-- Template Main JS File -->
  <script src="{{ asset('js/adminmain.js') }}"></script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="{{asset('vendor/event/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('vendor/event/js/parsley.js')}}"></script>

      @section('content_script')   
      @show

</body>
</html>
