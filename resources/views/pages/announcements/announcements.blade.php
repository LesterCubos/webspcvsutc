@extends('layouts.show')

@section('title',$announce->title)

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
          <li>{{ $announce->title }}</li>
        </ol>
      </div>
    </nav>

  </div><!-- End Breadcrumbs -->

<!-- ======= Announcements and Updates Page ======= -->
<main class="container announcementsadd" id="announcementsadd">
    <div class="container-ann" data-aos="fade-up">
        {{-- <div class="row g-7">
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
                      <h3 class="title">RECENT POST</h3>

                      @foreach($announcements as $announcement)
                        @if ($announcement->isActive == 1)
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
                        @endif
                      @endforeach
              </div>
            </div>
          </div>
        </div> --}}

        <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="page-head-blog position-sticky" style="top: 7rem;">
              <div class="single-blog-page">
                <!-- recent start -->
                <div class="left-blog">
                  <h4>recent post</h4>
                  <div class="recent-post">
                      @foreach($announcements as $announcement)
                        @if ($announcement->isActive == 1)
                          <!-- start single post -->
                          <div class="recent-single-post">
                            <div class="post-img">
                              <a href="#">
                                <img src="{{ asset('storage/' . $announcement->poster) }}" alt="">
                              </a>
                            </div>
                            <div class="pst-content">
                                <p><a href="announcements{{$announcement->id}}">{{ $announcement->title }}</a></p>
                            </div>
                          </div>
                          <!-- End single post -->
                        @endif
                      @endforeach
                  </div>
                </div>
                <!-- recent end -->
              </div>
            </div>
          </div>
          <!-- End left sidebar -->
          <!-- Start single blog -->
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- single-blog start -->
                <article class="blog-post-wrapper">
                  <div class="post-thumbnail">
                    <img src="{{ asset('storage/' . $announce->poster) }}" alt="" />
                  </div>
                  <div class="post-information">
                    <h2>{{ $announce->title }}</h2>
                    <div class="entry-meta">
                      <?php 
                        $day = $announce->created_at->format('d');
                        $year = $announce->created_at->year;
                        $month = $announce->created_at->month;
                        if ($month == 1) {
                          $nameMonth = 'Jan';
                        } elseif ($month == 2) {
                          $nameMonth = 'Feb';
                        } elseif ($month == 3) {
                          $nameMonth = 'Mar';
                        } elseif ($month == 4) {
                          $nameMonth = 'Apr';
                        } elseif ($month == 5) {
                          $nameMonth = 'May';
                        } elseif ($month == 6) {
                          $nameMonth = 'Jun';
                        } elseif ($month == 7) {
                          $nameMonth = 'Jul';
                        } elseif ($month == 8) {
                          $nameMonth = 'Aug';
                        } elseif ($month == 9) {
                          $nameMonth = 'Sep';
                        } elseif ($month == 10) {
                          $nameMonth = 'Oct';
                        } elseif ($month == 11) {
                          $nameMonth = 'Nov';
                        } elseif ($month == 12) {
                          $nameMonth = 'Dec';
                        }
                      ?>
                      <span><i class="bi bi-clock"></i><a href="#"> {{ $nameMonth }} {{ $day }}, {{ $year }}</a></span>
                      <span><i class="bx bx-bar-chart"></i><a href=""> {{ $totalViews }} Total Views</a></span>
                    </div>
                    <div class="entry-content">
                      <p>{!! $announce->content !!}</p>
                    </div>
                  </div>
                </article>
                <!-- single-blog end -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Blog Page -->

    </div>

  </main>
  
  @endsection