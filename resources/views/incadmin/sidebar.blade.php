  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}" active="request()->routeIs('dashboard')">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house-door"></i><span>Homepage</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <li>
                <a href="{{ route('switch.index') }}">
                  <i class="bi bi-circle"></i><span>Switch Control Section</span>
                </a>
              </li>
          <li>
            <a href="{{ route('carousel_items.index') }}" active="request()->routeIs('carousel_items.index')">
              <i class="bi bi-circle"></i><span>Hero Section</span>
            </a>
          </li>
          <li>
            <a href="{{ route('featured_services.index') }}">
              <i class="bi bi-circle"></i><span>Featured Services Section</span>
            </a>
          </li>
          <li>
            <a href="{{ route('discover_tanza_infos.index') }}">
              <i class="bi bi-circle"></i><span>Discover Section</span>
            </a>
          </li>
          <li>
            <a href="{{ route('counts.index') }}">
              <i class="bi bi-circle"></i><span>Counts Section</span>
            </a>
          </li>
          <li>
            <a href="{{ route('programs.index') }}">
              <i class="bi bi-circle"></i><span>Program Section</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admissions.index') }}">
              <i class="bi bi-circle"></i><span>Admission Section</span>
            </a>
          </li>
          <li>
            <a href="{{ route('news.index') }}">
              <i class="bi bi-circle"></i><span>News and Updates Section</span>
            </a>
          </li>
          <li>
            <a href="{{ route('announcements.index') }}">
              <i class="bi bi-circle"></i><span>Announcements Section</span>
            </a>
          </li>
          <li>
            <a href="{{ route('events.index') }}">
              <i class="bi bi-circle"></i><span>Events Section</span>
            </a>
          </li>
        </ul>
      </li><!-- End homepage Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-info-circle"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('campus_history.index') }}">
              <i class="bi bi-circle"></i><span>Campus History</span>
            </a>
          </li>
          <li>
            <a href="{{ route('mvgs.index') }}">
              <i class="bi bi-circle"></i><span>Vision, Mission, and Goals</span>
            </a>
          </li>
          <li>
            <a href="{{ route('uni_seals.index') }}">
              <i class="bi bi-circle"></i><span>University Seals</span>
            </a>
          </li>
          <li>
            <a href="{{ route('uni_officials.index') }}">
              <i class="bi bi-circle"></i><span>University Officials</span>
            </a>
          </li>
          <li>
            <a href="{{ route('campus_officials.index') }}">
              <i class="bi bi-circle"></i><span>Campus Officials</span>
            </a>
          </li>
          <li>
            <a href="{{ route('contact_infos.index') }}">
              <i class="bi bi-circle"></i><span>Contact Information</span>
            </a>
          </li>
        </ul>
      </li><!-- End About Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-check"></i><span>Admission</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Admission Requirements and Procedure</span>
            </a>
          </li>
          <li>
            <a href="{{ route('programs_offers.index') }}">
              <i class="bi bi-circle"></i><span>Program Offerings</span>
            </a>
          </li>
          <li>
            <a href="/viewstudentreg.php">
              <i class="bi bi-circle"></i><span>Admission Result</span>
            </a>
          </li>
        </ul>
      </li><!-- End Admission Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-arrow-up-short"></i><span>Administration</span><i class="bi bi-chevron-down ms-auto"></i>
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
            <a href="">
              <i class="bi bi-circle"></i><span>Department of Information Technlogy</span>
            </a>
          </li>

          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Teacher Education Department</span>
            </a>
          </li>

          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Department of Arts and Sciences</span>
            </a>
          </li>

          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Department of Management</span>
            </a>
          </li>

          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>QAAC</span>
            </a>
          </li>

          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Research and Extension</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Library</span>
            </a>
          </li>


        </ul>
      </li><!-- End Administration Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#instruction-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-border-all"></i><span>Instruction</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="instruction-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="viewcalendar.php">
              <i class="bi bi-circle"></i><span>Department of Information Technlogy</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Teacher Education Department</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Department of Arts and Sciences</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Department of Management</span>
            </a>
          </li>


        </ul>
      </li><!-- End Instruction Nav --> --}}

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart-dash"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="services-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


              <li class="">
                <a href="#">
                     <i class="bi bi-circle"></i><span>Student Affairs</span>
                </a>

                <ul>
                  <li><a href="#"><i class="bi bi-circle"></i> Student Goverment</a></li>
                  <li><a href="#"><i class="bi bi-circle"></i>Academic Organizations</a></li>
                </ul>
              </li>

          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>CvSU Events</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>News and Updates</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Announcement</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Campus Calendar</span>
            </a>
          </li>


        </ul>
      </li><!-- End Services Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#portal-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-window"></i><span>Portal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="portal-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Student Portal</span>
            </a>
          </li>

        </ul>
      </li><!-- End Portal Nav -->


      <!-- <li class="nav-heading">Pages</li> -->



      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="coursesubject.php">
          <i class="bi bi-envelope"></i>
          <span>Course Subjects</span>
        </a>
      </li>End Course Subjects Page Nav -->

      <!-- <li class="nav-item">s
        <a class="nav-link collapsed" href="academicyear.php">
          <i class="bi bi-envelope"></i>
          <span>Academic Year</span>
        </a>
      </li>End Academic Year Page Nav-->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="managedocs.php">
          <i class="bi bi-person"></i>
          <span>Manage Document Requests</span>
        </a>
      </li>End Manage Document Requests Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="manageannouncement.php">
          <i class="bi bi-question-circle"></i>
          <span>Manage Announcements</span>
        </a>
      </li>End Manage AnnouncementsPage Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="downloadable.php">
          <i class="bi bi-envelope"></i>
          <span>Downloadable Forms</span>
        </a>
      </li>End Downloadable Forms Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
