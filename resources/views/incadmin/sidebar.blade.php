  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" active="request()->routeIs('dashboard')">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <span style="color: green">Manage Pages</span>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('carousel_items','featured_services','discover_tanza_infos','counts','programs','admissions') ? 'collapse active' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house-door"></i><span>Homepage</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content {{ Request::is('carousel_items','featured_services','discover_tanza_infos','counts','programs','admissions') ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">

          <li>
            <a class="{{ Request::is('carousel_items') ? 'active' : '' }}" href="{{ route('carousel_items.index') }}" active="request()->routeIs('carousel_items.index')">
              <i class="bi bi-circle"></i><span>Hero Section</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('featured_services') ? 'active' : '' }}" href="{{ route('featured_services.index') }}">
              <i class="bi bi-circle"></i><span>Featured Services Section</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('discover_tanza_infos') ? 'active' : '' }}" href="{{ route('discover_tanza_infos.index') }}">
              <i class="bi bi-circle"></i><span>Discover Section</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('counts') ? 'active' : '' }}" href="{{ route('counts.index') }}">
              <i class="bi bi-circle"></i><span>Counts Section</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('programs') ? 'active' : '' }}" href="{{ route('programs.index') }}">
              <i class="bi bi-circle"></i><span>Program Section</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admissions') ? 'active' : '' }}" href="{{ route('admissions.index') }}">
              <i class="bi bi-circle"></i><span>Admission Section</span>
            </a>
          </li>
        </ul>
      </li><!-- End homepage Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('campus_history','mvgs','uni_seals','uni_officials','campus_officials','campus_official_infos','contact_infos') ? 'collapse active' : 'collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-info-circle"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content {{ Request::is('campus_history','mvgs','uni_seals','uni_officials','campus_officials','campus_official_infos','contact_infos') ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('campus_history') ? 'active' : '' }}" href="{{ route('campus_history.index') }}">
              <i class="bi bi-circle"></i><span>Campus History</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('mvgs') ? 'active' : '' }}" href="{{ route('mvgs.index') }}">
              <i class="bi bi-circle"></i><span>Vision, Mission, and Goals</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('uni_seals') ? 'active' : '' }}" href="{{ route('uni_seals.index') }}">
              <i class="bi bi-circle"></i><span>University Seals</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('uni_officials') ? 'active' : '' }}" href="{{ route('uni_officials.index') }}">
              <i class="bi bi-circle"></i><span>University Officials</span>
            </a>
          </li>
          <li id="navi" class="nav-item">
            <a id="nlink" class="nav-link {{ Request::is('campus_officials','campus_official_infos') ? 'collapse active' : 'collapsed' }}" data-bs-target="#nav" data-bs-toggle="collapse" href="#">
              <i id="nlink" class="bi bi-circle"></i><span>Campus Officials</span><i id="down" class="bi bi-chevron-down ms-auto"></i>
            </a>
              <ul id="nav" class="{{ Request::is('campus_officials','campus_official_infos') ? 'show' : 'collapse' }}" data-bs-parent="#navi">
                <li>
                  <a class="{{ Request::is('campus_officials') ? 'active' : '' }}" href="{{ route('campus_officials.index') }}">
                    <i class="bi bi-circle"></i><span>Campus Organizational Chart</span>
                  </a>
                </li>
              
                <li>
                  <a class="{{ Request::is('campus_official_infos') ? 'active' : '' }}" href="{{ route('campus_official_infos.index') }}">
                    <i class="bi bi-circle"></i><span>Campus Officials Information</span>
                  </a>
                </li>
              </ul>
          </li>
          <li>
            <a class="{{ Request::is('contact_infos') ? 'active' : '' }}" href="{{ route('contact_infos.index') }}">
              <i class="bi bi-circle"></i><span>Contact Information</span>
            </a>
          </li>
        </ul>
      </li><!-- End About Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('requirements_procedures','programs_offers','admission_results') ? 'collapse active' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Admission</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content {{ Request::is('requirements_procedures','programs_offers','admission_results') ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('requirements_procedures') ? 'active' : '' }}" href="{{ route('requirements_procedures.index')}}">
              <i class="bi bi-circle"></i><span>Admission Requirements and Procedure</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('programs_offers') ? 'active' : '' }}" href="{{ route('programs_offers.index') }}">
              <i class="bi bi-circle"></i><span>Program Offerings</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admission_results') ? 'active' : '' }}" href="{{ route('admission_results.index') }}">
              <i class="bi bi-circle"></i><span>Admission Result</span>
            </a>
          </li>
        </ul>
      </li><!-- End Admission Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bank2"></i><span>Administration</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('office_registrars.index') }}">
              <i class="bi bi-circle"></i><span>Office of the Campus Registrar</span>
            </a>
          </li>
          <li>
            <a href="{{ route('clinics.index') }}">
              <i class="bi bi-circle"></i><span>Clinic</span>
            </a>
          </li>
          <li>
            <a href="{{ route('cashiers.index') }}">
              <i class="bi bi-circle"></i><span>Cashier</span>
            </a>
          </li>
          <li>
            <a href="{{ route('osass.index') }}">
              <i class="bi bi-circle"></i><span>Office of the Student Affairs Services</span>
            </a>
          </li>
          <li>
            <a href="{{ route('dits.index') }}">
              <i class="bi bi-circle"></i><span>Department of Information Technology</span>
            </a>
          </li>

          <li>
            <a href="{{ route('teds.index') }}">
              <i class="bi bi-circle"></i><span>Teacher Education Department</span>
            </a>
          </li>

          <li>
            <a href="{{ route('dass.index') }}">
              <i class="bi bi-circle"></i><span>Department of Arts and Sciences</span>
            </a>
          </li>

          <li>
            <a href="{{ route('doms.index') }}">
              <i class="bi bi-circle"></i><span>Department of Management</span>
            </a>
          </li>

          <li>
            <a href="{{ route('hrs.index') }}">
              <i class="bi bi-circle"></i><span>Human Resource</span>
            </a>
          </li>

          <li>
            <a href="{{ route('mis.index') }}">
              <i class="bi bi-circle"></i><span>MIS</span>
            </a>
          </li>

          <li>
            <a href="{{ route('qaacs.index')}}">
              <i class="bi bi-circle"></i><span>QAAC</span>
            </a>
          </li>

          <li>
            <a href="{{ route('researchs.index') }}">
              <i class="bi bi-circle"></i><span>Research and Extension</span>
            </a>
          </li>
          <li>
            <a href="{{route('libs.index')}}">
              <i class="bi bi-circle"></i><span>Library</span>
            </a>
          </li>


        </ul>
      </li><!-- End Administration Nav -->

     
     

      <li class="nav-item">
        <a class="nav-link {{ Request::is('about_orgs','news','/events','job_vacancies','announcements') ? 'collapse active' : 'collapsed' }}" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="services-nav" class="nav-content {{ Request::is('about_orgs','news','/events','job_vacancies','announcements') ? 'show' : 'collapse' }} " data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('about_orgs') ? 'active' : '' }}" href="{{route('about_orgs.index')}}">
              <i class="bi bi-circle"></i><span>Students Organizations</span>
            </a>
          </li>

          <li>
            <a class="{{ Request::is('news') ? 'active' : '' }}" href="{{ route('news.index') }}">
              <i class="bi bi-circle"></i><span>News Updates</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('announcements') ? 'active' : '' }}" href="{{ route('announcements.index') }}">
              <i class="bi bi-circle"></i><span>Announcements Section</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('/events') ? 'active' : '' }}" href="/events">
              <i class="bi bi-circle"></i><span>Campus Calendar</span>
            </a>
          </li>

          <li>
            <a class="{{ Request::is('job_vacancies') ? 'active' : '' }}" href="{{route('job_vacancies.index')}}">
              <i class="bi bi-circle"></i><span>Job Vacancies</span>
            </a>
          </li>
        </ul>
      </li><!-- End Services Nav -->


      <li class="nav-item">
        <a class="nav-link {{ Request::is('quick_links','other_links','social_media') ? 'collapse active' : 'collapsed' }}" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-settings-3-line"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse {{ Request::is('quick_links','other_links','social_media') ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('quick_links') ? 'active' : '' }}" href="{{ route('quick_links.index') }}">
              <i class="bi bi-circle"></i><span>Quick links</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('other_links') ? 'active' : '' }}" href="{{ route('other_links.index')}}">
              <i class="bi bi-circle"></i><span>Other Links</span>
            </a>
          </li>

          <li>
            <a class="{{ Request::is('social_media') ? 'active' : '' }}" href="{{ route('social_media.index')}}">
              <i class="bi bi-circle"></i><span>Social Media Links</span>
            </a>
          </li>

        </ul>
      </li><!-- End Settings Nav -->



      


    </ul>

  </aside><!-- End Sidebar-->
