@extends('layouts.show')
@section('title','CvSU-Tanza Departments')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Administration</li>
          <li>Departments</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= dom Section ======= -->
<section id="dept" class="dept">
    <div class="container" data-aos="fade-up">
      
        <ul class="nav nav-tabs row  g-2 d-flex">

            <li class="nav-item col-3">
              <a id="link1" class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                <h4>Department of Information Technology</h4>
              </a>
            </li><!-- End tab nav item -->
  
            <li class="nav-item col-3">
              <a id="link2" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                <h4>Teacher Education Department</h4>
              </a><!-- End tab nav item -->
  
            <li class="nav-item col-3">
              <a id="link3" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                <h4>Department of Arts and Sciences</h4>
              </a>
            </li><!-- End tab nav item -->
  
            <li class="nav-item col-3">
              <a id="link4" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                <h4>Department of Management</h4>
              </a>
            </li><!-- End tab nav item -->
  
          </ul>
  
          <div class="tab-content">
  
            <div class="tab-pane active show" id="tab-1">
              <div>
                <div id="card1" class="card">
                  @foreach ($dits as $dit)
                    <div class="card-img">
                      <img src="{{ asset('storage/' . $dit->img) }}" alt="{{ $dit->title }}">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><a href="">{{ $dit->title }}</a></h5>
                      <p class="card-text">{!! $dit->content !!}</p>
                    </div>
                  @endforeach
                </div>
              </div>
            </div><!-- End tab content item -->
  
            <div class="tab-pane" id="tab-2">
              <div>
                <div id="card2" class="card">
                  @foreach ($teds as $ted)
                    <div class="card-img">
                      <img src="{{ asset('storage/' . $ted->img) }}" alt="{{ $ted->title }}">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><a href="">{{ $ted->title }}</a></h5>
                      <p class="card-text">{!! $ted->content !!}</p>
                    </div>
                  @endforeach
                </div>
              </div>
            </div><!-- End tab content item -->
  
            <div class="tab-pane" id="tab-3">
              <div>
                <div id="card3" class="card">
                  @foreach ($dass as $das)
                    <div class="card-img">
                      <img src="{{ asset('storage/' . $das->img) }}" alt="{{ $das->title }}">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><a href="">{{ $das->title }}</a></h5>
                      <p class="card-text">{!! $das->content !!}</p>
                    </div>
                  @endforeach
                </div>
              </div>
            </div><!-- End tab content item -->
  
            <div class="tab-pane" id="tab-4">
              <div>
                <div id="card4" class="card">
                  @foreach ($doms as $dom)
                    <div class="card-img">
                      <img src="{{ asset('storage/' . $dom->img) }}" alt="{{ $dom->title }}">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><a href="">{{ $dom->title }}</a></h5>
                      <p class="card-text">{!! $dom->content !!}</p>
                    </div>
                  @endforeach
                </div>
              </div>
            </div><!-- End tab content item -->
  
          </div>

    </div>
</section>

@endsection
