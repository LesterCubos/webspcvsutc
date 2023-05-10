@extends('layouts.show')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>About</li>
          <li>Vision, Mission and Goals</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= MVG Section ======= -->
  <section id="mvg" class="mvg">
    <div class="container">

        @foreach ($mvgs as $mvg)
            @if ($loop->iteration == 1 )
                <div class="mvg-content" data-aos="zoom-in" data-aos-delay="100">
                    <h3>{{ $mvg->title1 }}<span> {{ $mvg->title2 }}</span></h3>
                    <p>{!!$mvg->content !!}</p>
                </div>
            @elseif ($loop->iteration == 2)
                <div class="mvg-content" data-aos="zoom-in" data-aos-delay="200">
                    <h3>{{ $mvg->title1 }}<span> {{ $mvg->title2 }}</span></h3>
                    <p>{!!$mvg->content !!}</p>
                </div>
            @elseif ($loop->iteration == 3)
                <div class="mvg-content" data-aos="zoom-in" data-aos-delay="300">
                    <h3>{{ $mvg->title1 }}<span> {{ $mvg->title2 }}</span></h3>
                    <p>{!!$mvg->content !!}</p>
                </div>
            @elseif ($loop->iteration == 4)
                <div class="mvg-content" data-aos="zoom-in" data-aos-delay="400">
                    <h3>{{ $mvg->title1 }}<span> {{ $mvg->title2 }}</span></h3>
                    <p>{!!$mvg->content !!}</p>
                </div>
            @else
                <div class="mvg-content" data-aos="zoom-in" data-aos-delay="500">
                    <h3>{{ $mvg->title1 }}<span> {{ $mvg->title2 }}</span></h3>
                    <p>{!!$mvg->content !!}</p>
                </div>
            @endif
        @endforeach

      {{-- <div class="mvg-content" data-aos="zoom-in" data-aos-delay="200">
        <h3>University<span> Mission</span></h3>
        <p>Cavite State University shall provide excellent, equitable and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities. It shall produce professional, skilled and morally upright individuals for global competitiveness.</p>
      </div>
      <div class="mvg-content" data-aos="zoom-in" data-aos-delay="300">
        <h3>Campus<span> Goals</span></h3>
        <p>The Campus shall endeavor to achieve the following goals: <br>
          1.   Provide high quality instruction in order to produce skilled, morally upright, and globally competitive graduates; <br>
          2.   Develop and pursue advanced research abilities through arts, sciences, and technology to support instruction; and <br>
          3.   Develop and conduct extension activities that will empower local people and communities</p>
      </div>
      <div class="mvg-content" data-aos="zoom-in" data-aos-delay="400">
        <h3>Quality<span> Policy</span></h3>
        <p>We Commit to the highest standards of education, value our stakeholders, Strive for continual improvement of our products and services, and Uphold the University’s tenets of Truth, Excellence, and Service to produce globally competitive and morally upright individuals.</p>
      </div>
      <div class="mvg-content" data-aos="zoom-in" data-aos-delay="500">
        <h3>Core<span> Values</span></h3>
        <p>Truth | Excellence | Service</p>
      </div> --}}

    </div>
  </section><!-- End MVG Section -->
@endsection


