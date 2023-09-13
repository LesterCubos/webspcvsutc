  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('superadmin/dashboard')) ? 'active' : '' }}" href="{{ route('superadmin.dashboard') }}" active="request()->routeIs('superadmin.dashboard')">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <span style="color: green">Manage Pages</span>
      <li class="nav-item">
        <a class="nav-link {{ (request()->is('superadmin/carousel_items*','superadmin/featured_services*','superadmin/discover_tanza_infos*','superadmin/counts*','superadmin/programs','superadmin/programs/*','superadmin/admissions*','superadmin/section*')) ? 'collapse active' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house-door"></i><span>Homepage</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content {{ (request()->is('superadmin/carousel_items*','superadmin/featured_services*','superadmin/discover_tanza_infos*','superadmin/counts*','superadmin/programs','superadmin/programs/*','superadmin/admissions*','superadmin/section*')) ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">

          <li>
            <a class="{{ (request()->is('superadmin/carousel_items*')) ? 'active' : '' }}" href="{{ route('carousel_items.index') }}" active="request()->routeIs('carousel_items.index')">
              <i class="bi bi-circle"></i><span>Hero Section</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/featured_services*')) ? 'active' : '' }}" href="{{ route('featured_services.index') }}">
              <i class="bi bi-circle"></i><span>Featured Services Section</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/discover_tanza_infos*')) ? 'active' : '' }}" href="{{ route('discover_tanza_infos.index') }}">
              <i class="bi bi-circle"></i><span>Discover Section</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/counts*')) ? 'active' : '' }}" href="{{ route('counts.index') }}">
              <i class="bi bi-circle"></i><span>Counts Section</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/programs','superadmin/programs/*')) ? 'active' : '' }}" href="{{ route('programs.index') }}">
              <i class="bi bi-circle"></i><span>Program Section</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/admissions*')) ? 'active' : '' }}" href="{{ route('admissions.index') }}">
              <i class="bi bi-circle"></i><span>Admission Section</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/section*')) ? 'active' : '' }}" href="{{ route('section_switch.index') }}">
              <i class="bi bi-circle"></i><span>Section Switch</span>
            </a>
          </li>
        </ul>
      </li><!-- End homepage Nav -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('superadmin/campus_history*','superadmin/mvgs*','superadmin/uni_seals*','superadmin/uni_officials*','superadmin/campus_officials*','superadmin/campus_official_infos*','superadmin/contact_infos*')) ? 'collapse active' : 'collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-info-circle"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content {{ (request()->is('superadmin/campus_history*','superadmin/mvgs*','superadmin/uni_seals*','superadmin/uni_officials*','superadmin/campus_officials*','superadmin/campus_official_infos*','superadmin/contact_infos*')) ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ (request()->is('superadmin/campus_history*')) ? 'active' : '' }}" href="{{ route('campus_history.index') }}">
              <i class="bi bi-circle"></i><span>Campus History</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/mvgs*')) ? 'active' : '' }}" href="{{ route('mvgs.index') }}">
              <i class="bi bi-circle"></i><span>Vision, Mission, and Goals</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/uni_seals*')) ? 'active' : '' }}" href="{{ route('uni_seals.index') }}">
              <i class="bi bi-circle"></i><span>University Seals</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/uni_officials*')) ? 'active' : '' }}" href="{{ route('uni_officials.index') }}">
              <i class="bi bi-circle"></i><span>University Officials</span>
            </a>
          </li>
          <li id="navi" class="nav-item">
            <a id="nlink" class="nav-link {{ (request()->is('superadmin/campus_officials*','superadmin/campus_official_infos*')) ? 'collapse active' : 'collapsed' }}" data-bs-target="#nav" data-bs-toggle="collapse" href="#">
              <i id="nlink" class="bi bi-circle"></i><span>Campus Officials</span><i id="down" class="bi bi-chevron-down ms-auto"></i>
            </a>
              <ul id="nav" class="{{ (request()->is('superadmin/campus_officials*','superadmin/campus_official_infos*')) ? 'show' : 'collapse' }}" data-bs-parent="#navi">
                <li>
                  <a class="{{ (request()->is('superadmin/campus_officials*')) ? 'active' : '' }}" href="{{ route('campus_officials.index') }}">
                    <i class="bi bi-circle"></i><span>Campus Organizational Chart</span>
                  </a>
                </li>
              
                <li>
                  <a class="{{ (request()->is('superadmin/campus_official_infos*')) ? 'active' : '' }}" href="{{ route('campus_official_infos.index') }}">
                    <i class="bi bi-circle"></i><span>Campus Officials Information</span>
                  </a>
                </li>
              </ul>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/contact_infos*')) ? 'active' : '' }}" href="{{ route('contact_infos.index') }}">
              <i class="bi bi-circle"></i><span>Contact Information</span>
            </a>
          </li>
        </ul>
      </li><!-- End About Nav -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('superadmin/requirements_procedures*','superadmin/programs_offers*','superadmin/admission_results*')) ? 'collapse active' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Admission</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content {{ (request()->is('superadmin/requirements_procedures*','superadmin/programs_offers*','superadmin/admission_results*')) ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ (request()->is('superadmin/requirements_procedures*')) ? 'active' : '' }}" href="{{ route('requirements_procedures.index')}}">
              <i class="bi bi-circle"></i><span>Admission Requirements and Procedure</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/programs_offers*')) ? 'active' : '' }}" href="{{ route('programs_offers.index') }}">
              <i class="bi bi-circle"></i><span>Program Offerings</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/admission_results*')) ? 'active' : '' }}" href="{{ route('admission_results.index') }}">
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
        <a class="nav-link {{ (request()->is('superadmin/about_orgs*','superadmin/news*','superadmin/events*','superadmin/job_vacancies*','superadmin/announcements*')) ? 'collapse active' : 'collapsed' }}" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="services-nav" class="nav-content {{ (request()->is('superadmin/about_orgs*','superadmin/news*','superadmin/events*','superadmin/job_vacancies*','superadmin/announcements*')) ? 'show' : 'collapse' }} " data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ (request()->is('superadmin/about_orgs*')) ? 'active' : '' }}" href="{{route('about_orgs.index')}}">
              <i class="bi bi-circle"></i><span>Students Organizations</span>
            </a>
          </li>

          <li>
            <a class="{{ (request()->is('superadmin/news*')) ? 'active' : '' }}" href="{{ route('news.index') }}">
              <i class="bi bi-circle"></i><span>News Updates</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/announcements*')) ? 'active' : '' }}" href="{{ route('announcements.index') }}">
              <i class="bi bi-circle"></i><span>Announcements Section</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/events*')) ? 'active' : '' }}" href="superadmin/events">
              <i class="bi bi-circle"></i><span>Campus Calendar</span>
            </a>
          </li>

          <li>
            <a class="{{ (request()->is('superadmin/job_vacancies*')) ? 'active' : '' }}" href="{{route('job_vacancies.index')}}">
              <i class="bi bi-circle"></i><span>Job Vacancies</span>
            </a>
          </li>
        </ul>
      </li><!-- End Services Nav -->


      <li class="nav-item">
        <a class="nav-link {{ (request()->is('superadmin/quick_links*','superadmin/other_links*','superadmin/social_media*')) ? 'collapse active' : 'collapsed' }}" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-settings-3-line"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse {{ (request()->is('superadmin/quick_links*','superadmin/other_links*','superadmin/social_media*')) ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ (request()->is('superadmin/quick_links*')) ? 'active' : '' }}" href="{{ route('quick_links.index') }}">
              <i class="bi bi-circle"></i><span>Quick links</span>
            </a>
          </li>
          <li>
            <a class="{{ (request()->is('superadmin/other_links*')) ? 'active' : '' }}" href="{{ route('other_links.index')}}">
              <i class="bi bi-circle"></i><span>Other Links</span>
            </a>
          </li>

          <li>
            <a class="{{ (request()->is('superadmin/social_media*')) ? 'active' : '' }}" href="{{ route('social_media.index')}}">
              <i class="bi bi-circle"></i><span>Social Media Links</span>
            </a>
          </li>

        </ul>
      </li><!-- End Settings Nav -->

      {{-- for portaal --}}
      <li class="nav-item">
        <a class="nav-link {{ (request()->is('sp/dashboard*')) ? 'collapse active' : 'collapsed' }}" data-bs-target="#portal-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-admin-fill"></i><span>Portal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="portal-nav" class="nav-content collapse {{ (request()->is('sp/dashboard*')) ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ (request()->is('sp/dashboard*')) ? 'active' : '' }}" href="{{ route('sp/dashboard') }}">
              <i class="bi bi-circle"></i><span>Student Portal</span>
            </a>
          </li>
          

        </ul>
      </li><!-- End Portal Nav -->

      


    </ul>

  </aside><!-- End Sidebar-->
