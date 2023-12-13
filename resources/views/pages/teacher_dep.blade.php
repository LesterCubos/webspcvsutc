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
