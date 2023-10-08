@extends('layouts.show')
@section('title','Office of Student Affairs and Services')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Administration</li>
          <li>Office of the Student Affairs and Services</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

<!-- ======= Office of the Student Affairs Services Section ======= -->
<section id="osas" class="osas">
  <div class="container" data-aos="fade-up">
      
    <article class="entry entry-single">
      @foreach ( $osass as $osas )
        <div class="entry-img">
          <img src="{{ asset('storage/' . $osas->img) }}" alt="{{ $osas->title}}" class="img-fluid">
        </div>
  
        <h2 class="entry-title">
          {{ $osas->title}}
        </h2>
  
        <div class="entry-content">
          <p>
            {!! $osas->content !!}
          </p>
        </div>
      @endforeach
    </article>

  </div>
</section><!-- End Office of the Student Affairs Services Section -->


@endsection
