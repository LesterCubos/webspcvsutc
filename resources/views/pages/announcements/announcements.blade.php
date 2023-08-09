@extends('layouts.show')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Announcements</li>
        </ol>
      </div>
    </nav>

  </div><!-- End Breadcrumbs -->

<!-- ======= Announcements and Updates Page ======= -->
<main class="container announcementsadd" id="announcementsadd">
    <div class="container" data-aos="fade-up">
        <div class="row g-7">
            <div class="col-md-8">
              <img src="{{ asset('storage/' . $announce->poster) }}" class="card-img-top" alt="...">
              <div class="d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3 id="title">{{ $announce->title }}</h3>
                <p class="view"><i class='bx bx-bar-chart'></i> <span>{{ $totalViews }}</span> Total Views</p> 
                  <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                    <p>{!! $announce->content !!}</p>
                  </div>
                </div><!-- End Announcements -->
            </div>

            <div class="col-md-4">
              <div class="position-sticky" style="top: 4rem;">
                <div class="main" data-aos="fade-up" data-aos-delay="100">
                      <h3 class="title">Latest Post</h3>

                      @foreach($announcements as $announcement)

                        <!-- Card with an image on left -->
                        <div class="card mb-3">
                          <div class="row g-0">
                            <div class="col-md-4">
                              <img src="{{ asset('storage/' . $announcement->poster) }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <a class="card-title" href="announcements{{$announcement->id}}">{{ $announcement->title }}</a>
                              </div>
                            </div>
                          </div>
                        </div><!-- End Card with an image on left -->

                      @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>

  </main>
  
  @endsection