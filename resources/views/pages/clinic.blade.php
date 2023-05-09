@extends('layouts.show')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Administration</li>
          <li>Clinic</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Clinic Section ======= -->
<section id="clinic" class="clinic">
    <div class="container" data-aos="fade-up">
      @foreach ($clinics as $clinic)
      <div class="section-title">
        <h3><span>{{ $clinic->title }}</span></h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      <div class="imfo">
        <p>{!! $clinic->content !!}
        </p>
      </div>

      <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('storage/' . $clinic->pic) }}"  alt="{{ $clinic->title }}">
      </div>
      @endforeach


</section>

@endsection
