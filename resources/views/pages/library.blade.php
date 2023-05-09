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
          <li>Library</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <section id="re" class="re">
    <div class="container" data-aos="fade-up">
        @foreach ($libs as $lib)
        <div class="section-title">
            <h3><span>{{ $lib->title }}</span></h3>
            <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
          </div>

          <div class="imfo">
            <p>{!! $lib->content !!}</p>
          </div>

          <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('storage/' . $lib->img) }}" alt="{{ $lib->title}}">
          </div>
        @endforeach


    </div>
</section><!-- End Research Extension Section -->

@endsection
