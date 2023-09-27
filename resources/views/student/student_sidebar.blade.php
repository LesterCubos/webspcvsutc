<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #38d838">
    <div class="user-profile">
      {{-- <div class="user-image">
        <img src="{{asset('img/sp/images/faces/superadminpic.png')}}">
      </div> --}}
      <div class="user-name">
        <a>
            {{-- {{ Auth::guard('superadmin')->user()->name }} --}}
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
          <span class="menu-title">Grades</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Request Document</span>
        </a>
      </li>

    </ul>
  </nav>
