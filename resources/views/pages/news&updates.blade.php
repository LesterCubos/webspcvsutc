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
          <li>News and Update</li>
        </ol>
      </div>
    </nav>

  </div><!-- End Breadcrumbs -->

<!-- ======= News and Updates Page ======= -->
<section id="nandu" class="nandu">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h3><span>News</span> and Updates</h3>
      <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
    </div>

    @foreach($news as $new)

      @if ($loop->iteration == 1 )
        <div class="row justify-content-around gy-4" id="news-box">
          <div class="col-lg-6 img-bg" style="background-image: url({{ asset('storage/' . $new->news_image) }});" data-aos="zoom-in" data-aos-delay="100"></div>
          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3 id="title">{{ $new->news_title }}</h3>
              <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                <p>{!! $new->news_content !!}</p>
              </div>
              <div>
                <a href="newsandupdates_news1"><button>Read More</button></a>
              </div>
          </div><!-- End News Box -->
        </div>

      @elseif ($loop->iteration == 2)
        <div class="row justify-content-around gy-4" id="news-box">
          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3 id="title">{{ $new->news_title }}</h3>
            <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
              <p>{!! $new->news_content !!}</p>
            </div>
            <div>
              <a href="newsandupdates_news2"><button>Read More</button></a>
            </div>
          </div>
          <div class="col-lg-6 img-bg" style="background-image: url({{ asset('storage/' . $new->news_image) }});" data-aos="zoom-in" data-aos-delay="100"></div>
        </div>

      @elseif ($loop->iteration == 3)
        <div class="row justify-content-around gy-4" id="news-box">
          <div class="col-lg-6 img-bg" style="background-image: url({{ asset('storage/' . $new->news_image) }});" data-aos="zoom-in" data-aos-delay="100"></div>
          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3 id="title">{{ $new->news_title }}</h3>
              <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                <p>{!! $new->news_content !!}</p>
              </div>
              <div>
                <a href="newsandupdates_news3"><button>Read More</button></a>
              </div>
          </div><!-- End News Box -->
        </div>

      @elseif ($loop->iteration == 4)
        <div class="row justify-content-around gy-4" id="news-box">
          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3 id="title">{{ $new->news_title }}</h3>
            <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
              <p>{!! $new->news_content !!}</p>
            </div>
            <div>
              <a href="newsandupdates_news4"><button>Read More</button></a>
            </div>
          </div>
          <div class="col-lg-6 img-bg" style="background-image: url({{ asset('storage/' . $new->news_image) }});" data-aos="zoom-in" data-aos-delay="100"></div>
        </div>

      @elseif ($loop->iteration == 5)
      <div class="row justify-content-around gy-4" id="news-box">
        <div class="col-lg-6 img-bg" style="background-image: url({{ asset('storage/' . $new->news_image) }});" data-aos="zoom-in" data-aos-delay="100"></div>
        <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <h3 id="title">{{ $new->news_title }}</h3>
            <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
              <p>{!! $new->news_content !!}</p>
            </div>
            <div>
              <a href="newsandupdates_news5"><button>Read More</button></a>
            </div>
        </div><!-- End News Box -->
      </div>

      @endif
      @endforeach
    
  </div>
</section><!-- End News and Updates Page -->

@endsection
