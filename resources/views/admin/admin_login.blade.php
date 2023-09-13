@extends('layouts.app')

@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper"id="colorbg" >
      <div class="content-wrapper d-flex align-items-stretch auth "id="colorbg">
        <div class="row flex-grow">

          <div class="col login-half-bg">
            <div class="d-flex align-items-center justify-content-center" >
                <div class="card" style="border-radius: 25px; width: 250px; padding-top: 10px">
                    <h2 class="text-center" style="color: #9E59F4"><strong> Welcome back! </strong></h2>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <h1 class="text-center" style="color: white"><br><strong> Elevate your Academic Journey:
                    <br>View Grades, RegForm, and More! </strong></h1>
            </div>
            <div class=" d-flex align-items-center justify-content-center" >
                <img src="../images/urban-856.gif" alt="">
                {{-- <p class="text-white font-weight-medium text-center  align-self-end">Copyright &copy; 2020  All rights reserved.</p> --}}
              </div>
          </div>


          <div class="col-lg-4 d-flex align-items-center justify-content-center card ">
            <div class="card-body">
                <div class="">
                    <div class="auth-form-transparent text-left p-3">
                      <div class="brand-logo">
                        <img src="{{ asset('images/cvsu_tanza.png') }}" alt="Logo" width="150" height="50">
                      </div>
                      <h4 class="text-center">Login your Account!</h4>
                      <form class="pt-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail">Email</label>
                          <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                              <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-account-outline text-primary"></i>
                              </span>
                            </div>
                            <input type="email" class="form-control form-control-lg border-left-0  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required autocomplete="email" autofocus>

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword">Password</label>
                          <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                              <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-lock-outline text-primary"></i>
                              </span>
                            </div>
                            <input style="width: 10px" id="myInput" type="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" name="password" placeholder="Your Password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                          </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" onclick="myFunction()">
                            <label for="">Show Password</label>
                        </div>

                        <div class="my-2 d-flex justify-content-between align-items-center">

                          <div class="form-check">
                            <label class="form-check-label text-muted">
                              <input type="checkbox" class="form-check-input">
                              Keep me signed in
                            </label>
                          </div>
                          <div style="padding-top: 60px">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
                            @endif
                          </div>

                        </div>
                        <div class="my-3">
                          <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">
                            {{ __('Login') }}
                          </button>
                        </div>

                        <div class="text-center mt-4 font-weight-light">
                          Having issues on your account? <a href="register-2.html" class="text-primary">Click here</a>
                        </div>

                        <img src="{{ asset('images/cvsu_tanza.png') }}" alt="Logo" width="150" height="50">
                      </form>
                    </div>
                  </div>
            </div>
          </div>


        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<script>

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection
