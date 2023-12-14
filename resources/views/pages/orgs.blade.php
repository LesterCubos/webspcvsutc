@extends('layouts.show')
@section('title','Student Organizations')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Services</li>
          <li>Students Organizations</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Student Org Section ======= -->
<section id="csg" class="csg">
    <div class="container" data-aos="fade-up">

      @foreach ($about_orgs as $about_org)
        @if ($about_org->org_name == 'Central Student Government')
          <div class="title">
            <h2>{{ $about_org->org_name }}</h2>
            <p>{{ $about_org->type }}</p>
          </div>
          <div class="info">
            <img class="text-center" src="{{ asset('storage/' . $about_org->org_logo) }}" style="width:250px" alt="{{ $about_org->org_logo }}">
            <p>{!! $about_org->desc !!}</p>
          </div>

          <div class="org_members">
            <h3>{{ $about_org->org_name }} Members</h3><br>
            <p>{!! $about_org->org_members !!}</p>
          </div>
        
        @elseif ($about_org->type == 'Academic Organization')
          @if ($about_org->org_name != 'Central Student Government')
            <div class="title">
              <h2>{{ $about_org->org_name }}</h2>
              <p>{{ $about_org->type }}</p>
            </div>
            <div class="info">
              <img src="{{ asset('storage/' . $about_org->org_logo) }}" alt="{{ $about_org->org_logo }}">
              <p>{!! $about_org->desc !!}</p>
            </div>

            <div class="org_members">
              <h3>{{ $about_org->org_name }} Members</h3><br>
              <p>{!! $about_org->org_members !!}</p>
            </div>
          @endif
        @elseif ($about_org->type == 'Non-Academic Organization')
          <div class="title">
            <h2>{{ $about_org->org_name }}</h2>
            <p>{{ $about_org->type }}</p>
          </div>
          <div class="info">
            <img class="text-center" src="{{ asset('storage/' . $about_org->org_logo) }}" style="width:250px" alt="{{ $about_org->org_logo }}">
            <p>{!! $about_org->desc !!}</p>
          </div>
          <div class="org_members">
            <h3>{{ $about_org->org_name }} Members</h3><br>
            <p>{!! $about_org->org_members !!}</p>
          </div>
        @endif
      @endforeach
    </div>
  </section><!-- End CSG Section -->

@endsection
