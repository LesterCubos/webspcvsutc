@extends('layouts.show')
@section('title','Library')
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

<section id="lib" class="lib">
  <div class="container" data-aos="fade-up">
       
    <article class="entry entry-single">
      @foreach ( $libs as $lib )
        <div class="entry-img">
          <img src="{{ asset('storage/' . $lib->img) }}" alt="{{ $lib->title}}" class="img-fluid">
        </div>

        <h2 class="entry-title">
          {{ $lib->title}}
        </h2>

        <div class="entry-content">
          <p>
            {!! $lib->content !!}
          </p>
        </div>
      @endforeach
    </article>

  </div>
</section><!-- End Library Section -->

@endsection
