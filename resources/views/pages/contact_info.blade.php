@extends('layouts.show')
<head>
    <!-- Main CSS File -->
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">

  </head>
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    @include('incshow.bread')
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

              <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row gy-4">
                    <div class="col-lg-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-lg-6 form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div><!-- End Contact Form -->

            </div>


        </div>
      </section><!-- End Contact Section -->
@endsection
