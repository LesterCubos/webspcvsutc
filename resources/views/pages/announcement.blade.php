@extends('layouts.show')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Services</li>
          <li>Announcements</li>
        </ol>
      </div>
    </nav>

  </div><!-- End Breadcrumbs -->

<!-- ======= News and Updates Page ======= -->
<section id="announcements" class="announcements">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h3>Latest<span> Announcements</span></h3>
      <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
    </div>

    @foreach($announcements as $announcement)

        <div class="row gy-4 align-items-center announcements-item">
            <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
                <img src="{{ asset('storage/' . $announcement->poster) }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-7" data-aos="fade-left" data-aos-delay="100">
                <h3>{{ $announcement->title }}</h3>
                <p class="fst-italic">
                    {!! Str::limit($announcement->content,'500','...') !!}
                </p>
                <div style="margin-top: 20px">
                    <a href="announcements{{$announcement->id}}" class="read-more align-self-start"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div><!-- Announcement Item -->

    @endforeach
    
  </div>
</section><!-- End News and Updates Page -->

@endsection
