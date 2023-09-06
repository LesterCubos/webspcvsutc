<!-- ======= Header ======= -->
<section id="topbar" class="topbar d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="brand-name d-flex align-items-center" id="orgname">
      <a href="#">Cavite State University</a>
    </div>

    <div class="social-links d-none d-md-flex align-items-center">
      @foreach ($socialmedias as $socialmedia)
        <a href="{{ $socialmedia->link }}" class=""><i class="{{ $socialmedia->icon }}"></i></a>
      @endforeach
    </div>
    {{-- <div class="d-none d-md-flex align-items-center">
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
</section>
<!-- End Top Bar -->

<header id="header" class="header">

  <div class="container-fluid d-flex align-items-center justify-content-between">
    <div class="logo-header d-flex align-items-center">
      <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset('img/CvsuSeal_logo_edit.png') }}" alt="Logo" width="150" height="50">
      </a>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
        <li class="dropdown"><a class="{{ Request::is('about_campus_history', 'about_mvg','about_uni_seal','about_uni_officials','about_campus_officials','about_contact_info') ? 'active' : '' }}" href="#">About</a>
          <ul>
            <li><a href="about_campus_history">Campus History</a></li>
            <li><a href="about_mvg">Vision, Mission, and Goals</a></li>
            <li><a href="about_uni_seal">University Seals</a></li>
            <li><a href="about_uni_officials">University Officials</a></li>
            <li><a href="about_campus_officials">Campus Officials</a></li>
            <li><a href="about_contact_info">Contact Information</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="{{ Request::is('admission_requirements_procedure','admission_programs_offered','admission_result') ? 'active' : '' }}" href="#">Admission</a>
          <ul>
            <li><a href="admission_requirements_procedure">Admission Requirements and Procedure</a></li>
            <li><a href="admission_programs_offered">Program Offerings</a></li>
            <li><a href="admission_result">Admission Result</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="{{ Request::is('admin_office_registrar','admin_clinic','admin_cashier','admin_osas','admin_dit','admin_ted','admin_das','admin_dom','admin_hr','admin_mis','admin_qaac','admin_research','admin_library') ? 'active' : '' }}" href="#">Administration</a>
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
        {{-- <li class="dropdown"><a href="#">Instruction</a>
          <ul>
            <li><a href="/DeptInfoTech">Department of Information Technlogy</a></li>
            <li><a href="#">Teacher Education Department</a></li>
            <li><a href="#">Department of Arts and Sciences</a></li>
            <li><a href="#">Department of Management</a></li>
          </ul>
        </li> --}}
        <li class="dropdown"><a class="{{ Request::is('services_csg','services_acadorgs','services_nonacadorgs','services_newsandupdates','newsandupdates_news*','services_announcements','announcements*','services_campuscalendar','services_jobvacancies','jobvacancies*') ? 'active' : '' }}" href="#">Services</a>
          <ul>
            <li class="dropdown"><a href="#">Student Affairs</a>
              <ul>
                <li><a href="services_csg">Central Student Goverment</a></li>
                <li><a href="services_acadorgs">Academic Organizations</a></li>
                <li><a href="services_nonacadorgs">Non-Academic Organizations</a></li>
              </ul>
            </li>
            <li><a href="services_newsandupdates">News Updates</a></li>
            <li><a href="services_announcements">Announcements</a></li>
            <li><a href="services_campuscalendar">Campus Calendar</a></li>
            <li><a href="services_jobvacancies">Job Vacancies</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#">Portal</a>
          <ul>
            <li><a href="#">Student Portal</a></li>

            <li><a href="/superadmin/login">MIS Portal</a></li>
            <li><a href="search">Search</a></li>
          </ul>
        </li>

        <li>
          <form class="d-flex ms-4" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" id="yellow">Search</button>
          </form>
        </li>
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
