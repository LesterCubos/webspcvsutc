<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  @if (\Route::current()->getName() == 'admin.profile.edit')
  @else
  <div class="user-profile">
    <div class="user-image">
      @if (empty(Auth::user()->avatar))
        <img src="{{ asset('img/default.png') }}" alt="Profile Photo">
      @else
        <img src="/avatars/{{ Auth::user()->avatar }}" alt="Profile Photo">
      @endif
    </div>
    <div class="user-name">
      <a>
        {{ Auth::user()->firstName }}
      </a>
    </div>
    <div class="user-designation">
      {{ Auth::user()->role }}
    </div>
  </div>
  @endif
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-columns-gap menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      {{-- <div class="align-items-center justify-content-center">
        <h5 style="color: purple"><strong>Manage</strong></h5>
      </div> --}}

      <li class="nav-item">
        <a class="nav-link" href="{{ route('academic_years.index') }}">
          <i class="bi bi-calendar2-event menu-icon"></i>
          <span class="menu-title">Academic Years</span>
        </a>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('semesters.index') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Semesters</span>
        </a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link" href="{{ route('courses.index') }}">
          <i class="bi bi-journal-bookmark-fill menu-icon"></i>
          <span class="menu-title">Courses</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.instructor_page_switch.index') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Instructor Page</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin_grades.index') }}">
          <i class="bi bi-award menu-icon"></i>
          <span class="menu-title">Grades</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('student_informations.index') }}">
          <i class="bi bi-person-lines-fill menu-icon"></i>
          <span class="menu-title">Student Information</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('downloadable_forms.index') }}">
          <i class="bi bi-file-earmark-post menu-icon"></i>
          <span class="menu-title">Downloadable Forms</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('requestdocs.index') }}">
          <i class="bi bi-folder2 menu-icon"></i>
          <span class="menu-title">Requested Documents</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin_announces.index') }}">
          <i class="bi bi-newspaper menu-icon"></i>
          <span class="menu-title">Announcements</span>
        </a>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link" href="">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Virtual Regform</span>
        </a>
      </li> --}}

    </ul>
  </nav>
