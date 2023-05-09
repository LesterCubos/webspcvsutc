@extends('layouts.show')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Adminstration</li>
          <li>Office of the Campus Registrar</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Ocr Section ======= -->
<section id="ocr" class="ocr">
    <div class="container" data-aos="fade-up">

      <ul class="nav nav-tabs row  g-2 d-flex">

        <li class="nav-item col-3">
          <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
            <h4>Instruction</h4>
          </a>
        </li><!-- End tab nav item -->

        <li class="nav-item col-3">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
            <h4>PIctures</h4>
          </a><!-- End tab nav item -->

      </ul>

      <div class="tab-content">

        <div class="tab-pane active show" id="tab-1">
          <div class="row">
            @foreach ( $office_registrars as $office_registrar )
            <div class="col flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3>{{ $office_registrar->title }}</h3>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  {!! $office_registrar->content !!}
                </ul>
            </div>
            @endforeach

          </div>
        </div><!-- End tab content item -->

        <div class="tab-pane" id="tab-2">
          <div class="row">

            @foreach ( $office_registrars as $office_registrar )
            <div class="col d-flex flex-column justify-content-center">
                <h3>{{ $office_registrar->title }}</h3>
                <p class="fst-italic">
                  {!! $office_registrar->content !!}
                </p>
                <br>
            <img src="{{ asset('storage/' . $office_registrar->pic) }}" alt="{{ $office_registrar->title}}" srcset="" class="img-fluid">
            </div>
            @endforeach

          </div>
        </div><!-- End tab content item -->

      </div>

    </div>
</section><!-- End Ocr Section -->


@endsection


