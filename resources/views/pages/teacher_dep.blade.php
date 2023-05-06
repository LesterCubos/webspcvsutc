@extends('layouts.show')
<head>
    <!-- Main CSS File -->
    <link href="{{ asset('css/ted.css') }}" rel="stylesheet">

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
          <li>Teacher Education Department</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= ted Section ======= -->
<section id="ted" class="ted">
    <div class="container" data-aos="fade-up">
      @foreach ($teds as $ted)
      <div class="section-title">
        <h3><span>{{ $ted->title }}</span></h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      <div class="imfo">
        <p>{!! $ted->content !!}
        </p>
      </div>

      <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('storage/' . $ted->img) }}"  alt="{{ $ted->title }}">
      </div>
      @endforeach


</section>

@endsection
