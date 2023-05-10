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
          <li>Department of Arts and Sciences</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= das Section ======= -->
<section id="das" class="das">
    <div class="container" data-aos="fade-up">
      @foreach ($dass as $das)
      <div class="section-title">
        <h3><span>{{ $das->title }}</span></h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      <div class="imfo">
        <p>{!! $das->content !!}
        </p>
      </div>

      <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('storage/' . $das->img) }}"  alt="{{ $das->title }}">
      </div>
      @endforeach


</section>

@endsection
