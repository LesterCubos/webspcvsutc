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

      <div class="section-title">
        <h3>Central<span> Student Government</span></h3>
      </div>
      @foreach ($csgs as $csg)
      <div class="info">
        <h2>{{ $csg->title }}</h2>
        <p>{!! $csg->content !!}
        </p>
      </div>

      <div class="section-title">
        <h3>CSG Members</span></h3>
      </div>

      <table class="table table-bordered table-hover">
        <thead class="table-dark">
          <tr>
            <th scope="col">NAME</th>
            <th scope="col">POSITION</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">{{ $csg->name }}</th>
            <td>{{ $csg->position }}</td>
          </tr>
        </tbody>
      </table>
      @endforeach
    </div>
  </section><!-- End CSG Section -->

@endsection
