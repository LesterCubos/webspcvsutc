@extends('layouts.show')
@section('title','Announcements')
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

    {{-- @foreach($announcements as $announcement)
        @if ($announcement->isActive == 1)
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
        @endif
    @endforeach --}}

    <div class="row gy-4 posts-list">

      @foreach ($announcements as $announcement)
        @if ($announcement->isActive == 1)
          <div class="col-lg-6">
            <article class="d-flex flex-column">
    
              <div class="post-img">
                <img src="{{ asset('storage/' . $announcement->poster) }}" alt="" class="img-fluid">
              </div>
    
              <h2 class="title">
                <a href="#">{{ $announcement->title }}</a>
              </h2>
    
              <div class="meta-top">
                <ul>
                  <?php 
                    $day = $announcement->created_at->format('d');
                    $year = $announcement->created_at->year;
                    $month = $announcement->created_at->month;
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
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="{{ $announcement->created_at }}">{{ $nameMonth }} {{ $day }}, {{ $year }}</time></li>
                  <li class="d-flex align-items-center"><i class="bx bx-bar-chart"></i>{{ $annViews[$announcement->id] }} Total Views</li>
                </ul>
              </div>
    
              <div class="content">
                <p>
                  {!! Str::limit($announcement->content,'500','...') !!}
                </p>
              </div>
    
              <div class="mt-auto align-self-end">
                <a href="announcements{{$announcement->id}}" class="read-more align-self-start"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>
    
            </article>
          </div><!-- End post list item -->
        @endif
      @endforeach
      
    </div><!-- End Announcements posts list -->
    
  </div>
</section><!-- End Announcements Page -->

@endsection
