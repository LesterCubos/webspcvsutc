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
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Job Vacancies Section ======= -->
<section id="jv" class="jv">
    <div class="container">

      <div class="section-title">
        <h3>Job <span>Vacancies</span></h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

    <!-- Card-->
    <div class="body">
        <section class="articles">
          @foreach ($job_vacancies as $job_vacancy)
            <article class="article">
              <div class="article-wrapper">
                <figure>
                  <img src="{{ Storage::url($job_vacancy->jobposter) }}" alt="{{ $job_vacancy->title }}"/>
                </figure>
                <div class="article-body">
                  <h2>{{ $job_vacancy->title }}</h2>
                  <p>
                    {!! Str::limit($job_vacancy->description,'100','...') !!} 
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
          @endforeach
        </section>
    </div>
    <!-- End Card-->

      
    </div>
  </section><!-- End Job Vacancies Section -->

@endsection



