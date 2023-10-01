<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #38d838">
        <div class="card" style="border-radius: 28px; width: 50px; height: 46px">
            <a class="navbar-brand brand-logo" href="{{ route('superadmin.sp.dashboard')}}"><img src="{{ asset('img/campus_seal.png') }}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('superadmin.sp.dashboard')}}"><img src="{{ asset('img/campus_seal.png') }}" alt="logo"/></a>

        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-image: linear-gradient( #BE1EC8,#ffff );">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu" style="color: #009200"></span>
      </button>
      {{-- <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
          </div>
        </li>
      </ul> --}}
      <ul class="navbar-nav navbar-nav-right">
         
        <li class="nav-item dropdown mr-4 d-lg-flex d-none">
                <!-- Authentication Links -->
                        {{-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else --}}

                        {{-- {{ Auth::guard('superadmin')->user()->name }} --}}

        </li>
        <li class="nav-item dropdown d-flex mr-4 ">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (empty(Auth::user()->avatar))
                  <img height="90" src="{{ asset('img/default.png') }}" alt="Profile Photo" class="rounded-circle">
              @else
                  <img height="90" src="/avatars/{{ Auth::user()->avatar }}" alt="Profile Photo" class="rounded-circle">
            @endif
            <div>{{ Auth::user()->name }}</div>
            <div class="ml-1">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div>
          </a><!-- End Profile Iamge Icon -->
          <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="icon-cog" style="color: #009200"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
            <a class="dropdown-item preview-item">
                <i class="icon-head"></i> Profile
            </a>
            <a class="dropdown-item preview-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">

             <i class="icon-inbox"></i> Logout

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
          </div>
        </li>
        {{-- @endguest --}}
        {{-- <li class="nav-item dropdown mr-4 d-lg-flex d-none">
          <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
            <i class="icon-grid"></i>
          </a>
        </li> --}}
      </ul>
      {{-- <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button> --}}
    </div>
  </nav>
