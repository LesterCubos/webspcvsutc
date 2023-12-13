@extends('layouts.show')
@section('title','Admission Requirement Procedures')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Admission</li>
          <li>Admission Requirements Procedures</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->
<!-- ======= requirements_procedure Section ======= -->
<section id="admissionrandp" class="admissionrandp">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3>Admission<span> Requirements and Procedures</span></h3>
      </div>

      @foreach ($requirements_procedures as $requirements_procedure)
        <h3 class="title">{{ $requirements_procedure->title }}</span></h3>
        <div class="imfo">
          <p>{!! $requirements_procedure->content !!}</p>
        </div>

        <div class="orgimg" data-aos="zoom-in" data-aos-delay="200">
          <img style="width: 100%" src="{{ asset('storage/' . $requirements_procedure->img) }}"  alt="{{ $requirements_procedure->title }}">
        </div>
      @endforeach


</section>


@endsection

