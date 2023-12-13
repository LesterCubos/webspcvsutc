@extends('layouts.show')
@section('title','Department of Management')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Administration</li>
          <li>Department of Management</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= dom Section ======= -->
<section id="dom" class="dom">
    <div class="container" data-aos="fade-up">
      @foreach ($doms as $dom)
      <div class="section-title">
        <h3><span>{{ $dom->title }}</span></h3>
      </div>

      <div class="imfo">
        <p>{!! $dom->content !!}
        </p>
      </div>

      <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('storage/' . $dom->img) }}"  alt="{{ $dom->title }}">
      </div>
      @endforeach


</section>

@endsection
