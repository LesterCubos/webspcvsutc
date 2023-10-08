@extends('layouts.show')
@section('title','Contact Information')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>About</li>
          <li>Contact Information</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h3><span>Contact </span>Information</h3>
            <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
          </div>

          <div class="row gy-4">
            @foreach ($contact_infos as $contact_info)
              <div class="col-lg-6">
                <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-map"></i>
                  <h3>Our Address</h3>
                  <p>{{ $contact_info->campus_address }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-lg-3 col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>{{ $contact_info->campus_email }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-lg-3 col-md-6">
                <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>{{ $contact_info->campus_number }}</p>
                </div>
              </div><!-- End Info Item -->
            @endforeach
            </div>

            <div class="row gy-4 mt-1">

              <div class="col-lg-6 ">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d938.8928008383734!2d120.84954004743024!3d14.333623419572083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd80655363e335%3A0x485feee6e1048a1b!2sCavite%20State%20University%20-%20Tanza%20Campus!5e0!3m2!1sen!2sph!4v1678767720343!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div><!-- End Google Maps -->

              {{-- <div class="col-lg-6"> --}}
                <!-- Success message -->
                  {{-- @if(Session::has('success'))
                  <div class="alert alert-success">
                      {{Session::get('success')}}
                  </div>
                  @endif --}}
                {{-- <form action="" method="post" action="{{ route('contact.store') }}">
                  @csrf
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
                      <!-- Error -->
                      @if ($errors->has('name'))
                      <div class="error">
                          {{ $errors->first('name') }}
                      </div>
                      @endif
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
                      @if ($errors->has('email'))
                      <div class="error">
                          {{ $errors->first('email') }}
                      </div>
                      @endif
                  </div>
                  <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
                      @if ($errors->has('phone'))
                      <div class="error">
                          {{ $errors->first('phone') }}
                      </div>
                      @endif
                  </div>
                  <div class="form-group">
                      <label>Subject</label>
                      <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                          id="subject">
                      @if ($errors->has('subject'))
                      <div class="error">
                          {{ $errors->first('subject') }}
                      </div>
                      @endif
                  </div>
                  <div class="form-group">
                      <label>Message</label>
                      <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                          rows="4"></textarea>
                      @if ($errors->has('message'))
                      <div class="error">
                          {{ $errors->first('message') }}
                      </div>
                      @endif
                  </div>
                  <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
              </form> --}}

              
              {{-- //orig contact form --}}

             


        </div>
      </section><!-- End Contact Section -->
@endsection
