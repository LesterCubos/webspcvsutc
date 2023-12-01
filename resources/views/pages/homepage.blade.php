<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'CvSU Tanza') }}</title>

        <!-- Icon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/campus_seal.png') }}">
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=McLaren&family=Poppins:wght@400;500;600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">


        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
        <link href="{{ asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">

        {{-- Main CSS File --}}
        <link rel="stylesheet" href="{{ asset('css/mainshow.css') }}">
</head>
<body class="antialiased">

    @include('incshow.header')

    <main id="main">
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex flex-column justify-content-end position-relative">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                <div class="carousel-inner">
                    @foreach($carousel_items as $carousel_item)
                    @if ($loop->iteration % 2 == 1 )
                        @if ($carousel_item->isActive == 1)
                        <!-- Slide 1 -->
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('storage/' . $carousel_item->featured_image) }}" alt="{{ $carousel_item->title }}">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <h1 class="animate__animated animate__fadeInDown">{{ $carousel_item->title }}</h1>
                                    <p class="animate__animated animate__fadeInUp"> {{ $carousel_item->content }}</p>
                                    {{-- <div class="d-flex justify-content-center justify-content-lg-start">
                                        <p><a class="btn btn-lg btn-light btn-get-started animate__animated animate__fadeInUp scrollto" href="#">Sign up today</a></p>
                                        <p><a href="#" class="glightbox btn-watch-video animate__animated animate__fadeInUp"><i class="bi bi-play-circle"></i><span>Watch Video</span></a></p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        @endif
                    @elseif ($loop->iteration % 2 == 0)
                        @if ($carousel_item->isActive == 1)
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('storage/' . $carousel_item->featured_image) }}" alt="{{ $carousel_item->title }}">
                            <div class="container">
                            <div class="carousel-caption">
                                <h1 class="animate__animated animate__fadeInDown">{{ $carousel_item->title }}</h1>
                                <p class="animate__animated animate__fadeInUp">{{ $carousel_item->content }}</p>
                                {{-- <p><a class="btn btn-lg btn-light btn-get-started animate__animated animate__fadeInUp scrollto" href="#">Learn more</a></p> --}}
                            </div>
                            </div>
                        </div>
                        @endif
                    {{-- @elseif ($loop->iteration == 3)
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('storage/' . $carousel_item->featured_image) }}" alt="{{ $carousel_item->title }}">
                            <div class="container">
                              <div class="carousel-caption text-end">
                                <h1 class="animate__animated animate__fadeInDown">{{ $carousel_item->title }}</h1>
                                <p class="animate__animated animate__fadeInUp">{{ $carousel_item->content }}</p>
                                <p><a class="btn btn-lg btn-light btn-get-started animate__animated animate__fadeInUp scrollto" href="#">Browse News</a></p>
                              </div>
                            </div>
                          </div>
                    @else
                        <!-- Slide -->
                        <div class="carousel-item">
                            <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('storage/' . $carousel_item->featured_image) }}" alt="{{ $carousel_item->title }}">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <h1 class="animate__animated animate__fadeInDown">{{ $carousel_item->title }}</h1>
                                    <p class="animate__animated animate__fadeInUp"> {{ $carousel_item->content }}</p>
                                </div>
                            </div>
                        </div> --}}
                    @endif
                    @endforeach
                </div>




              <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
              </a>

              <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
              </a>

            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
              <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
              </defs>
              <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
              </g>
              <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
              </g>
              <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
              </g>
            </svg>

        </section>
        <!-- End Hero Section -->

        <main id="main">
            
            <!-- ======= Featured Services Section ======= -->
            <section id="featured-services" class="featured-services">
                <div class="container" data-aos="fade-up">

                    <div class="row gy-4">
                        @foreach($featured_services as $featured_service)

                            <div class="col col-lg-4 col-md-6 service-item d-flex">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <h4 class="title"><a href="">{{ $featured_service->title }}</a></h4>
                                <p class="description">{!! $featured_service->content !!}</p>
                            </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </section>

            <!-- End Featured Services Section -->
            
             <!-- ======= Announcements Section ======= -->
            @foreach ($switchs as $switch)
                @if ($switch->isActive == 1)
                    <section id="announcements" class="announcements section-bg">
                @else
                    <section id="announcements" class="announcements">
                @endif 
            @endforeach
                <div class="section-title">
                    <h3>Latest <span>Announcements</span></h3>
                </div>

                <div class="container">
                    <div class="announcements-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            @foreach($announcements as $announcement)
                                @if ($announcement->isActive == 1)
                                    <div class="swiper-slide">
                                        <div class="row announcements-item">
                                        <div class="col-lg-6">
                                            <img src="{{ asset('storage/' . $announcement->poster) }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                                            <h3> {{ $announcement->title }}</h3>
                                            <p class="fst-italic">
                                                {!! Str::limit($announcement->content,'500','...') !!}
                                            </p>
                                            <div>
                                                <a href="announcements{{$announcement->id}}"><button>Read More</button></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div><!-- End Announcement item -->
                                @endif
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                      </div>

                </div>
            </section>
            <!-- End Announcements Section -->

            <!-- ======= News and updates Section ======= -->
            @foreach ($switchs as $switch)
                @if ($switch->isActive == 1)
                    <section id="newsandupdates" class="newsandupdates ">
                @else
                    <section id="newsandupdates" class="newsandupdates section-bg">
                @endif 
            @endforeach
                <div class="section-title">
                    <h3><span>News</span> Updates</h3>
                </div>

                <div class="container-fluid" data-aos="fade-up">

                    <div class="row">

                        <div class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                            <div class="accordion-list">
                                <ul> 
                                    @php ($key = 1)
                                    @foreach($news as $new)
                                        @if ($key <= 5)
                                            @if ($new->isActive == 1)
                                                <li>
                                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-{{ $key }}" class="collapsed"><span id="num">{{ $key }}</span> {{ $new->news_title }}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                    <div id="accordion-list-{{ $key }}" class="collapse" data-bs-parent=".accordion-list">
                                                    <p>
                                                        {!! Str::limit($new->news_content,'250','...') !!}
                                                        <a href="newsandupdates_news{{$new->id}}">Read More</a>
                                                    </p>
                                                    </div>
                                                </li>
                                                @php ($key++)
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <div class="col-lg-5 align-items-stretch order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                            <div id="carouselIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                                <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                </div>
                                <div class="carousel-inner" id="carousel-inner">
                                @php ($key = 1)
                                @foreach ( $news as $new )
                                @if ($key <= 5)
                                    @if ($new->isActive == 1)
                                        @if ($key == 1)
                                            <div class="carousel-item active" id="carousel-item">
                                        @else
                                            <div class="carousel-item" id="carousel-item">
                                        @endif
                                            <img src="{{ asset('storage/' . $new->news_image) }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption text-start">
                                            <h5 class="animate__animated animate__fadeInUp">{{ $new->news_headline }}</h5>
                                            </div>
                                        </div>
                                        @php ($key++)
                                    @endif 
                                @endif
                                @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <a href="services_newsandupdates"><button id="load">Load More</button></a>
                    </div>
                </div>
            </section>
            <!-- End News and Updates Section -->

            <!-- ======= Events Section ======= -->
            @foreach ($switchs as $switch)
                @if ($switch->isActive == 1)
                    <section id="events" class="events section-bg">
                @else
                    <section id="events" class="events">
                @endif 
            @endforeach

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row align-items-xl-center gy-5">
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="content">
                                <div class="title">
                                    <p>Upcoming</p>
                                    <h3>Events</h3>
                                </div>
                                <div class="img-calendar">
                                <img src="{{ asset('img/imgbin_calendar-brand-png.png') }}" alt="" width="300" height="300">
                                </div>
                                <div class="text-center">
                                <a href="services_campuscalendar" class="more-btn">View Calendar <i class="bx bx-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7">
                            <div class="row gy-4 event-boxes">
                                @php ($delay = 200)
                                @foreach ($events as $event)
                                    @if ($loop->iteration <= 4 )
                                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                                            <div class="event-box">
                                                <h3>{{ $event->event_title }}</h3> 
                                                <p><span>Start Date: </span>{{ $event->event_start_date }} <span> | Start Time:</span> {{ $event->event_start_time }}</p>
                                                <p><span>End Date: </span>{{ $event->event_end_date }} <span> | End Time:</span> {{ $event->event_end_time }}</p>
                                                <p class="descrip"><span>Description: </span> <br>{!! Str::limit($event->event_description,'80','...') !!}</p>
                                            </div>
                                        </div> <!-- End Event Box -->
                                        @php($delay = $delay + 100)
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Events Section -->

            <!-- ======= Discover Section ======= -->
            <section id="discover" class="discover">
                <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Discover <span>Tanza Campus</span></h3>
                </div>

                <div class="row">
                    @foreach($discover_tanza_infos as $discover_tanza_info)
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <img class="img-fluid" src="{{ asset('storage/' . $discover_tanza_info->image) }}" alt="{{ $discover_tanza_info->headline }}">
                            
                    
                            {{-- <a  href="https://www.facebook.com/100057269566848/videos/990860887940023" class="glightbox play-btn"></a> --}}
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                            <h3>{{ $discover_tanza_info->headline }}</h3>
                            <p class="fst-italic">
                                {{ $discover_tanza_info->subheadline }}
                            </p>
                            <p>
                                {!! Str::limit($discover_tanza_info->content,'500','...') !!}
                            </p>
                            <a href="about_campus_history"><button>Read More</button></a>

                        </div>
                    @endforeach
                </div>

                </div>
            </section>
            <!-- End Discover Section -->

            <!-- ======= Counts Section ======= -->
            <section id="counts" class="counts">
                <div class="container" data-aos="fade-up">

                    {{-- <div class="website-counter"></div> --}}
                    {{-- <div class="website-counter">{{ $totalViews }}</div> --}}

                <div class="row">
                    @foreach($counts as $count)
                        @if ($loop->iteration == 1 )
                            <div class="col-lg-3 col-md-6">
                                <div class="count-box">
                                    <i class="bi bi-person"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $count->value }}" data-purecounter-duration="1" class="purecounter"></span>
                                    <p>{{ $count->category }}</p>
                                </div>
                            </div>
                        @elseif ($loop->iteration == 2 )
                            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                                <div class="count-box">
                                    <i class="bi bi-journal-richtext"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $count->value }}" data-purecounter-duration="1" class="purecounter"></span>
                                    <p>{{ $count->category }}</p>
                                </div>
                            </div>
                        @elseif ($loop->iteration == 3 )
                            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                                <div class="count-box">
                                    <i class="bi bi-headset"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $count->value }}" data-purecounter-duration="1" class="purecounter"></span>
                                    <p>{{ $count->category }}</p>
                                </div>
                            </div>
                        @elseif ($loop->iteration == 4 )
                            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                                <div class="count-box">
                                    <i class="bi bi-stickies"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $count->value }}" data-purecounter-duration="1" class="purecounter"></span>
                                    <p>{{ $count->category }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                </div>
            </section>
            <!-- End Counts Section -->

            <!-- ======= Program Section ======= -->
            {{-- <section id="programs" class="programs section-bg">
                <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Our <span>Programs</span></h3>
                </div>

                <div class="row gy-5">
                    @foreach($programs as $program)
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">

                        <div class="programs-item">
                        <div class="img">
                        <img src="{{ asset('storage/' . $program->program_image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                        <div class="icon">
                            <i class="bi bi-stickies"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>{{ $program->title }}</h3>
                        </a>
                        <p>{{ $program->content }}</p>
                        </div>
                    </div>

                    </div><!-- End Program Item -->
                    @endforeach
                    

                </div>

                </div>
            </section> --}}
            <!-- End Program  Section -->


            <!-- ======= Admission Section ======= -->
            @foreach ($switchs as $switch)
                @if ($switch->isActive == 1)
                    <section id="admissions" class="admissions">
                        <div class="container" data-aos="zoom-in" style="background: linear-gradient(rgba(37, 50, 72, 0.9), rgba(25, 40, 66, 0.9)), url('../img/admission.jpg') center center">

                            <div class="section-title">
                                <h3><span>Admissions</span> On Going</h3>
                            </div>

                            <div class="row">
                                @foreach($admissions as $admission)
                                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                                        <div class="icon-box">
                                            <div class="icon">
                                                <i class='bx bxs-edit'></i>
                                            </div>
                                            <h4>{{ $admission->title }}</h4>
                                            <p>{!! $admission->descrip !!}</p>
                                            <div class="btn-wrap">
                                                <a href="#" class="btn-apply">Apply Now <i class="bi bi-arrow-right-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </section><!-- End Admission Section -->       
                @endif
            @endforeach

        @include('incshow.footer')

    </main>

    @include('incshow.scroll-top')

    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
          <div class="animation-preloader">
            <!-- <div class="spinner"></div> -->
            <div class="ring">Welcome
              <span class="mema"></span>
            </div>
            <div class="txt-loading">
              <span data-text-preloader="C" class="letters-loading">
                C
              </span>

              <span data-text-preloader="v" class="letters-loading">
                v
              </span>

              <span data-text-preloader="S" class="letters-loading">
                S
              </span>

              <span data-text-preloader="U" class="letters-loading">
                U
              </span>

              <span data-text-preloader="-" class="letters-loading">
                -
              </span>

              <span data-text-preloader="T" class="letters-loading">
                T
              </span>

              <span data-text-preloader="C" class="letters-loading">
                C
              </span>
            </div>
          </div>
        </div>
      </div>
      
    @include('incshow.script')

</body>
</html>

        


    <!-- Preloader -->
    
        