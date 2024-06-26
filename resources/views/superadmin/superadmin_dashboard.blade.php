@extends('superadmin.superadmin_master')
@section('title','Dashboard')
@section('content')
    <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
    @if (Session::has('success'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-1" style="margin-right: 5px"></i>
          <strong style="font-weight: bolder">{{session::get('success')}}</strong> {{ __('You are logged in as Superadmin!!') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
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
          <div class="mt-4">

          </div>
          <!-- Recent Activity -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Recent Activity <span>| This Month</span></h5>

            <div class="activity">
              <div class="activity-title d-flex">
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activite-label" style="margin-bottom: 10px"> 
                    <a href="{{ route('carousel_items.index') }}" class="fw-bold text-primary"> Carousel Items</a>
                  </div>
              </div><!-- End activity title-->

              @php ($a = 0)
              @foreach($carouselItem as $carousel_item)
                <div class="activity-item d-flex">
                  @if ($carousel_item->created_at->format('m') == $month)
                    @php ($a++)
                    <img src="{{  asset('storage/' . $carousel_item->featured_image) }}" alt="">
                    <div class="activite-label">
                      @if ($cardiff[$carousel_item->id][0] < 60)
                        {{ $cardiff[$carousel_item->id][0] }} sec ago
                      @elseif ($cardiff[$carousel_item->id][1] < 60)   
                        {{ $cardiff[$carousel_item->id][1] }} min ago
                      @elseif ($cardiff[$carousel_item->id][2] < 24)   
                        {{ $cardiff[$carousel_item->id][2] }} hr ago
                      @elseif ($cardiff[$carousel_item->id][3] <= 31)   
                        {{ $cardiff[$carousel_item->id][3] }} day ago
                      @endif
                    </div>
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">
                      {{ $carousel_item->title }}<br><br>
                      <p>{!! Str::limit($carousel_item->content,'250','...') !!}</p>
                    </div>
                  @endif
                </div><!-- End activity item-->
              @endforeach
              @if (empty($a))
                <div class="activity-content">
                  No New Data
                </div>    
              @endif

              <div class="activity-title d-flex" style="margin-top: 20px">
                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activite-label" style="margin-bottom: 10px"> 
                    <a href="{{ route('news.index') }}" class="fw-bold text-primary"> News Items</a>
                  </div>
              </div><!-- End activity title-->

              @php ($a = 0)
              @foreach($newsItem as $news_item)
                <div class="activity-item d-flex">
                  @if ($news_item->created_at->format('m') == $month)
                    @php ($a++)
                    <img src="{{ asset('storage/' . $news_item->news_image) }}" alt="">
                    <div class="activite-label">
                      @if ($newsdiff[$news_item->id][0] < 60)
                        {{ $newsdiff[$news_item->id][0] }} sec ago
                      @elseif ($newsdiff[$news_item->id][1] < 60)   
                        {{ $newsdiff[$news_item->id][1] }} min ago
                      @elseif ($newsdiff[$news_item->id][2] < 24)   
                        {{ $newsdiff[$news_item->id][2] }} hr ago
                      @elseif ($newsdiff[$news_item->id][3] <= 31)   
                        {{ $newsdiff[$news_item->id][3] }} day ago
                      @endif
                    </div>
                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                    <div class="activity-content">
                      {{ $news_item->news_title }}
                      <p>{!! Str::limit($news_item->news_content,'250','...') !!}</p>
                    </div>
                  @endif
                </div><!-- End activity item-->
              @endforeach
              @if (empty($a))
                <div class="activity-content">
                  No New Data
                </div>    
              @endif

              <div class="activity-title d-flex" style="margin-top: 20px">
                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activite-label" style="margin-bottom: 10px"> 
                    <a href="{{ route('announcements.index') }}" class="fw-bold text-primary"> Announcement Items</a>
                  </div>
              </div><!-- End activity title-->

              @php ($a = 0)
              @foreach($announcementItem as $announcement_item)
                <div class="activity-item d-flex">
                  @if ($announcement_item->created_at->format('m') == $month)
                    @php ($a++)
                    <img src="{{ asset('storage/' . $announcement_item->poster) }}" alt="">
                    <div class="activite-label">
                      @if ($announcementdiff[$announcement_item->id][0] < 60)
                        {{ $announcementdiff[$announcement_item->id][0] }} sec ago
                      @elseif ($announcementdiff[$announcement_item->id][1] < 60)   
                        {{ $announcementdiff[$announcement_item->id][1] }} min ago
                      @elseif ($announcementdiff[$announcement_item->id][2] < 24)   
                        {{ $announcementdiff[$announcement_item->id][2] }} hr ago
                      @elseif ($announcementdiff[$announcement_item->id][3] <= 31)   
                        {{ $announcementdiff[$announcement_item->id][3] }} day ago
                      @endif
                    </div>
                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                    <div class="activity-content">
                      {{ $announcement_item->title }}
                      <p>{!! Str::limit($announcement_item->content,'250','...') !!}</p>
                    </div>
                  @endif
                </div><!-- End activity item-->
              @endforeach
              @if (empty($a))
                <div class="activity-content">
                  No New Data
                </div>    
              @endif

              <div class="activity-title d-flex" style="margin-top: 20px">
                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activite-label" style="margin-bottom: 10px"> 
                    <a href="/events" class="fw-bold text-primary"> Event Items</a>
                  </div>
              </div><!-- End activity title-->

              @php ($a = 0)
              @foreach($eventItem as $event_item)
                <div class="activity-item d-flex">
                  @if ($event_item->created_at->format('m') == $month)
                    @php ($a++)
                    <div class="activite-label">
                      @if ($eventdiff[$event_item->id][0] < 60)
                        {{ $eventdiff[$event_item->id][0] }} sec ago
                      @elseif ($eventdiff[$event_item->id][1] < 60)   
                        {{ $eventdiff[$event_item->id][1] }} min ago
                      @elseif ($eventdiff[$event_item->id][2] < 24)   
                        {{ $eventdiff[$event_item->id][2] }} hr ago
                      @elseif ($eventdiff[$event_item->id][3] <= 31)   
                        {{ $eventdiff[$event_item->id][3] }} day ago
                      @endif
                    </div>
                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                    <div class="activity-content">
                      {{ $event_item->event_title }}<br><br>
                      <p class="descrip"><span style="font-weight: 700">Desciprtion: </span> <br>{!! Str::limit($event_item->event_description,'250','...') !!}</p>
                    </div>
                  @endif
                </div><!-- End activity item-->
              @endforeach
              @if (empty($a))
                <div class="activity-content">
                  No New Data
                </div>    
              @endif

            </div>

          </div>
        </div><!-- End Recent Activity -->
        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

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
        </div>
        <!-- End Website Traffic -->
        </div><!-- End Website Traffic -->

      </div><!-- End Right side columns -->

    </div>
  </section>
@endsection
