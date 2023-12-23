@extends('layouts.show')
@section('title','Undergraduate Programs')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Admission</li>
          <li>Undergraduate Programs</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Programs Offered Section ======= -->
<section id="programsoffered" class="programsoffered">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
          <h3><span>Undergraduate</span> Programs</h3>
      </div>


      <div class="col-12 d-flex flex-column justify-content-center">
        @foreach ( $programs_offers as $programs_offer)
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bx bxs-graduation"></i></div>
                <br>
                <h4 class="title"><a href="">{{ $programs_offer->title }}</a></h4>
                <br>
                <p class="description">{!! $programs_offer->desc !!}</p>
            </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Programs Offered Section -->

@endsection
