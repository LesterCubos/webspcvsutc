<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #38d838">
    <div class="card" style="border-radius: 28px; width: 50px; height: 45px">
        <a class="navbar-brand brand-logo" href=""><img src="{{ asset('img/sp/images/campus_seal-removebg-preview.png') }}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href=""><img src="{{ asset('img/sp/images/campus_seal-removebg-preview.png') }}" alt="logo"/></a>

    </div>
  </div>
  
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-image: linear-gradient( #BE1EC8,#ffff );">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu" style="color: #009200"></span>
    </button>
    {{--pansamantagal  --}}
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-flex mr-4 ">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          @if (empty(Auth::user()->avatar))
                <img height="50" src="{{ asset('img/default.png') }}" alt="Profile Photo" class="rounded-circle">
            @else
                <img height="50" src="/avatars/{{ Auth::user()->avatar }}" alt="Profile Photo" class="rounded-circle">
          @endif
          <div>{{ Auth::user()->name }}</div>
          <span class="d-none d-md-block dropdown-toggle ps-2"></span>
        </a><!-- End Profile Iamge Icon -->

        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="icon-cog" style="color: #009200"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          
          <a class="dropdown-item preview-item" href="{{ route('profile.edit') }}">
              <i class="icon-head"></i> Profile
          </a>
           
           <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
              <i class="icon-inbox"></i> Logout
            </a>
          </form>
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>