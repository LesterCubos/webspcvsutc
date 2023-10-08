@extends('layouts.show')
@section('title','Cashier')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Administration</li>
          <li>Cashier</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Cashier Section ======= -->
<section id="cashier" class="cashier">
  <div class="container" data-aos="fade-up">

    <article class="entry entry-single">
      @foreach ( $cashiers as $cashier )
        <div class="entry-img">
          <img src="{{ asset('storage/' . $cashier->img) }}" alt="{{ $cashier->title }}" class="img-fluid">
        </div>

        <h2 class="entry-title">
          {{ $cashier->title }}
        </h2>

        <div class="entry-content">
          <p>
            {!! $cashier->content !!}
          </p>
        </div>
      @endforeach
    </article>

  </div>
</section><!-- End Cashier Section -->

@endsection
