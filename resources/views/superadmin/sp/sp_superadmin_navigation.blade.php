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
