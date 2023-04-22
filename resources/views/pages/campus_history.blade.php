@extends('layouts.show')
<head>
    <!-- Main CSS File -->
    <link href="{{ asset('css/history.css') }}" rel="stylesheet">

  </head>
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    @include('incshow.bread')
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>About</li>
          <li>Campus History</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= History Section ======= -->
  <section id="history" class="history">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3><span>Tanza Campus</span> History</h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

    @foreach ($campus_history as $campushistory)
        <div class="row gy-4">
            <div class="col-lg-6">
                <h3>{{ $campushistory->title }}</h3>
                <img src="{{ asset('storage/' . $campushistory->image) }}" alt="{{ $campushistory->title }}" class="img-fluid rounded-4 mb-4">
                {{-- <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur fugiat voluptas ea.</p>
                <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut omnis beatae neque deleniti repellendus.</p> --}}
            </div>
            <div class="col-lg-6">
                <div class="content ps-0 ps-lg-5">
                    {{-- <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda culpa recusandae magnam nostrum deleniti voluptates odit dolor inventore necessitatibus officiis veritatis enim doloremque nisi ullam non quia, harum numquam eius.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos ducimus soluta dolore aliquam ipsum quidem numquam. Impedit eos atque ipsam aliquam numquam sequi cumque a animi quod itaque, commodi quaerat?
                    </p> --}}
                    <p>
                        {{ $campushistory->body }}
                    </p>

                    {{-- <div class="position-relative mt-4">
                        <img src="{{ asset('img/tanza.jpg') }}" class="img-fluid rounded-4" alt="">
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                    </div> --}}
                </div>
            </div>
        </div>
    @endforeach

    </div>
  </section><!-- End History Section -->
@endsection
