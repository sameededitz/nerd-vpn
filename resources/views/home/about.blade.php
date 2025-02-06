@extends('layout.user-layout')
@section('title')
    About Us | {{ Auth::user()->name ?? 'Guest' }}
@endsection
@section('content')
    <!--==============================
                                    Breadcumb
                                    ============================== -->
    <div class="breadcumb-wrapper Cover all esports & gamers needs"
        data-bg-src="{{ asset('assets/img-2/breadcumb-bg.jpg') }}">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
            </div>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu vs-btn2">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
                                    About Area
                                    ============================== -->
    <section class="about-layout1 style2 space">
        <div class="container">
            <div class="row gx-60 gy-5 align-items-center">
                <div class="col-xl-6">
                    <div class="about-img wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <img src="{{ asset('assets/img-2/about-img3.png') }}" alt="about-img">
                        <div class="shape-mockup z-index-n1 moving d-xl-block d-none" style="left: 0%; top: 0%;"><img
                                src="{{ asset('assets/img/shep/about-shep2.png') }}" alt="shapes"></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-content wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <div class="title-area text-left wow fadeInUp wow-animated" data-wow-delay="0.3s">
                            <span class="sec-subtitle2">About Us</span>
                            <h2 class="sec-title">Your Trusted Partner For Online Privacy & Freedom</h2>
                        </div>
                        <div class="about-body">
                            <p class="about-text">
                                At {{ config('app.name') }} , we are committed to providing secure, private, and
                                unrestricted internet access to
                                our users worldwide.
                                In an age where online privacy is more important than ever, our mission is to protect your
                                personal data.
                            </p>
                            <div class="list-style1">
                                <ul class="list-unstyled">
                                    <li>
                                        <span class="icon icon-btn">
                                            <img src="{{ asset('assets/img/icon/about-Icon-1-1.png') }}" alt="icon">
                                        </span>
                                        Government User
                                        <p class="text">We craft unique digital experiences. With more years of expertise
                                            we design</p>
                                    </li>
                                    <li>
                                        <span class="icon icon-btn">
                                            <img src="{{ asset('assets/img/icon/about-Icon-1-2.png') }}" alt="icon">
                                        </span>
                                        Hidden Hackers
                                        <p class="text">We craft unique digital experiences. With more years of expertise
                                            we design</p>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="about-btn">
                                <a href="about.html" class="vs-btn">Get It Now</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup z-index-n1 spin  d-xl-block d-lg-block d-none" style="right: 0%; bottom: 0%;"><img
                src="assets/img-2/about-shep3.png" alt="shapes"></div>
    </section>
    <!--==============================
                                    Service Area
                                    ============================== -->
    <section class="service-layout2 space-top space-extra-bottom mt-5" data-bg-src="assets/img/bg/service-bg.jpg">
        <div class="container position-relative wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <div class="row align-items-center ">
                <div class="col-lg-6">
                    <div class="title-area text-lg-start text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle">Services</span>
                        <h2 class="sec-title">Our Awesome & Valuable Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-wrap">
                        <div class="service-style3">
                            <div class="service-icon">
                                <img src="assets/img/icon/service-icon-2-2.svg" alt="icon">
                            </div>
                            <div class="service-body">
                                <h2 class="service-title h5"><a href="service-details.html">Threat Protection</a></h2>
                                <p class="service-text"> {{config('app.name')}}'s Threat Protection blocks malicious sites, phishing, and
                                    malware, keeping your online experience secure your data.</p>
                            </div>
                            <div class="shep-btn">
                                <svg width="90" height="90" viewBox="1170 0 150 150" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1320 150.644C1320 133.355 1297.11 122.068 1279.97 124.344C1276.71 124.777 1273.38 125 1270 125C1228.58 125 1195 91.4214 1195 50C1195 46.6208 1195.22 43.2938 1195.66 40.033C1197.93 22.8941 1186.65 0 1169.36 0H1300C1311.05 0 1320 8.95432 1320 20V150.644Z"
                                        fill="#D9D9D9"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-wrap">
                        <div class="service-style3">
                            <div class="service-icon">
                                <img src="assets/img/icon/service-icon-2-1.svg" alt="icon">
                            </div>
                            <div class="service-body">
                                <h2 class="service-title h5"><a href="service-details.html">Dark Web Monitor</a></h2>
                                <p class="service-text">Our Dark Web Monitor scans the dark web for your data and alerts you
                                    if it's found, helping you protect your identity and sensitive</p>
                            </div>
                            <div class="shep-btn">
                                <svg width="90" height="90" viewBox="1170 0 150 150" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1320 150.644C1320 133.355 1297.11 122.068 1279.97 124.344C1276.71 124.777 1273.38 125 1270 125C1228.58 125 1195 91.4214 1195 50C1195 46.6208 1195.22 43.2938 1195.66 40.033C1197.93 22.8941 1186.65 0 1169.36 0H1300C1311.05 0 1320 8.95432 1320 20V150.644Z"
                                        fill="#D9D9D9"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-wrap">
                        <div class="service-style3">
                            <div class="service-icon">
                                <img src="assets/img/icon/service-icon-2-3.svg" alt="icon">
                            </div>
                            <div class="service-body">
                                <h2 class="service-title h5"><a href="service-details.html">Dedicated IP</a></h2>
                                <p class="service-text">Get a unique, static IP address for better security, easy remote
                                    access, and a reliable online experience without shared traffic.</p>
                            </div>
                            <div class="shep-btn">
                                <svg width="90" height="90" viewBox="1170 0 150 150" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1320 150.644C1320 133.355 1297.11 122.068 1279.97 124.344C1276.71 124.777 1273.38 125 1270 125C1228.58 125 1195 91.4214 1195 50C1195 46.6208 1195.22 43.2938 1195.66 40.033C1197.93 22.8941 1186.65 0 1169.36 0H1300C1311.05 0 1320 8.95432 1320 20V150.644Z"
                                        fill="#D9D9D9"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-wrap">
                        <div class="service-style3">
                            <div class="service-icon">
                                <img src="assets/img/icon/service-icon-2-4.svg" alt="icon">
                            </div>
                            <div class="service-body">
                                <h2 class="service-title h5"><a href="service-details.html">Secure Browsing</a></h2>
                                <p class="service-text">Protect your online activities with encrypted connections that keep
                                    your data safe from hackers and surveillance.</p>
                            </div>
                            <div class="shep-btn">
                                <svg width="90" height="90" viewBox="1170 0 150 150" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1320 150.644C1320 133.355 1297.11 122.068 1279.97 124.344C1276.71 124.777 1273.38 125 1270 125C1228.58 125 1195 91.4214 1195 50C1195 46.6208 1195.22 43.2938 1195.66 40.033C1197.93 22.8941 1186.65 0 1169.36 0H1300C1311.05 0 1320 8.95432 1320 20V150.644Z"
                                        fill="#D9D9D9"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-wrap">
                        <div class="service-style3">
                            <div class="service-icon">
                                <img src="assets/img/icon/service-icon-2-5.svg" alt="icon">
                            </div>
                            <div class="service-body">
                                <h2 class="service-title h5"><a href="service-details.html">Multi-Device Support</a>
                                </h2>
                                <p class="service-text">Protect all your devices with our VPN, compatible with Windows,
                                    macOS, iOS, Android, and more, ensuring seamless</p>
                            </div>
                            <div class="shep-btn">
                                <svg width="90" height="90" viewBox="1170 0 150 150" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1320 150.644C1320 133.355 1297.11 122.068 1279.97 124.344C1276.71 124.777 1273.38 125 1270 125C1228.58 125 1195 91.4214 1195 50C1195 46.6208 1195.22 43.2938 1195.66 40.033C1197.93 22.8941 1186.65 0 1169.36 0H1300C1311.05 0 1320 8.95432 1320 20V150.644Z"
                                        fill="#D9D9D9"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-wrap">
                        <div class="service-style3">
                            <div class="service-icon">
                                <img src="assets/img/icon/service-icon-2-6.svg" alt="icon">
                            </div>
                            <div class="service-body">
                                <h2 class="service-title h5"><a href="service-details.html">Private DNS</a></h2>
                                <p class="service-text">Use {{config('app.name')}}'s Private DNS to secure your internet traffic,online your
                                    activities remain to anonymous and protected.</p>
                            </div>
                            <div class="shep-btn">
                                <svg width="90" height="90" viewBox="1170 0 150 150" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1320 150.644C1320 133.355 1297.11 122.068 1279.97 124.344C1276.71 124.777 1273.38 125 1270 125C1228.58 125 1195 91.4214 1195 50C1195 46.6208 1195.22 43.2938 1195.66 40.033C1197.93 22.8941 1186.65 0 1169.36 0H1300C1311.05 0 1320 8.95432 1320 20V150.644Z"
                                        fill="#D9D9D9"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
                                    Map Area
                                    ============================== -->
    <section class="map-layout1 bg-body2 space-bottom mt-5 space-xl-top">
        <div class="container wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle">Facts</span>
                        <h2 class="sec-title">2.6k+ Active Server In All Over The World.</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-xl-7">
                    <div class="map">
                        <div class="map-img mb-0">
                            <img src="assets/img-2/world-map2.png" alt="World Map">
                        </div>
                        <a class="rpin ireland pulse-slow tooltip active">
                            <div class="top">
                                <h3>Ireland</h3>
                                <p>47 Cities</p>
                                <i></i>
                            </div>
                        </a>
                        <a class="rpin brazil pulse tooltip">
                            <div class="top">
                                <h3>Brazil</h3>
                                <p>42 Cities</p>
                                <i></i>
                            </div>
                        </a>
                        <a class="rpin russia pulse tooltip">
                            <div class="top">
                                <h3>russia</h3>
                                <p>47 Cities</p>
                                <i></i>
                            </div>
                        </a>
                        <a class="rpin canada pulse-med tooltip">
                            <div class="top">
                                <h3>canada</h3>
                                <p>37 Cities</p>
                                <i></i>
                            </div>
                        </a>
                        <a class="rpin nigeria pulse tooltip">
                            <div class="top">
                                <h3>Nigeria</h3>
                                <p>40 Cities</p>
                                <i></i>
                            </div>
                        </a>
                        <a class="rpin australia pulse-med tooltip">
                            <div class="top">
                                <h3>Australia</h3>
                                <p>47 Cities</p>
                                <i></i>
                            </div>
                        </a>
                        <a class="rpin newyork pulse-slow tooltip">
                            <div class="top">
                                <h3>New York</h3>
                                <p>47 Cities</p>
                                <i></i>
                            </div>
                        </a>
                        <a class="rpin ukraine pulse tooltip">
                            <div class="top">
                                <h3>ukraine</h3>
                                <p>46 Cities</p>
                                <i></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="map-body">
                        <p class="map-text">These speed excellent. It’s a fast connection safety Internet leading speeds
                            across its network.</p>
                        <div class="row gx-4 gy-4">
                            <div class="col-xl-6 col-sm-6">
                                <div class="map-item">
                                    <div class="map-logo">
                                        <img src="assets/img-2/map-item-1-1.png" alt="map">
                                    </div>
                                    <div class="map-content">
                                        <h3 class="title">North America</h3>
                                        <p class="text">Active Server (250)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="map-item">
                                    <div class="map-logo">
                                        <img src="assets/img-2/map-item-1-2.png" alt="map">
                                    </div>
                                    <div class="map-content">
                                        <h3 class="title">Europe</h3>
                                        <p class="text">Active Server (250)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="map-item">
                                    <div class="map-logo">
                                        <img src="assets/img-2/map-item-1-3.png" alt="map">
                                    </div>
                                    <div class="map-content">
                                        <h3 class="title">Africa</h3>
                                        <p class="text">Active Server (250)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="map-item">
                                    <div class="map-logo">
                                        <img src="assets/img-2/map-item-1-4.png" alt="map">
                                    </div>
                                    <div class="map-content">
                                        <h3 class="title">Asia</h3>
                                        <p class="text">Active Server (250)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="map-btn">
                        <a href="#" class="vs-btn">Peek Your Location</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup moving d-none d-xl-block" style="left: 0%; top: 5%;"><img
                src="assets/img/shep/color-shape-left.png" alt="shapes"></div>
        <div class="shape-mockup moving d-none d-xl-block" style="right: 0%; bottom: 0%;"><img
                src="assets/img/shep/color-shape-right2.png" alt="shapes"></div>
    </section>

    <!--==============================
                                    Video Area
                                    ============================== -->
    <section class="video-layout1 space" data-bg-src="assets/img-2/video-bg2.jpg">
        <div class="container position-relative wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle">Play And Discover</span>
                        <h2 class="sec-title">Download The Fastest VPN App Secure Your Internet</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="video-body">
                        <p class="video-text text-center">
                            Protect your online activities and enjoy fast, unrestricted browsing with NerdVPN. Download now
                            and get started on your journey to a safer internet.
                        </p>
                        <div class="btn-group">
                            <a class="icon-btn" href="#"><i class="fab fa-apple"></i></a>
                            <a class="icon-btn" href="#"><i class="fa-brands fa-android"></i></a>
                            <a class="icon-btn" href="#"><i class="fa-brands fa-windows"></i></a>
                        </div>
                        <div class="download-btn pb-5">
                            <a href="#" class="vs-btn">Download App</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
