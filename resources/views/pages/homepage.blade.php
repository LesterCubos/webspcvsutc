<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'CvSU Tanza') }}</title>

        <!-- Icon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/Cavite_State_University_(CvSU).png') }}">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=McLaren&family=Poppins:wght@400;500;600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}

        <!-- Styles -->
        {{-- <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style> --}}

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">

        {{-- Main CSS File --}}
        <link rel="stylesheet" href="{{ asset('css/mainshow.css') }}">

        {{-- @livewireStyles --}}
    </head>
    <body class="antialiased">
        @include('incshow.header')
        {{-- <livewire:multiple-toggle-switches />
        @livewireScripts --}}
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex flex-column justify-content-end position-relative">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

              <!-- Slide 1 -->


                <div class="carousel-inner">
                    @foreach($carousel_items as $carousel_item)

                    @if ($loop->iteration == 1 )
                        <!-- Slide 1 -->
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('storage/' . $carousel_item->featured_image) }}" alt="{{ $carousel_item->title }}">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <h1 class="animate__animated animate__fadeInDown">{{ $carousel_item->title }}</h1>
                                    <p class="animate__animated animate__fadeInUp"> {{ $carousel_item->content }}</p>
                                    <div class="d-flex justify-content-center justify-content-lg-start">
                                        <p><a class="btn btn-lg btn-light btn-get-started animate__animated animate__fadeInUp scrollto" href="#">Sign up today</a></p>
                                        <p><a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video animate__animated animate__fadeInUp"><i class="bi bi-play-circle"></i><span>Watch Video</span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($loop->iteration == 2)
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('storage/' . $carousel_item->featured_image) }}" alt="{{ $carousel_item->title }}">
                            <div class="container">
                            <div class="carousel-caption">
                                <h1 class="animate__animated animate__fadeInDown">{{ $carousel_item->title }}</h1>
                                <p class="animate__animated animate__fadeInUp">{{ $carousel_item->content }}</p>
                                <p><a class="btn btn-lg btn-light btn-get-started animate__animated animate__fadeInUp scrollto" href="#">Learn more</a></p>
                            </div>
                            </div>
                        </div>
                    @elseif ($loop->iteration == 3)
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('storage/' . $carousel_item->featured_image) }}" alt="{{ $carousel_item->title }}">
                            <div class="container">
                              <div class="carousel-caption text-end">
                                <h1 class="animate__animated animate__fadeInDown">{{ $carousel_item->title }}</h1>
                                <p class="animate__animated animate__fadeInUp">{{ $carousel_item->content }}</p>
                                <p><a class="btn btn-lg btn-light btn-get-started animate__animated animate__fadeInUp scrollto" href="#">Browse gallery</a></p>
                              </div>
                            </div>
                          </div>
                    @else
                        <!-- Slide -->
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('storage/' . $carousel_item->featured_image) }}" alt="{{ $carousel_item->title }}">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <h1 class="animate__animated animate__fadeInDown">{{ $carousel_item->title }}</h1>
                                    <p class="animate__animated animate__fadeInUp"> {{ $carousel_item->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @endforeach
                </div>




              <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
              </a>

              <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
              </a>

            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
              <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
              </defs>
              <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
              </g>
              <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
              </g>
              <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
              </g>
            </svg>

        </section>
        <!-- End Hero Section -->

        <main id="main">

            <!-- ======= Featured Services Section ======= -->
            <section id="featured-services" class="featured-services">
                {{-- @if()


                @else --}}
                <div class="container" data-aos="fade-up">

                    <div class="row gy-4">
                        @foreach($featured_services as $featured_service)

                            <div class="col col-lg-4 col-md-6 service-item d-flex">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <h4 class="title"><a href="">{{ $featured_service->title }}</a></h4>
                                <p class="description">{{ $featured_service->content }}</p>
                            </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                {{-- @endif --}}
            </section>

            <!-- End Featured Services Section -->

            <!-- ======= Discover Section ======= -->
            <section id="discover" class="discover section-bg">
                <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Discover <span>Tanza Campus</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam quo laudantium iure itaque nihil inventore laborum</p>
                </div>

                <div class="row">
                    @foreach($discover_tanza_infos as $discover_tanza_info)
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <img class="img-fluid" src="{{ asset('storage/' . $discover_tanza_info->image) }}" alt="{{ $discover_tanza_info->headline }}">
                            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                            <h3>{{ $discover_tanza_info->headline }}</h3>
                            <p class="fst-italic">
                                {{ $discover_tanza_info->subheadline }}
                            </p>
                            <p>

                                {{ $discover_tanza_info->content }}
                            </p>
                        </div>
                    @endforeach
                </div>

                </div>
            </section>
            <!-- End Discover Section -->

            <!-- ======= Counts Section ======= -->
            <section id="counts" class="counts">
                <div class="container" data-aos="fade-up">

                <div class="row">
                    @foreach($counts as $count)
                        @if ($loop->iteration == 1 )
                            <div class="col-lg-3 col-md-6">
                                <div class="count-box">
                                    <i class="bi bi-person"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $count->value }}" data-purecounter-duration="1" class="purecounter"></span>
                                    <p>{{ $count->category }}</p>
                                </div>
                            </div>
                        @elseif ($loop->iteration == 2 )
                            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                                <div class="count-box">
                                    <i class="bi bi-journal-richtext"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $count->value }}" data-purecounter-duration="1" class="purecounter"></span>
                                    <p>{{ $count->category }}</p>
                                </div>
                            </div>
                        @elseif ($loop->iteration == 3 )
                            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                                <div class="count-box">
                                    <i class="bi bi-headset"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $count->value }}" data-purecounter-duration="1" class="purecounter"></span>
                                    <p>{{ $count->category }}</p>
                                </div>
                            </div>
                        @elseif ($loop->iteration == 4 )
                            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                                <div class="count-box">
                                    <i class="bi bi-stickies"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $count->value }}" data-purecounter-duration="1" class="purecounter"></span>
                                    <p>{{ $count->category }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                </div>
            </section>
            <!-- End Counts Section -->

            <!-- ======= Program Section ======= -->
            <section id="programs" class="programs section-bg">
                <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Our <span>Programs</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam quo laudantium iure itaque nihil inventore laborum</p>
                </div>

                <div class="row gy-5">
                    @foreach($programs as $program)
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">

                        <div class="programs-item">
                        <div class="img">
                        <img src="{{ asset('storage/' . $program->program_image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                        <div class="icon">
                            <i class="bi bi-controller"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>{{ $program->title }}</h3>
                        </a>
                        <p>{{ $program->content }}</p>
                        </div>
                    </div>

                    </div><!-- End Program Item -->
                    @endforeach
                    {{-- <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="programs-item">
                        <div class="img">
                        <img src="assets/img/programs-2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                        <div class="icon">
                            <i class="bi bi-eye"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Lyssa</h3>
                        </a>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo rerum voluptatibus perferendis perspiciatis corporis dolore reprehenderit, alias minus unde animi at ipsum quas ea beatae soluta quisquam. Consequuntur, nemo neque.</p>
                        </div>
                    </div>
                    </div><!-- End Program  Item --> --}}

                    {{-- <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="programs-item">
                        <div class="img">
                        <img src="assets/img/programs-3.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                        <div class="icon">
                            <i class="bi bi-car-front"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Jerome</h3>
                        </a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea enim consequuntur voluptatem quidem architecto aperiam amet obcaecati! Soluta esse odio error? Libero illo sequi suscipit fugit laborum voluptate ipsa tenetur.</p>
                        </div>
                    </div>
                    </div><!-- End Program  Item --> --}}

                </div>

                </div>
            </section>
            <!-- End Program  Section -->

            @if(session('show_section', false))
            <!-- ======= Admission Section ======= -->
            <section id="admissions" class="admissions">
                <div class="container" data-aos="zoom-in">

                    <div class="section-title">
                        <h3><span>Admissions</span> On Going</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam quo laudantium iure itaque nihil inventore laborum</p>
                    </div>

                    <div class="row">
                        @foreach($admissions as $admission)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box">
                                    <div class="icon">
                                        <i class='bx bxs-edit'></i>
                                    </div>
                                    <h4>{{ $admission->title }}</h4>
                                    <p>{{ $admission->descrip }}</p>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-apply">Apply Now <i class="bi bi-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </section>
            <!-- End Admission Section -->
            @endif


            <!-- ======= News and updates Section ======= -->
            <section id="newsandupdates" class="newsandupdates section-bg">
                <div class="section-title">
                <h3><span>News</span> and Updates</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam quo laudantium iure itaque nihil inventore laborum</p>
                </div>

                <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                    <div class="accordion-list">
                        <ul>
                            {{-- @php
                            $increment = 1;
                            @endphp --}}
                            @foreach($news as $new)

                        @if ($loop->iteration == 1 )
                        <li>
                            <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> {{ $new->news_title }}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                {{-- @php
                                $increment++;
                                @endphp --}}
                            <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                            <p>
                                {{ $new->news_headline }}

                            </p>
                            </div>
                        </li>
                        @elseif ($loop->iteration == 2)
                        <li>
                            <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> {{ $new->news_title }}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                            <p>
                                {{ $new->news_headline }}
                            </p>
                            </div>
                        </li>
                        @elseif ($loop->iteration == 3)
                        <li>
                            <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> {{ $new->news_title }}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                            <p>
                                {{ $new->news_headline }}
                            </p>
                            </div>
                        </li>
                        @elseif ($loop->iteration == 4)
                        <li>
                            <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>04</span> {{ $new->news_title }}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                            <p>{{ $new->news_headline }}</p>
                            </div>
                        </li>
                        @elseif ($loop->iteration == 5)
                        <li>
                            <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5" class="collapsed"><span>05</span> {{ $new->news_title }} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                            <p>{{ $new->news_headline }} </p>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        </ul>
                    </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                    <div id="carouselIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div>
                        <div class="carousel-inner" id="carousel-inner">
                            @foreach ( $news as $new )

                        @if ($loop->iteration == 1 )

                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" id="carousel-item">
                            <img src="{{ asset('storage/' . $new->news_image) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption text-start">
                            <h5 class="animate__animated animate__fadeInUp">Heading......1</h5>
                            </div>
                        </div>
                        @elseif ($loop->iteration == 2 )
                        <div class="carousel-item" id="carousel-item">
                            <img src="{{ asset('storage/' . $new->news_image) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption text-start">
                            <h5 class="animate__animated animate__fadeInUp">Heading......2</h5>
                            </div>
                        </div>
                        @elseif ($loop->iteration == 3 )
                        <div class="carousel-item" id="carousel-item">
                            <img src="{{ asset('storage/' . $new->news_image) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption text-start">
                            <h5 class="animate__animated animate__fadeInUp">Heading......3</h5>
                            </div>
                        </div>
                        @elseif ($loop->iteration == 4 )
                        <div class="carousel-item" id="carousel-item">
                            <img src="{{ asset('storage/' . $new->news_image) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption text-start">
                            <h5 class="animate__animated animate__fadeInUp">Heading......4</h5>
                            </div>
                        </div>
                        @elseif ($loop->iteration == 5 )
                        <div class="carousel-item" id="carousel-item">
                            <img src="{{ asset('storage/' . $new->news_image) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption text-start">
                            <h5 class="animate__animated animate__fadeInUp">Heading......5</h5>
                            </div>
                        </div>
                        @endif

                        @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

            </section>
            <!-- End News and Updates Section -->

            <!-- ======= Announcements Section ======= -->
            <section id="announcements" class="announcements">
                <div class="section-title">
                <h3>Latest <span>Announcements</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam quo laudantium iure itaque nihil inventore laborum</p>
                </div>

                <div class="container">
                @foreach($announcements as $announcement)

                @if ($loop->iteration == 1 )
                <div class="row gy-4 align-items-center announcements-item" data-aos="fade-up">

                    <div class="col-md-5">
                    <img src="{{ asset('storage/' . $announcement->poster) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7">
                    <h3>{{ $announcement->title }}</h3>
                    <p class="fst-italic">
                        {{ $announcement->content }}
                    </p>
                    {{-- <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste aut cupiditate aliquam maiores molestias eaque a commodi exercitationem expedita reprehenderit minima soluta iusto voluptas, culpa ipsa. Soluta laborum facere voluptas.
                    </p> --}}
                    </div>
                </div><!-- Announcement Item -->
                @elseif ($loop->iteration == 2 )
                <div class="row gy-4 align-items-center announcements-item" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                    <img src="{{ asset('storage/' . $announcement->poster) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 order-2 order-md-1">
                    <h3> {{ $announcement->title }}</h3>
                    <p class="fst-italic">
                        {{ $announcement->content }}
                    </p>
                    {{-- <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste aut cupiditate aliquam maiores molestias eaque a commodi exercitationem expedita reprehenderit minima soluta iusto voluptas, culpa ipsa. Soluta laborum facere voluptas.
                    </p> --}}
                    </div>
                </div><!-- Announcement Item -->
                @elseif ($loop->iteration == 3 )
                <div class="row gy-4 align-items-center announcements-item" data-aos="fade-up">
                    <div class="col-md-5">
                    <img src="{{ asset('storage/' . $announcement->poster) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7">
                    <h3> {{ $announcement->title }}</h3>
                    <p class="fst-italic">
                        {{ $announcement->content }}
                    </p>
                    {{-- <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste aut cupiditate aliquam maiores molestias eaque a commodi exercitationem expedita reprehenderit minima soluta iusto voluptas, culpa ipsa. Soluta laborum facere voluptas.
                    </p> --}}
                    </div>
                </div><!-- Announcement Item -->
                @endif
                @endforeach
                </div>
            </section>
            <!-- End Announcements Section -->

            <!-- ======= Events Section ======= -->
            <section id="events" class="events section-bg">
                <div class="section-title">
                <h3>Upcoming <span>Events</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam quo laudantium iure itaque nihil inventore laborum</p>
                </div>

                <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content">
                        <h3>View Full Calendar?</h3>
                        <div class="img-calendar">
                        <img src="{{ asset('img/calendar.webp') }}" alt="" width="300" height="150">
                        </div>
                        <div class="text-center">
                        <a href="" class="more-btn">View Calendar <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4">
                        @foreach ( $events as $event )
                        <div class="event d-flex align-items-start event1" data-aos="zoom-in" data-aos-delay="100">
                            <div class="event-info">
                            <h4>{{ $event->date }}</h4>
                            <span>{{ $event->event_title }}</span>
                            <p>{{ $event->desc }}</p>
                            </div>
                        </div>
                        @endforeach


                    {{-- <div class="event d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
                        <div class="event-info">
                        <h4>January 01, 2022</h4>
                        <span>New Year</span>
                        <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                        </div>
                    </div>

                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="event d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
                        <div class="event-info">
                        <h4>December 31, 2022</h4>
                        <span>New Year's Eve</span>
                        <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                        </div>
                    </div>


                    <div class="event d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                        <div class="event-info">
                        <h4>January 01, 2022</h4>
                        <span>New Year</span>
                        <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                        </div>
                    </div>

                    </div> --}}

                </div>

                </div>
            </section>
            <!-- End Events Section -->

            @include('incshow.footer')

        </main>


        @include('incshow.scroll-top')
        {{-- <div id="preloader">
            <div class="line"></div>
        </div> --}}
        @include('incshow.script')
    </body>
</html>
