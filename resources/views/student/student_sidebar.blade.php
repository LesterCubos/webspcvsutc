<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #963FC1">
  @if (\Route::current()->getName() == 'student.profile.edit')
  <div class="user-profile">
    
    <div class="user-name" style="font-size: 18px">
      <a>
        {{ Auth::user()->firstName }}
      </a>
    </div>
    <div class="user-designation">
      {{ Auth::user()->studentNumber }}
    </div>
  </div>
  @else
  <div class="user-profile">
    <div class="user-image">
      @if (empty(Auth::user()->avatar))
        <img src="{{ asset('img/default.png') }}" alt="Profile Photo">
      @else
        <img src="/avatars/{{ Auth::user()->avatar }}" alt="Profile Photo">
      @endif
    </div>
    <div class="user-name" style="font-size: 18px">
      <a>
        {{ Auth::user()->firstName }}
      </a>
    </div>
    <div class="user-designation">
      {{ Auth::user()->studentNumber }}
    </div>
  </div>
  @endif
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('student.dashboard') }}">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      {{-- <div class="align-items-center justify-content-center">
        <h5 style="color: purple"><strong>Manage</strong></h5>
      </div> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('student.student_information') }}">
          <i class="bi bi-person-lines-fill menu-icon"></i>
          <span class="menu-title">Student Information</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('student.student_grade') }}">
          <i class="bi bi-award menu-icon"></i>
          <span class="menu-title">Grades</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('student.virtual_regform') }}">
          <i class="bi bi-file-earmark-post-fill menu-icon"></i>
          <span class="menu-title">Virtual RegForm</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('student.downloadable_forms') }}">
          <i class="bi bi-file-earmark-text-fill menu-icon"></i>
          <span class="menu-title">Downloadable Forms</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('request_docs.index') }}">
          <i class="bi bi-folder2 menu-icon"></i>
          <span class="menu-title">Request Document</span>
        </a>
      </li>

    </ul>
  </nav>
