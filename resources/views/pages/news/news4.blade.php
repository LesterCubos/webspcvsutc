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
<main class="container newsadd" id="newsadd">
    <div class="container" data-aos="fade-up">
        <div class="row g-7">
            <div class="col-md-8">
              @foreach($news as $new)
                @if ($loop->iteration == 4 )
                  <img src="{{ asset('storage/' . $new->news_image) }}" class="card-img-top" alt="...">
                  <div class="d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <h3 id="title">{{ $new->news_title }}</h3>
                      <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                        <p>{!! $new->news_content !!}</p>
                      </div>
                      <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                        <p>The Department of Science and Technology – Forest Products Research Institute (DOST-FPRDI) visited Sugar Palm Research, Information, and Trade (SPRINT) Center on April 12-14, 2023. During the visit, DOST-FPRDI harvested nine senile kaong trees within the premises of Cavite State University – Main Campus. The harvested senile kaong trees were transported to their research facility at Los Baños, Laguna tol serve as research materials for their project entitled “Development of High-Value Products Derived from Senile Sugar Palms (Arenga pinnata). The main objective of the project is to utilize and develop functional and aesthetic products from the trunk of a senile sugar palm.

                          The SPRINT Center and DOST-FPRDI are currently working on a Memorandum of Agreement related to the above-mentioned project (JLBHerrera).</p>
                      </div>
                      <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                        <p>May 16 2023
                          Tim O’Brien ’94 and Tim Field ’94 have been keeping a secret for months. The former Hun School and Hobart College football teammates had been orchestrating a surprise to honor Bill and Nancy Long since the summer of 2022. Their plan, hatched with Bill Quirk and Janine Vanisko ’83, was to raise funds to name a faculty apartment in the new residence hall (planned for completion in 2025) in their honor. Mr. O’Brien and Mr. Field, along with about thirty-five teammates, parents, friends, and family, raised $100,000 for the naming opportunity for the Bill and Nancy Long Faculty Apartment.

                          Bill Long served Hun from 1986 to 2014, first as director of the boarding division, then as dean of students and a member of the history faculty. He served as head varsity football coach from 1987 to 1997, coaching several successful campaigns, which led to his induction in the School’s Athletic Hall of Fame in 2004. He also served as director of the Hun Day Camp for more than twenty-five years. He and his wife, Nancy, were also dorm parents and steadfast supporters of the students in their care.

                          While announcing the surprise during Alumni Weekend, Mr. Field was emotional, describing his former coach as someone who exhibited “a sense of direction, participation, tenacity, assertiveness, and [helped] young men through adolescence and purpose.”

                          Mr. and Mrs. Long, who have retired to Ocean City, New Jersey, were completely surprised by the tribute, but Mr. Long described it as “wonderful” and said he appreciated “all the gifts he’d been given,” including his continued close relationships with Hun alums.</p>
                      </div>
                      
                  </div><!-- End News -->
                @endif
              @endforeach
            </div>
        
            <div class="col-md-4">
              <div class="position-sticky" style="top: 4rem;">
                  <div class="news-slider swiper card" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                      @foreach($news as $new)

                        @if ($loop->iteration == 1 )
                          <div class="swiper-slide">
                            <div class="news-item">
                              <img src="{{ asset('storage/' . $new->news_image) }}" class="card-img-top" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">{{ $new->news_headline }}</h5>
                              </div>
                              <div class="card-body">
                                <h5 class="title">{{ $new->news_title }}</h5>
                                <p class="card-text">{!! $new->news_content !!}</p>
                                <div>
                                  <a href="newsandupdates_news1"><button>Read More</button></a>
                                </div>
                              </div>
                            </div>
                          </div><!-- End News item -->

                        @elseif ($loop->iteration == 2)
                          <div class="swiper-slide">
                            <div class="news-item">
                              <img src="{{ asset('storage/' . $new->news_image) }}" class="card-img-top" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">{{ $new->news_headline }}</h5>
                              </div>
                              <div class="card-body">
                                <h5 class="title">{{ $new->news_title }}</h5>
                                <p class="card-text">{!! $new->news_content !!}</p>
                                <div>
                                  <a href="newsandupdates_news2"><button>Read More</button></a>
                                </div>
                              </div>
                            </div>
                          </div><!-- End News item -->
                        
                        @elseif ($loop->iteration == 3)
                          <div class="swiper-slide">
                            <div class="news-item">
                              <img src="{{ asset('storage/' . $new->news_image) }}" class="card-img-top" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">{{ $new->news_headline }}</h5>
                              </div>
                              <div class="card-body">
                                <h5 class="title">{{ $new->news_title }}</h5>
                                <p class="card-text">{!! $new->news_content !!}</p>
                                <div>
                                  <a href="newsandupdates_news3"><button>Read More</button></a>
                                </div>
                              </div>
                            </div>
                          </div><!-- End News item -->

                        @elseif ($loop->iteration == 4)
                          <div class="swiper-slide">
                            <div class="news-item">
                              <img src="{{ asset('storage/' . $new->news_image) }}" class="card-img-top" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">{{ $new->news_headline }}</h5>
                              </div>
                              <div class="card-body">
                                <h5 class="title">{{ $new->news_title }}</h5>
                                <p class="card-text">{!! $new->news_content !!}</p>
                                <div>
                                  <a href="newsandupdates_news4"><button>Read More</button></a>
                                </div>
                              </div>
                            </div>
                          </div><!-- End News item -->

                        @elseif ($loop->iteration == 5)
                          <div class="swiper-slide">
                            <div class="news-item">
                              <img src="{{ asset('storage/' . $new->news_image) }}" class="card-img-top" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">{{ $new->news_headline }}</h5>
                              </div>
                              <div class="card-body">
                                <h5 class="title">{{ $new->news_title }}</h5>
                                <p class="card-text">{!! $new->news_content !!}</p>
                                <div>
                                  <a href="newsandupdates_news5"><button>Read More</button></a>
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