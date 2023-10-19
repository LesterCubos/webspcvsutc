<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
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
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('superadmin.sp.dashboard')}}">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('superadmin.sp.manage_user_pages.index')}}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Manage Users</span>
        </a>
      </li>

      <li class="nav-item" style="margin-top: 100px">
        <a class="nav-link" href="{{ route('superadmin.dashboard') }}" style="background-color: #37b246">
          <i class="icon-arrow-left menu-icon"></i>
          <span class="menu-title">Go back to Website</span>
        </a>
      </li>
    </ul>
</nav>
