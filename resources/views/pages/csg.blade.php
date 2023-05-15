@extends('layouts.show')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Student Affairs</li>
          <li>Central Student Government</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= CSG Section ======= -->
<section id="csg" class="csg">
    <div class="container" data-aos="fade-up">

      @foreach ($about_orgs as $about_org)
      <div class="section-title">
        <h3><span>{{ $about_org->org_name }}</span></h3>
      </div>
        <p>{{ $about_org->type }}</p>
        <br>
      <div class="info">
        <p>{!! $about_org->desc !!}</p>
      </div>

      <div>
        <h3><span>{{ $about_org->org_name }}</span> Members</h3><br>
        <p>{!! $about_org->org_members !!}</p>
      </div>

      @endforeach
    </div>
  </section><!-- End CSG Section -->

@endsection
