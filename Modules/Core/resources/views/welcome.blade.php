<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Title -->
        <title>POS | Landing Page</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Favicons -->
        <link href="{{ URL::asset('assets/front/img/favicon.png') }}" rel="icon">
        {{-- <link href="{{ URL::asset('assets/front/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- CSS Files -->
        @if (App::getLocale() == 'ar')
          <link href="{{ URL::asset('assets/front/vendor/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">

        @else
            <link href="{{ URL::asset('assets/front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        @endif
        <link href="{{ URL::asset('assets/front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/front/css/style.css') }}" rel="stylesheet">

    </head>
    <body>
      <!-- ======= Header ======= -->
      <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ URL::asset('assets/front/logo.svg') }}" alt="">
            <span></span>
          </a>

          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="{{ route('dashboard.index') }}">Home</a></li>
              {{-- <li><a class="nav-link scrollto" href="javascript:void(0);">About</a></li>
              <li><a class="nav-link scrollto" href="javascript:void(0);">Services</a></li>
              <li><a class="nav-link scrollto" href="javascript:void(0);">Portfolio</a></li>
              <li><a class="nav-link scrollto" href="javascript:void(0);">Team</a></li>
              <li><a href="javascript:void(0);">Blog</a></li>
              <li class="dropdown"><a href="javascript:void(0);"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="javascript:void(0);">Drop Down 1</a></li>
                  <li class="dropdown"><a href="javascript:void(0);"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                      <li><a href="javascript:void(0);">Deep Drop Down 1</a></li>
                      <li><a href="javascript:void(0);">Deep Drop Down 2</a></li>
                      <li><a href="javascript:void(0);">Deep Drop Down 3</a></li>
                      <li><a href="javascript:void(0);">Deep Drop Down 4</a></li>
                      <li><a href="javascript:void(0);">Deep Drop Down 5</a></li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0);">Drop Down 2</a></li>
                  <li><a href="javascript:void(0);">Drop Down 3</a></li>
                  <li><a href="javascript:void(0);">Drop Down 4</a></li>
                </ul>
              </li> --}}
                @if (Route::has('login'))
                    @auth
                        <li><a class="getstarted scrollto" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    @else
                        @if (Route::has('register'))
                            <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
                        @endif
                        <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                    @endauth
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </header><!-- End Header -->

      <!-- ======= Hero Section ======= -->
      <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
          <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
              <h1 data-aos="fade-up">We offer modern solutions for growing your business</h1>
              <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented designers making websites with Bootstrap</h2>
              <div data-aos="fade-up" data-aos-delay="600">
                <div class="text-center text-lg-start">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Get Started</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Get Started</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @endauth
                    @endif
                </div>
              </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
              <img src="{{ URL::asset('assets/front/img/hero-img.png') }}" class="img-fluid" alt="">
            </div>
          </div>
        </div>

      </section><!-- End Hero -->

      <!-- ======= Script ======= -->
      <script src="{{ URL::asset('assets/front/js/main.js') }}"></script>
    </body>
</html>
