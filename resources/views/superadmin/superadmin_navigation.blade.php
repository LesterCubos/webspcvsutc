

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('superadmin.dashboard') }}" class="logo d-flex align-items-center">
          <img src="{{ asset('img/campus_seal.png') }}" alt="cvsu" class="rounded-circle">
          <span class="d-none d-lg-block">CvSU-TC Website Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        {{-- <ul class="d-flex align-items-center">


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

        </ul> --}}
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
                  
                </a><!-- End Profile Iamge Icon -->

              </button>
          </x-slot>

          <x-slot name="content">
              <x-dropdown-link :href="route('profile.edit')">
                  {{ __('Profile') }}
              </x-dropdown-link>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-dropdown-link :href="route('logout')"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                      {{ __('Log Out') }}
                  </x-dropdown-link>
              </form>
          </x-slot>
        </x-dropdown>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

