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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0" style="background-image: linear-gradient(to right, #ec37fc, #37b246);">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius: 10px; box-shadow: 20px 20px 5px;">
                <div class="brand-logo d-flex justify-content-center">
                  <img src="{{ asset('img/campus_seal.png') }}" alt="logo" width="10px">
                </div>
                <div class="d-flex flex-column align-items-center">
                  <h4 class="font-weight-bold">Welcome to CvSU-TC Portal</h4>
                  <h6 class="font-weight-light">
                    <?php  date_default_timezone_set('Asia/Manila');
                    echo "Today is " . date("l, m-d-Y. h:i a");?></h6>
                </div>
                <form class="pt-3" method="POST" action="{{ route('instructor_page.index') }}">
                    @csrf
                    @if (Session::has('error'))
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session::get('error')}}</strong>
                      </div>
                    @endif
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg @error('schedcode') is-invalid @enderror" id="schedcode" name="schedcode" placeholder="SchedCode" style="border-color: #ec37fc" required>
                    @error('schedcode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" id="pincode" class="form-control form-control-lg @error('pincode') is-invalid @enderror" name="pincode" placeholder="Pincode" style="border-color: #ec37fc" required>
                    @error('pincode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-check">
                    <input type="checkbox" onclick="myFunction()">
                    <label for="">Show Password<i class="input-helper"></i></label>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-bold auth-form-btn" type="submit">LOGIN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
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

    <script>

        function myFunction() {
          var x = document.getElementById("pincode");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        </script>
  
  
  
  </body>
  </html>