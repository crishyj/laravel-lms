<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel = "stylesheet">
    <link href="{{ asset('frontend/assets/vendor/icofont/icofont.min.css') }}" rel = "stylesheet">
    <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel = "stylesheet">
    <link href="{{ asset('frontend/assets/vendor/remixicon/remixicon.css') }}" rel = "stylesheet">
    <link href="{{ asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel = "stylesheet">
    <link href="{{ asset('frontend/assets/vendor/animate.css/animate.min.css') }}" rel = "stylesheet">
    <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel = "stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel = "stylesheet">
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel = "stylesheet">
  </head>

<body>
    @yield('nav')
    @yield('content')


    <footer id="footer">

        <div class="footer-top">
          <div class="container">
            <div class="row">
             
            </div>
          </div>
        </div>
    
        <div class="container d-md-flex py-4">
    
          <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
              &copy; Copyright <strong><span>Ilona Melochek</span></strong>. All Rights Reserved
            </div>
            
          </div>
          <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>
      </footer>
    
      <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
      <div id="preloader"></div>
    <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/vendor/counterup/counterup.min.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}" defer></script>
</body>
