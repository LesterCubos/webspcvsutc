@extends('layouts.show')
<head>
    <!-- Main CSS File -->
    <link href="{{ asset('css/mis.css') }}" rel="stylesheet">

  </head>
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    @include('incshow.bread')
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Administration</li>
          <li>Management Information S</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Management Information S Section ======= -->
<section id="mis" class="mis">
    <div class="container" data-aos="fade-up">
        @foreach ( $mis as $mi)
        <div class="section-title">
            <h3>{{ $mi->title }}</h3>
            <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
          </div>

          <div class="imfo">
            <p>{!! $mi->content !!}
            </p>
          </div>

          <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('storage/' . $mi->img) }}" alt="{{ $mi->title}}">
          </div>

        @endforeach

    </div>
  </section><!-- End Management Information S Section -->

@endsection
