@extends('layouts.show')
<head>
    <!-- Main CSS File -->
    <link href="{{ asset('css/researche.css') }}" rel="stylesheet">

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
          <li>Research and Extension</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->
<!-- ======= Research Extension Section ======= -->
<section id="re" class="re">
    <div class="container" data-aos="fade-up">
        @foreach ($researchs as $research)
        <div class="section-title">
            <h3>{{ $research->title }}</h3>
            <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
          </div>

          <div class="imfo">
            <p>{!! $research->content !!} </p>
          </div>

          <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('storage/' . $research->img) }}" alt="{{ $research->title}}">
          </div>
        @endforeach


    </div>
</section><!-- End Research Extension Section -->


@endsection
