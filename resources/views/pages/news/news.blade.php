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
          <li>News Update</li>
          <li>{{ $new->news_headline }}</li>
        </ol>
      </div>
    </nav>

  </div><!-- End Breadcrumbs -->

<!-- ======= News and Updates Page ======= -->
<main class="container newsadd" id="newsadd">
    <div class="container" data-aos="fade-up">
        <div class="row g-7">
            <div class="col-md-8">
              <img src="{{ asset('storage/' . $new->news_image) }}" class="card-img-top" alt="...">
              <div class="d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3 id="title">{{ $new->news_title }}</h3>
                <p class="view"><i class='bx bx-bar-chart'></i> <span>{{ $totalViews }}</span> Total Views</p> 
                  <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                    <p>{!! $new->news_content !!}</p>
                  </div>
              </div><!-- End News -->
            </div>
        
            <div class="col-md-4">
              <div class="position-sticky" style="top: 4rem;">
                  <div class="news-slider swiper card" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                      @foreach($news as $new)
                        @if ($new->isActive == 1)
                          <div class="swiper-slide">
                            <div class="news-item">
                              <img src="{{ asset('storage/' . $new->news_image) }}" class="card-img-top" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">{{ $new->news_headline }}</h5>
                              </div>
                              <div class="card-body">
                                <h5 class="title">{{ $new->news_title }}</h5>
                                <p class="card-text">{!! Str::limit($new->news_content,'400','...') !!}</p>
                                <div>
                                  <a href="newsandupdates_news{{$new->id}}"><button>Read More</button></a>
                                </div>
                              </div>
                            </div>
                          </div><!-- End News item -->
                        @endif
                      @endforeach

                    </div>
                    <div class="swiper-pagination" id="is"></div>
                  </div> 
              </div>
            </div>
          </div>
        </div>
    </div>

  </main>
  
  @endsection