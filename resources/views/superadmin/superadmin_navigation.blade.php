

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('superadmin.dashboard') }}" class="logo d-flex align-items-center">
          <img src="{{ asset('img/campus_seal.png') }}" alt="cvsu" class="rounded-circle">
          <div class="d-none d-lg-block" style="margin-left: 10px"><span>Website Admin</span><br><h3>CvSU-TC</h3></div>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    @if (\Route::current()->getName() == 'profile.edit')
      <!-- Settings Dropdown -->
      <nav class="header-nav ms-auto"> 
        <x-dropdown align="right" width="48" class="d-flex align-items-center">
          <x-slot name="trigger">
              <button class="nav-item dropdown pe-3">
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

              </button>
          </x-slot>

          <x-slot name="content">
              <x-dropdown-link :href="route('profile.edit')">
                <i class="bi bi-gear" style="margin-right: 5px"></i>
                  {{ __('Account Settings') }}
              </x-dropdown-link>


              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-dropdown-link :href="route('logout')"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                      <i class="bi bi-box-arrow-right" style="margin-right: 5px"></i>
                      {{ __('Log Out') }}
                  </x-dropdown-link>
              </form>
          </x-slot>
        </x-dropdown>
      </nav><!-- End Icons Navigation -->

    @else
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              @if (empty(Auth::user()->avatar))
                    <img height="90" src="{{ asset('img/default.png') }}" alt="Profile Photo" class="rounded-circle">
                @else
                    <img height="90" src="/avatars/{{ Auth::user()->avatar }}" alt="Profile Photo" class="rounded-circle">
              @endif
              <div>{{ Auth::user()->name }}</div>
              <span class="d-none d-md-block dropdown-toggle ps-2"></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <form method="GET" action="{{ route('superadmin.logout') }}">
                  @csrf

                  <a class="dropdown-item d-flex align-items-center" href="('superadmin.logout')" onclick="event.preventDefault();this.closest('form').submit();">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Logout</span>
                  </a>
                </form>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->
    @endif

</header><!-- End Header -->

