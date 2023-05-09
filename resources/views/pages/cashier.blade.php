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
          <li>Cashier</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Cashier Section ======= -->
<section id="cashier" class="cashier">
    <div class="container" data-aos="fade-up">
    @foreach ( $cashiers as $cashier)
    <div class="section-title">
        <h3><span>{{ $cashier->title }}</span></h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      <div class="imfo">
        <p>{!! $cashier->content !!}
        </p>
      </div>

      <div class="orgpic" data-aos="zoom-in" data-aos-delay="200">
        <pic src="{{ asset('storage/' . $cashier->pic) }}" alt="{{ $cashier->title }}>
      </div>
    @endforeach


    </div>
  </section><!-- End Cashier Section -->

@endsection
