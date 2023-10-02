<!-- ======= Top Bar ======= -->
 <div id="topbar" class="topbar d-flex align-items-center fixed-top">
  <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
    <div class="brand-name align-items-center d-none d-md-flex" id="orgname">
      <a href="#">Cavite State University</a>
    </div>
    <div class="social-links d-flex align-items-center">
      @foreach ($socialmedias as $socialmedia)
        <a href="{{ $socialmedia->link }}" class=""><i class="{{ $socialmedia->icon }}"></i></a>
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
            {{-- <li><a href="admin_qaac">QAAC</a></li> --}}
            <li><a href="admin_research">Research Extension</a></li>
            <li><a href="admin_library">Library</a></li>
            <li><a href="admin_departments">Departments</a></li>

          </ul>
        </li>
        
        <li class="dropdown"><a class="{{ Request::is('services_csg','services_acadorgs','services_nonacadorgs','services_newsandupdates','newsandupdates_news*','services_announcements','announcements*','services_campuscalendar','services_jobvacancies','jobvacancies*') ? 'active' : '' }}" href="#">Services</a>
          <ul>
            <li><a href="services_studentorgs">Student Affairs</a>
            </li>
            <li><a href="services_newsandupdates">News Updates</a></li>
            <li><a href="services_announcements">Announcements</a></li>
            <li><a href="services_campuscalendar">Campus Calendar</a></li>
            <li><a href="services_jobvacancies">Job Vacancies</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#">Portal</a>
          <ul>
            <li><a href="student_login">Student Portal</a></li>
            <li><a href="search">Search</a></li>
          </ul>
        </li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <!-- Default dropstart button -->
    <div class="btn-group dropstart wrapper">
      <div id="campusesButton" type="button" class="button" data-bs-toggle="dropdown" aria-expanded="false">
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

  </div>

  <div class="progress-container">
    <div class="progress-bar" id="bar"></div>
  </div>
  
</header><!-- End Header -->
