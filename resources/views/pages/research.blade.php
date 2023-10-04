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
          <li>Research and Extension</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->
<!-- ======= Research Extension Section ======= -->
<section id="re" class="re">
  <div class="container" data-aos="fade-up">

    <article class="entry entry-single">
      @foreach ( $researchs as $research )
        <div class="entry-img">
          <img src="{{ asset('storage/' . $research->img) }}" alt="{{ $research->title}}" class="img-fluid">
        </div>

        <h2 class="entry-title">
          {{ $research->title}}
        </h2>

        <div class="entry-content">
          <p>
            {!! $research->content !!}
          </p>
        </div>
      @endforeach
    </article>

  </div>
</section><!-- End Research Extension Section -->


@endsection
