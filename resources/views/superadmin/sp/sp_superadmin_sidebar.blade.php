<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
      <div class="user-image">
        @if (empty(Auth::user()->avatar))
          <img height="90" src="{{ asset('img/default.png') }}" alt="Profile Photo">
        @else
          <img height="90" src="/avatars/{{ Auth::user()->avatar }}" alt="Profile Photo" style="height: 70px; width: 70px">
        @endif
      </div>
      <div class="user-name">
        <a>
          {{ Auth::user()->name }}
        </a>
      </div>
      
    </div>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      {{-- <div class="align-items-center justify-content-center">
        <h5 style="color: purple"><strong>Manage</strong></h5>
      </div> --}}

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Manage Users</span>
        </a>
      </li>

      <li class="nav-item" style="margin-top: 100px">
        <a class="nav-link" href="{{ route('superadmin.dashboard') }}">
          <i class="icon-arrow-left menu-icon"></i>
          <span class="menu-title">Go back to Website</span>
        </a>
      </li>

    </ul>
  </nav>
