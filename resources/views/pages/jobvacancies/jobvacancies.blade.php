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
          <li>Job Vacancies</li>
          <li>{{ $job->title }}</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Job Vacancy Section ======= -->
<section id="jv" class="jv">
    <div class="container">

      <div class="section-title">
        <h3>Job <span>Vacancies</span></h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      <div class="row justify-content-around gy-4" id="news-box">
        <div class="col-lg-6 img-bg" data-aos="zoom-in" data-aos-delay="100">
          <img src="{{ Storage::url($job->jobposter) }}" class="card-img-top img" alt="...">
        </div>
        <div class="col-lg-6 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
          <h3 id="title">{{ $job->title }}</h3>
            <div class="d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
              <p id="content">{!! $job->description !!}</p>
            </div>
        </div><!-- End News Box -->
      </div>

      <div class="title">
        <p>Browse Other</p>
        <h3>Job Vacancies</h3>
    </div>

      <div class="jobs-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          @foreach ($job_vacancies as $job_vacancy)
            <div class="swiper-slide">
              <article class="article">
                <div class="article-wrapper">
                  <figure>
                    <img src="{{ Storage::url($job_vacancy->jobposter) }}" alt="{{ $job_vacancy->title }}"/>
                  </figure>
                  <div class="article-body">
                    <h2>{{ $job_vacancy->title }}</h2>
                    <p>
                      {!! Str::limit($job_vacancy->description,'200','...') !!} 
                    </p>
                    <a href="jobvacancies{{$job_vacancy->id}}" class="read-more">
                      Read more <span class="sr-only">about this is some title</span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                    </a>
                  </div>    
                </div>
              </article>
            </div><!-- End testimonial item -->
          @endforeach

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Job Vacancy Section -->

@endsection



