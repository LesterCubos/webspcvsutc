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
          <li>Human Resource</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Human Resource Management Section ======= -->
<section id="hr" class="hr">
    <div class="container" data-aos="fade-up">
        @foreach ($hrs as $hr)
        <div class="section-title">
            <h3>{{ $hr->title }}</h3>
            <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
          </div>

          <div class="imfo">
            <p>{!! $hr->content !!}
            </p>
          </div>

          <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('storage/' . $hr->img) }}" alt="{{ $hr->title}}">
          </div>
        @endforeach


    </div>
  </section><!-- End Human Resource Management Section -->

@endsection
