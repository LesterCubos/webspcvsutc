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
          <li>Clinic</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Clinic Section ======= -->
<section id="clinic" class="clinic">
  <div class="container" data-aos="fade-up">

      <article class="entry entry-single">
        @foreach ( $clinics as $clinic )
          <div class="entry-img">
            <img src="{{ asset('storage/' . $clinic->pic) }}" alt="{{ $clinic->title }}" class="img-fluid">
          </div>

          <h2 class="entry-title">
            {{ $clinic->title }}
          </h2>

          <div class="entry-content">
            <p>
              {!! $clinic->content !!}
            </p>
          </div>
        @endforeach
      </article>

  </div>
</section>

@endsection
