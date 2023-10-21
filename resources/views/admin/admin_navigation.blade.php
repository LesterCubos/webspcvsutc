<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}"><img src="{{ asset('img/StudentPortal_admin.png') }}" alt="logo" style="height: 50px; width: 170px"/></a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"><img src="{{ asset('img/campus_seal.png') }}" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: #202130; color: #37b246">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-flex mr-4 ">
        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="icon-cog" style="color: #37b246"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
          <a class="dropdown-item preview-item" href="{{ route('admin.profile.edit') }}">
            <i class="icon-head" style="color: #37b246"></i> Profile
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
              <i class="icon-inbox" style="color: #37b246"></i> Logout
            </a>
          </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>