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
        {{ Auth::user()->first_name }}
      </a>
    </div>
  </div>
  @endif
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      {{-- <div class="align-items-center justify-content-center">
        <h5 style="color: purple"><strong>Manage</strong></h5>
      </div> --}}

      <li class="nav-item">
        <a class="nav-link" href="{{ route('academic_years.index') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Academic Year</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('courses.index') }}">
          <i class="icon-head menu-icon"></i>
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
        <a class="nav-link" href="">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Grades</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Student Information</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Downloadable Forms</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Requested Documents</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin_announces.index') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Announcements</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">"Virtual Regform"</span>
        </a>
      </li>

    </ul>
  </nav>
