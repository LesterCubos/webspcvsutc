@extends('layouts.show')
@section('title','Campus Seal')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>About</li>
          <li>Campus Seal</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= University Seal Section ======= -->
<section id="uniseal" class="uniseal">
    <div class="container">

      <div class="section-title">
        <h3>Campus <span>Seal</span></h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      @foreach ($uni_seals as $uni_seal)
        <div class="seal-img" data-aos="zoom-in" data-aos-easing="ease-in-out" data-aos-duration="500">
            <img src="{{ asset('storage/' . $uni_seal->image) }}" class="img-center" alt="{{ $uni_seal->content }}">
        </div>

        <div class="seal-info">
            <div class="col col-lg-7 info-center">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
                <p>{!! $uni_seal->content !!}</p>
            </div>
            </div>
        </div>
      @endforeach
    </div>
  </section><!-- End University Seal Section -->

@endsection



