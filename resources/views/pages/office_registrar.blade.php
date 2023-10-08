@extends('layouts.show')
@section('title','Office of the Campus Registrar')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Adminstration</li>
          <li>Office of the Campus Registrar</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Ocr Section ======= -->
<section id="ocr" class="ocr">
    <div class="container" data-aos="fade-up">

      <article class="entry entry-single">
        @foreach ( $office_registrars as $office_registrar )
          <div class="entry-img">
            <img src="{{ asset('storage/' . $office_registrar->pic) }}" alt="{{ $office_registrar->title}}" class="img-fluid">
          </div>

          <h2 class="entry-title">
            {{ $office_registrar->title }}
          </h2>

          <div class="entry-content">
            <p>
              {!! $office_registrar->content !!}
            </p>
          </div>
        @endforeach
      </article>

    </div>
</section><!-- End Ocr Section -->


@endsection


