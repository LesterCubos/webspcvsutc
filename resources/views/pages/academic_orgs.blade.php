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
          <li>Academic and Non-Academic Organizations</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Academic Organization Section ======= -->
<section id="acad" class="acad">
    <div class="container" data-aos="fade-up">

      @foreach ($about_orgs as $about_org)

      @if ($about_org->type == 'Academic Organization')
        @if ($about_org->org_name != 'Central Student Government')
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
        @endif
      @endif
      @endforeach
    </div>
  </section><!-- End CSG Section -->

@endsection
