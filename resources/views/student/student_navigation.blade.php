<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #963FC1">
    <a class="navbar-brand brand-logo" href="{{ route('student.dashboard') }}"><img src="{{ asset('img/StudentPortal_admin.png') }}" alt="logo" style="height: 50px; width: 170px"/></a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('student.dashboard') }}"><img src="{{ asset('img/campus_seal.png') }}" alt="logo"/></a>
  </div>
    
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: #202130; color: #37b246">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu" style="color: #009200"></span>
      </button>
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item d-none d-lg-block">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" style="background-color: #202130; border-color: #202130; font-size: 18px; color: white; font-weight: bold">
                <span class="mdi mdi-calendar-clock" style="font-size: 18px; color: #ec37fc; margin-right: 5px"></span>
                @foreach ($legends as $legend)
                  {{ $legend->schoolyear }}
                @endforeach
                {{-- @foreach ($acadyears as $acadyear)
                  {{ $acadyear->name }}
                @endforeach --}}
              </span>
            </div>
          </div>
        </li>
      </ul>
      {{--pansamantagal  --}}
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown d-flex mr-4 ">
  
          <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="icon-cog" style="color: #009200"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            
            <a class="dropdown-item preview-item" href="{{ route('student.profile.edit') }}">
                <i class="icon-head" style="color: #37b246"></i> Account Settings
            </a>
             
             <form method="POST" action="{{ route('logout') }}">
              @csrf
  
              <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                <i class="bx bx-log-out-circle" style="color: #37b246"></i> Logout
              </a>
            </form>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>