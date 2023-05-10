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
          <li>Office of the Student Affairs</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Office of the Student Affairs Services Section ======= -->
<section id="osas" class="osas">
    <div class="container" data-aos="fade-up">
        @foreach ($osass as $osas)
        <div class="section-title">
            <h3>{{ $osas->title }}</span></h3>
            <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
          </div>

          <div class="imfo">
            <p>{!! $osas->content !!}
            </p>
          </div>

          <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('storage/' . $osas->img) }}" alt="{{ $osas->title}}">
          </div>
        @endforeach


    </div>
  </section><!-- End Office of the Student Affairs Services Section -->


@endsection
