@extends('layouts.show')
@section('title','Admission Result')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Admission</li>
          <li>Contact Information</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->
<!-- ======= admission_result Section ======= -->
<section id="admission_result" class="admission_result">
    <div class="container" data-aos="fade-up">
      @foreach ($admission_results as $admission_result)
      <div class="section-title">
        <h3><span>{{ $admission_result->title }}</span></h3>
      </div>

      <div class="imfo">
        <p>{!! $admission_result->content !!}
        </p>
      </div>

      <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
        <img style="width: 50%" src="{{ asset('storage/' . $admission_result->img) }}"  alt="{{ $admission_result->title }}">
      </div>
      @endforeach


</section>


@endsection

