@extends('layouts.show')
@section('title','Department of Information Technology')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Administration</li>
          <li>Department of Information Technology</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= dit Section ======= -->
<section id="dit" class="dit">
    <div class="container" data-aos="fade-up">
      @foreach ($dits as $dit)
      <div class="section-title">
        <h3><span>{{ $dit->title }}</span></h3>
      </div>

      <div class="imfo">
        <p>{!! $dit->content !!}
        </p>
      </div>

      <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('storage/' . $dit->img) }}"  alt="{{ $dit->title }}">
      </div>
      @endforeach


</section>

@endsection
