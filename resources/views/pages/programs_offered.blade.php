@extends('layouts.show')
<head>
    <!-- Main CSS File -->
    <link href="{{ asset('css/programsoffered.css') }}" rel="stylesheet">

  </head>
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    @include('incshow.bread')
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Admission</li>
          <li>Programs Offered</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Programs Offered Section ======= -->
<section id="programsoffered" class="programsoffered">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
          <h3><span>Program</span> Offering</h3>
          <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>


      <div class="col-12 d-flex flex-column justify-content-center">
        @foreach ( $programs_offers as $programs_offer)
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                {{-- <div class="icon"><i class="bi bi-motherboard"></i></div> --}}
                <h4 class="title"><a href="">{{ $programs_offer->title }}</a></h4>
                <p class="description">{!! $programs_offer->desc !!}</p>
            </div>
        @endforeach


          {{-- {{-- <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-cash-coin"></i></div>
              <h4 class="title"><a href="">Bachelor of Science in Business Management (BSBM)</a></h4>
              <p class="description">The Marketing Management program prepares the graduate for careers in marketing, market research, advertising, and public relations. The curriculum provides the graduate with both technical skills and competencies required in the field, but also the flexible mindset that is necessary to stay competitive in a constantly changing business environment.</p>
          </div> --}}

          {{-- <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-cup-straw"></i></div>
              <h4 class="title"><a href="">Bachelor of Science in Hospitality Management (BSHM)</a></h4>
              <p class="description">The Hospitality Management program equips the students with competencies that are needed to execute operational tasks and management functions in food production (culinary), accommodation, food and beverages services, tourism planning and product development, preparing them for employment opportunities in restaurants, food, lodging, and accommodation services.</p>
          </div>

          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-journal-text"></i></div>
              <h4 class="title"><a href="">Bachelor of Science in Psychology (BSP)</a></h4>
              <p class="description">The Psychology program provides initial training for those interested in teaching, research, and the practice of psychology in delivering applied research and interventions aimed at solving problems and promoting optimal development and functioning at the individual, family, group, organization/institution, community, and national levels. Graduates could be licensed psychometricians, work in the academe, human resource, research, pursue specializations in clinical, counselling, developmental, etc., or careers in medicine, law, or management.</p>
          </div>

          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-airplane-engines"></i></div>
              <h4 class="title"><a href="">Bachelor of Science in Tourism Management (BSTM)</a></h4>
              <p class="description">The program is a ladderized curriculum which provides students with specific skills and competencies to enhance their opportunities to work while studying. Students receive a Certificate in Tourism Sales and Marketing upon one year completion, an Associate in Travel and Tour Operation in the second year, a Diploma in Tourism Supervision in the third year and a Degree in Bachelor of Science in Tourism Management upon completion of the program. The Tourism Management Program covers the study of various components related to the travel and tour industry.</p>
          </div>

          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-pencil"></i></div>
              <h4 class="title"><a href="">Bachelor in Elementary Education (BEEd)</a></h4>
              <p class="description">Students of this program will be able to determine the appropriate pedagogical content knowledge for the different subject areas in Elementary education. Using varied approaches in teaching and learning, students will be exposed to the appropriate approaches, techniques, and methodologies for teaching the Elementary subjects highlighting differentiate instruction and inclusive education in the K to 12 curriculum.</p>
          </div>

          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-pen"></i></div>
              <h4 class="title"><a href="">Bachelor in Secondary Education  (BSEd)</a></h4>
              <p class="description">The program is a four-year undergraduate program of the 2018 curriculum which aims to prepare aspiring educators who intend to teach in the secondary junior and / or senior high school basic education level. Specifically, the program aims to develop highly competent teacher-researchers who specialize in secondary education content, pedagogy, and research.</p>
          </div> --}}

      </div>

    </div>
  </section><!-- End Programs Offered Section -->

@endsection
