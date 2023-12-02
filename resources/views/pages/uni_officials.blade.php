@extends('layouts.show')
@section('title','University Officials')
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>About</li>
          <li>University Officials</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= University Officials Section ======= -->
  <section id="uniofficials" class="uniofficials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3>University<span> Officials</span></h3>
      </div>



      <table class="table table-bordered table-hover">
        <thead class="table-dark">
          <tr>
            <th scope="col">NAME</th>
            <th scope="col">POSITION</th>
            <th scope="col">CONTACT INFORMATION</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($uni_officials as $uni_official)
            <tr>

                <th scope="row">{{ $uni_official->official_name }}</th>
                <td>{{ $uni_official->official_position }}</td>
                <td>{{ $uni_official->official_contactnum }}<br>{{ $uni_official->official_email }}</td>
            </tr>
          @endforeach

        </tbody>
      </table>


    </div>
  </section><!-- End University Officials Section -->

@endsection
