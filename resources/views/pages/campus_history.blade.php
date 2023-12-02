@extends('layouts.show')
@section('title','Tanza Campus History')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>About</li>
          <li>Campus History</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= History Section ======= -->
  <section id="history" class="history">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3><span>Tanza Campus</span> History</h3>
      </div>

    @foreach ($campus_history as $campushistory)
      <div class="polaroid">
        <img src="{{ asset('storage/' . $campushistory->image) }}" alt="{{ $campushistory->title }}" style="width:100%">
        <div class="name">
          <p>Cavite State University Tanza Campus</p>
        </div>
      </div>
      <div class="ps-0 ps-lg-6">
        <h3>{{ $campushistory->title }}</h3>
          <div class="content ps-0 ps-lg-6">
            <p>
              {!!$campushistory->body!!}
            </p>
          </div>
      </div>
    @endforeach

    </div>
  </section><!-- End History Section -->
@endsection

