@extends('layouts.show')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="bread d-flex align-items-center"></div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>About</li>
          <li>Campus Officials</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

    <!-- ======= Campus Officials Section ======= -->
    <section id="campusofficials" class="campusofficials">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h3><span>KEY OFFICIALS AND SUPPORT PERSONNEL </span>ORGANIZATIONAL CHART</h3>
            <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
          </div>


          <div id="container">
            @foreach ($campus_officials as $campus_official)

                <img id="image" src="{{ asset('storage/' . $campus_official->org_image) }}" alt="{{ $campus_official->id }}" alt="Zoom and Drag Image">
            @endforeach
                <button id="zoom-in">Zoom In</button>
                <button id="zoom-out">Zoom Out</button>
                <button id="refresh">Refresh</button>
          </div>

          <br>
          {{-- table for Campus Official info --}}
          <table class="table table-bordered table-hover">
            <thead class="table-dark">
              <tr>
                <th scope="col">NAME</th>
                <th scope="col">POSITION</th>
                <th scope="col">CONTACT INFORMATION</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($campus_official_infos as $campus_official_info)
                <tr>
                    <th scope="row">{{ $campus_official->name }}</th>
                    <td>{{ $campus_official_info->position }}</td>
                    <td>{{ $campus_official_info->contact }}<br>{{ $campus_official_info->email }}</td>
                </tr>
              @endforeach
    
            </tbody>
          </table> 
        </div>
      </section><!-- End Campus Officials Section -->

      <script>
        var container = document.getElementById("container");
        var image = document.getElementById("image");
        var zoomInBtn = document.getElementById("zoom-in");
        var zoomOutBtn = document.getElementById("zoom-out");
        var refreshBtn = document.getElementById("refresh");
        var scale = 1;
        var isDragging = false;
        var startMouseX = 0;
        var startMouseY = 0;
        var startImageX = 0;
        var startImageY = 0;

        zoomInBtn.addEventListener("click", function() {
          scale += 0.1;
          image.style.transform = "scale(" + scale + ")";
        });

        zoomOutBtn.addEventListener("click", function() {
          scale -= 0.1;
          image.style.transform = "scale(" + scale + ")";
        });

        refreshBtn.addEventListener("click", function() {
          image.src = image.src + "?" + new Date().getTime();
          image.style.transform = "scale(1)";
          scale = 1;
        });

        image.addEventListener("mousedown", function(event) {
          isDragging = true;
          startMouseX = event.clientX;
          startMouseY = event.clientY;
          startImageX = image.offsetLeft;
          startImageY = image.offsetTop;
        });

        container.addEventListener("mousemove", function(event) {
          if (isDragging) {
            var deltaX = event.clientX - startMouseX;
            var deltaY = event.clientY - startMouseY;
            image.style.left = startImageX + deltaX + "px";
            image.style.top = startImageY + deltaY + "px";
          }
        });

        container.addEventListener("mouseup", function(event) {
          isDragging = false;
        });
      </script>
@endsection
