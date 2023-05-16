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
      <div class="title">
        <h2>{{ $about_org->org_name }}</h2>
        <p>{{ $about_org->type }}</p>
      </div>
      <div class="info">
        <p>{!! $about_org->desc !!}</p>
      </div>

      <div class="org_members">
        <h3>{{ $about_org->org_name }} Members</h3><br>
        <p>{!! $about_org->org_members !!}</p>
      </div>

      @endforeach
    </div>
  </section><!-- End CSG Section -->

@endsection
