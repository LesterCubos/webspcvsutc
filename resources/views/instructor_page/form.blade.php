<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CvSU Instructor Page</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('vendor/sp/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sp/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sp/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/sp/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sp/addstyle.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('img/campus_seal.png') }}" />

  </head>
  
  <body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}"><img src="{{ asset('img/studentportal_instructor.png') }}" alt="logo" style="height: 50px; width: 170px"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: #202130; color: #37b246">
              <ul class="navbar-nav mr-lg-2">
                <li class="nav-item d-none d-lg-block">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background-color: #202130; border-color: #202130; font-size: 18px; color: white; font-weight: bold">
                        <span class="mdi mdi-calendar-clock" style="font-size: 18px; color: #ec37fc; margin-right: 5px"></span>
                        @foreach ($acadyears as $acadyear)
                          {{ $acadyear->name }}
                        @endforeach
                      </span>
                    </div>
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item d-flex mr-4 ">
                  <form method="POST" action="{{ route('instructor_page.logout') }}">
                    @csrf
                  <a class="nav-link count-indicator d-flex align-items-center justify-content-center" href="{{ route('instructor_page.logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                    <span class="mdi mdi-logout" style="color: #37b246; font-size: 30px"></span>
                  </a>
                  </form>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
              </button>
            </div>
        </nav>
        <div class="page-body-wrapper">
            <div class="main-panel" style="height: 100%; width: 100%">
                <div class="content-wrapper" style="background-image: url('/img/bg_admin.png'); background-repeat: no-repeat; background-size: 100% 100%;">
                    <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="150px" style="float: right; padding-top: 0"/>
                    <div class="pagetitle">
                        <h1>Grades</h1>
                        <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" style="font-weight: 700">{{ isset($grade) ? 'Edit' : 'Add' }} Grades</li>
                        </ol>
                        </nav>
                    </div><!-- End Page Title -->
                
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card" style="border-radius: 10px; margin-top: 30px">
                            <div class="card-body">
                                <form method="post" action="{{ isset($grade) ? route('grades.update', $grade->id) : route('grades.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    {{-- add @method('put') for edit mode --}}
                                    @isset($grade)
                                        @method('put')
                                    @endisset
                                    <br>
                                    <div class="form-group">
                                        <label for="student_number">Student Number:</label>
                                        <input type="number" class="form-control  @error('student_number') is-invalid @enderror" id="student_number" name="student_number" value="{{ $grade->student_number ?? old('student_number') }}" placeholder="Input Student Number">
                                        @error('student_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="grade">Grade:</label>
                                        <input type="number" class="form-control  @error('grade') is-invalid @enderror" id="grade" name="grade" value="{{ $grade->grade ?? old('grade') }}" placeholder="Input Grade">
                                        @error('grade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="remarks">Remarks:</label>
                                        <input type="text" name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror" value="{{ $grade->remarks ?? old('remarks') }}" placeholder="Input Remarks">
                                        @error('remarks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="year_level">Year Level:</label>
                                        <select type="text" id="year_level" name="year_level" class="form-control @error('year_level') is-invalid @enderror" value="{{ old('year_level') }}" required>
                                            <option value="First Year" {{ old('year_level') == 'First Year' ? 'selected' : '' }}>First Year</option>
                                            <option value="Second Year" {{ old('year_level') == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                                            <option value="Third Year" {{ old('year_level') == 'Third Year' ? 'selected' : '' }}>Third Year</option>
                                            <option value="Fourth Year" {{ old('year_level') == 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
                                        </select>
                                        @error('year_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="flex text-center" style="padding-top: 10px">
                                        <button class="btn btn-success ">{{ __('Save') }}</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div> 
                <footer class="footer" style="background-color: #3c4252">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                      <span class=" d-block text-center text-sm-left d-sm-inline-block" style="color: #fff">Copyright © bootstrapdash.com 2020</span>
                      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center" style="color: #fff"><a href="/" target="_blank">Cavite State University Tanza Campus</a>. All Rights Reserved <?php echo date("Y.");?></span>
                    </div>
                </footer> 
            </div>
        </div>
    </div>
    

    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('vendor/sp/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('js/sp/off-canvas.js') }}"></script>
    <script src="{{ asset('js/sp/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/sp/template.js') }}"></script>
    <!-- endinject -->
  
  </body>
  </html>

