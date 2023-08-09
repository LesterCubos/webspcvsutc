{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
    <h2>
      <?php  date_default_timezone_set('Asia/Manila');
        echo "Today is " . date("l, m-d-Y. h:i a");?>
    </h2>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Total View Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card metrics-card">

              <div class="card-body">
                <h5 class="card-title"> Total<span> | Visitors</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <span class="text-success small pt-1 fw-bold">{{ $todayVisits }}</span> <span class="text-muted small pt-2 ps-1"> Today</span><br>
                    <span class="text-success small pt-1 fw-bold">{{ $monthVisits }}</span> <span class="text-muted small pt-2 ps-1"> This Month</span><br>
                    <span class="text-success small pt-1 fw-bold">{{ $yearVisits }}</span> <span class="text-muted small pt-2 ps-1"> This Year</span><br>
                    <span class="text-success small pt-1 fw-bold">{{ $totalVisits }}</span> <span class="text-muted small pt-2 ps-1"> Total</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Total View Card -->

          <!-- clockCard -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card metrics-card">

              <div class="card-body">
                <h5 class="card-title">Total <span>| Views</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-eye"></i>
                  </div>
                  <div class="ps-3">
                    <span class="text-success small pt-1 fw-bold">{{ $totalNews }}</span> <span class="text-muted small pt-2 ps-1"> News</span><br>
                    <span class="text-success small pt-1 fw-bold">{{ $totalAnnouncement }}</span> <span class="text-muted small pt-2 ps-1"> Announcements</span><br>
                    <span class="text-success small pt-1 fw-bold">{{ $totalEvents }}</span> <span class="text-muted small pt-2 ps-1"> Events</span>
                  </div>
                </div>
              </div>
              

            </div>
          </div><!-- End Clock Card -->

          <!-- clockCard -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card metrics-card">

              <div class="card-body">
                <h5 class="card-title">Total <span>| Number</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-newspaper"></i>
                  </div>
                  <div class="ps-3">
                    <span class="text-success small pt-1 fw-bold">{{ $newscount }}</span> <span class="text-muted small pt-2 ps-1"> News</span><br>
                    <span class="text-success small pt-1 fw-bold">{{ $announcementcount }}</span> <span class="text-muted small pt-2 ps-1"> Announcements</span><br>
                    <span class="text-success small pt-1 fw-bold">{{ $eventscount }}</span> <span class="text-muted small pt-2 ps-1"> Events</span>
                  </div>
                </div>
              </div>
              

            </div>
          </div><!-- End Clock Card -->

          <div class="d-grid gap-2 mt-3">
            <a class="btn btn-primary" type="button" href="http://127.0.0.1:8000/"  target="_blank" style="font-size: 20px; font-weight: bold">Live Button</a>
          </div>

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">
        
          <div class="card-body">
            <h5 class="card-title">Recent Activity <span>| This Month</span></h5>

            <div class="activity">

              <div class="activity-item d-flex">
                
                  <div class="activite-label">ID</div>
                  {{-- <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i> --}}
                  <div class="activity-content">
                    <a href="" class="fw-bold text-primary"> Activity Description</a>
                  </div>
                
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                @foreach($carouselItem as $carousel_item)
                  <div class="activite-label">{{ $carousel_item->id }}</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    {!! Str::limit($carousel_item->title,'25','...') !!}<a href="{{ route('carousel_items.index') }}" class="fw-bold text-dark"> Carousel Item</a>
                  </div>
                @endforeach
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                @foreach($newsItem as $news_item)
                  <div class="activite-label">{{ $news_item->id }}</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    {!! Str::limit($news_item->news_headline,'25','...') !!}<a href="{{ route('news.index') }}" class="fw-bold text-dark"> News Item</a>
                  </div>
                @endforeach
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                @foreach($announcementItem as $announcement_item)
                  <div class="activite-label">{{ $announcement_item->id }}</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    {!! Str::limit($announcement_item->title,'25','...') !!}<a href="{{ route('announcements.index') }}" class="fw-bold text-dark"> Announcement Item</a>
                  </div>
                @endforeach
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                @foreach($eventItem as $event_item)
                <div class="activite-label">{{ $event_item->id }}</div>
                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                <div class="activity-content">
                  {!! Str::limit($event_item->event_title,'25','...') !!}<a href="/events" class="fw-bold text-dark"> Event Item</a>
                </div>
                @endforeach
              </div><!-- End activity item-->

            </div>

          </div>
        </div><!-- End Recent Activity -->

        <!-- Website Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">Website Traffic <span>| Today</span></h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 1048,
                        name: 'Page Load Time'
                      },
                      {
                        value: 735,
                        name: 'Server Response Time'
                      },
                      {
                        value: 580,
                        name: 'Error Pages'
                      },
                      {
                        value: 484,
                        name: 'Uptime'
                      },
                      {
                        value: 300,
                        name: 'Browser Compatibility'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->

      </div><!-- End Right side columns -->

    </div>
  </section>
@endsection
