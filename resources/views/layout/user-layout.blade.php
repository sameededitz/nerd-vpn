<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('partials.home.head')
</head>

<body>

    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--==============================
    Mobile Menu
    ============================== -->
    @include('partials.home.mobile')
    <!--==============================
     Preloader
    ==============================-->
    <div class="preloader">
        <button class="vs-btn preloaderCls">Cancel Preloader </button>
        <div class="preloader-inner text-center">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="64px">
            <span class="loader"></span>
        </div>
    </div>
    <!--==============================
    Header Area
    ==============================-->
    @include('partials.home.navbar')

    @yield('content')

    <!--==============================
 Footer Area
 ==============================-->
    @include('partials.home.footer')
    <!-- Scroll To Top -->
    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>

    <!--********************************
   Code End  Here
 ******************************** -->

    <!--==============================
        All Js File
    ============================== -->
    @include('partials.home.scripts')
    @yield('scripts')

</body>

</html>
