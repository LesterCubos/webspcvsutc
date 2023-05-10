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
          <li>QAAC</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->
<!-- ======= qaac Section ======= -->
<section id="qaac" class="qaac">
    <div class="container" data-aos="fade-up">
      @foreach ($qaacs as $qaac)
      <div class="section-title">
        <h3><span>{{ $qaac->title }}</span></h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      <div class="imfo">
        <p>{!! $qaac->content !!}
        </p>
      </div>

      <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('storage/' . $qaac->pic) }}"  alt="{{ $qaac->title }}">
      </div>
      @endforeach


</section>


@endsection

