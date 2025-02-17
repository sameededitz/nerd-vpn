@extends('layout.user-layout')
@section('title')
    Home
@endsection
@section('content')
    <!--==============================
            Hero Area
            ============================== -->
    <div class="hero-layout1 style2" data-bg-src="assets/img/hero/hero-bg-2-1.jpg">
        <div class="container position-relative">
            <div class="vs-carousel z-index1" data-slide-show="1" data-autoplay="true" data-fade="true" data-arraw="true">
                <div class="hero-slide">
                    <div class="container">
                        <div class="row g-5 align-items-top justify-content-center">
                            <div class="col-lg-6">
                                <div class="hero-content text-center">
                                    <div class="title-area text-center">
                                        <span class="sec-subtitle">VPN Protection</span>
                                        <h2 class="sec-title h1 mb-20">Your Cyber Life Is Our <span>Security</span></h2>
                                        <p class="sec-text">Welcome to NerdVPN—your trusted partner in secure and
                                            private browsing. Protect your data while streaming, working, or surfing
                                            online. Experience the internet without borders!</p>
                                    </div>
                                    <div class="hero-bottom">
                                        <a href="service.html" class="vs-btn">Get It Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide">
                    <div class="container">
                        <div class="row g-5 align-items-top justify-content-center">
                            <div class="col-lg-6">
                                <div class="hero-content text-center">
                                    <div class="title-area text-center">
                                        <span class="sec-subtitle">VPN Protection</span>
                                        <h2 class="sec-title h1 mb-20">Our Security Is Your <span>Cyber Life</span></h2>
                                        <p class="sec-text">Welcome to NerdVPN—your trusted partner in secure and
                                            private browsing. Protect your data while streaming, working, or surfing
                                            online. Experience the internet without borders!</p>
                                    </div>
                                    <div class="hero-bottom">
                                        <a href="service.html" class="vs-btn">Get It Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide">
                    <div class="container">
                        <div class="row g-5 align-items-top justify-content-center">
                            <div class="col-lg-6">
                                <div class="hero-content text-center">
                                    <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                                        <span class="sec-subtitle">VPN Protection</span>
                                        <h2 class="sec-title h1 mb-20">Our security is your <span>online life.</span>
                                        </h2>
                                        <p class="sec-text">Welcome to NerdVPN—your trusted partner in secure and
                                            private browsing. Protect your data while streaming, working, or surfing
                                            online. Experience the internet without borders!</p>
                                    </div>
                                    <div class="hero-bottom">
                                        <a href="service.html" class="vs-btn">Get It Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup moving d-none d-xl-block" style="top: 5%;"><img src="assets/img/shep/hero-star-shep.png"
                alt="shapes"></div>
        <div class="shape-mockup d-xl-block" style="bottom: 0%;"><img src="assets/img-2/worldmap.png" alt="shapes">
        </div>
    </div>
    <!--==============================
            Process Area
            ============================== -->
    <div class="process-layout2">
        <div class="container-style2">
            <div class="process-style2">
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="process-item">
                            <div class="process-inner">
                                <div class="process-icon">
                                    <img src="assets/img/icon/process-icon-1-1.svg" alt="icon">
                                </div>
                                <h2 class="process-title h5">Easy Download</h2>
                            </div>
                            <p class="process-text">
                                Get started quickly by downloading the {{ config('app.name') }} app for your device.
                            </p>
                            <div class="shep-btn">
                                <svg width="72" height="72" viewBox="0 0 111 111" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                        fill="none"></path>
                                </svg>
                            </div>
                            <a href="blog-details.html" class="icon-btn">01</a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="process-item">
                            <div class="process-inner">
                                <div class="process-icon">
                                    <img src="assets/img/icon/process-icon-1-2.svg" alt="icon">
                                </div>
                                <h2 class="process-title h5">Instant Setup/ Install</h2>
                            </div>
                            <p class="process-text">
                                Install the app effortlessly with just Need a few clicks.
                            </p>
                            <div class="shep-btn">
                                <svg width="72" height="72" viewBox="0 0 111 111" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                        fill="none"></path>
                                </svg>
                            </div>
                            <a href="blog-details.html" class="icon-btn">02</a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="process-item">
                            <div class="process-inner">
                                <div class="process-icon">
                                    <img src="assets/img/icon/process-icon-1-3.svg" alt="icon">
                                </div>
                                <h2 class="process-title h5">Connect to a Server</h2>
                            </div>
                            <p class="process-text">
                                Choose from our global server network and connect with a single tap.
                            </p>
                            <div class="shep-btn">
                                <svg width="72" height="72" viewBox="0 0 111 111" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                        fill="none"></path>
                                </svg>
                            </div>
                            <a href="blog-details.html" class="icon-btn">03</a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="process-item">
                            <div class="process-inner">
                                <div class="process-icon">
                                    <img src="assets/img/icon/process-icon-1-4.svg" alt="icon">
                                </div>
                                <h2 class="process-title h5">Browse Securely</h2>
                            </div>
                            <p class="process-text">
                                Once connected,take advantage of anonymous, browsing.
                            </p>
                            <div class="shep-btn">
                                <svg width="72" height="72" viewBox="0 0 111 111" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                        fill="none"></path>
                                </svg>
                            </div>
                            <a href="blog-details.html" class="icon-btn">04</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
            About Area
            ============================== -->
    <section class="about-layout2 space-bottom">
        <div class="container wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <div class="row gx-60 gy-5 align-items-center">
                <div class="col-xl-6">
                    <div class="about-img wow fadeInUp">
                        <img src="assets/img-2/about-img2.png" alt="about-img">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-content">
                        <div class="title-area text-left wow fadeInUp wow-animated" data-wow-delay="0.3s">
                            <span class="sec-subtitle2">About Us</span>
                            <h2 class="sec-title">Your Trusted Partner For Online Privacy & Freedom</h2>
                        </div>
                        <div class="about-body">
                            <p class="about-text">
                                At {{ config('app.name') }}, we are committed to providing secure, private, and unrestricted
                                internet
                                access to our users worldwide.
                                In an age where online privacy is more important than ever, our mission is to protect
                                your personal data.
                            </p>
                            <div class="counter-style2">
                                <div class="media-style">
                                    <div class="media-inner">
                                        <div class="media-counter">
                                            <div class="media-count">
                                                <h2 class="media-title counter-number" data-count="950">00</h2>
                                                <strong class="count-icon"></strong>
                                            </div>
                                            <p class="media-text">Available Countries</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-style">
                                    <div class="media-inner">
                                        <div class="media-counter">
                                            <div class="media-count">
                                                <h2 class="media-title counter-number" data-count="21">00</h2>
                                                <strong class="count-icon">k</strong>
                                            </div>
                                            <p class="media-text">Active Server</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-style">
                                    <div class="media-inner">
                                        <div class="media-counter">
                                            <div class="media-count">
                                                <h2 class="media-title counter-number" data-count="20">00</h2>
                                                <strong class="count-icon">k</strong>
                                            </div>
                                            <p class="media-text">Gbps Capacity</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="about-btn">
                                <a href="about.html" class="vs-btn">Get It Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
            Price Area
            ============================== -->
    <section class="price-layout2 space mt-5">
        <div class="container z-index1 wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="title-area text-left wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle2">Pricing Plan</span>
                        <h2 class="sec-title">Our Awesome & Best Pricing Plan</h2>
                    </div>
                </div>

            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="monthly-tab-pane" role="tabpanel"
                    aria-labelledby="monthly-tab" tabindex="0">
                    <div id="monthly" data-tab-content class="package-list ">
                        <div class="row g-5">
                            <div class="col-xl-4 col-md-6">
                                <div class="package-style1">
                                    <div class="package-top">
                                        <div class="package-icon"><img src="assets/img/icon/price-icon1.png"
                                                alt="icon">
                                        </div>
                                        <h3 class="package-name h4">Bronze Plan</h3>
                                        <p class="package-text">What you will get in this plan</p>
                                        <p class="package-price">$29.99<span class="duration">/month</span></p>
                                    </div>
                                    <div class="package-body">
                                        <div class="notice">
                                            <span class="package-notice"><i class="fas fa-sack-dollar"></i>30 Day
                                                Money-Back Guarantee</span>
                                        </div>
                                        <div class="list-style1">
                                            <ul class="list-unstyled">
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Anti-malware &
                                                    browsing protection</li>
                                                <li><span class="icon"><i class="fa-solid fa-shield-check"></i></span>Ad
                                                    and tracker blocker</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Secure,
                                                    high-speed VPN</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Password manager
                                                    & Data Breach</li>
                                                <li><span class="icon shield-cross-icon"><i
                                                            class="fa-solid fa-shield"></i><i
                                                            class="fa-solid fa-xmark icon2"></i></span>1 TB of encrypted
                                                    cloud storage</li>
                                            </ul>
                                            <div class="shep">
                                                <img src="assets/img/shep/price-shape1.png" alt="shep">
                                            </div>
                                        </div>
                                        <div class="price-btn">
                                            <a href="price.html" class="vs-btn">Get Start</a>
                                        </div>
                                    </div>
                                    <div class="shep-btn">
                                        <svg width="150" height="150" viewBox="0 0 111 111" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                                fill="none"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="package-style1 active">
                                    <div class="package-top">
                                        <div class="package-icon"><img src="assets/img/icon/price-icon2.png"
                                                alt="icon">
                                        </div>
                                        <h3 class="package-name h4">Silver Plan</h3>
                                        <p class="package-text">What you will get in this plan</p>
                                        <p class="package-price">$29.99<span class="duration">/month</span></p>
                                    </div>
                                    <div class="package-body">
                                        <div class="notice">
                                            <span class="package-notice"><i class="fas fa-sack-dollar"></i>30 Day
                                                Money-Back Guarantee</span>
                                        </div>
                                        <div class="list-style1">
                                            <ul class="list-unstyled">
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Anti-malware &
                                                    browsing protection</li>
                                                <li><span class="icon"><i class="fa-solid fa-shield-check"></i></span>Ad
                                                    and tracker blocker</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Secure,
                                                    high-speed VPN</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Password manager
                                                    & Data Breach</li>
                                                <li><span class="icon shield-cross-icon"><i
                                                            class="fa-solid fa-shield"></i><i
                                                            class="fa-solid fa-xmark icon2"></i></span>1 TB of encrypted
                                                    cloud storage</li>
                                            </ul>
                                            <div class="shep">
                                                <img src="assets/img/shep/price-shape2.png" alt="shep">
                                            </div>
                                        </div>
                                        <div class="price-btn">
                                            <a href="price.html" class="vs-btn">Get Start</a>
                                        </div>
                                    </div>
                                    <div class="shep-btn">
                                        <svg width="150" height="150" viewBox="0 0 111 111" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                                fill="none"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="package-style1">
                                    <div class="package-top">
                                        <div class="package-icon"><img src="assets/img/icon/price-icon3.png"
                                                alt="icon">
                                        </div>
                                        <h3 class="package-name h4">Gold Plan</h3>
                                        <p class="package-text">What you will get in this plan</p>
                                        <p class="package-price">$29.99<span class="duration">/month</span></p>
                                    </div>
                                    <div class="package-body">
                                        <div class="notice">
                                            <span class="package-notice"><i class="fas fa-sack-dollar"></i>30 Day
                                                Money-Back Guarantee</span>
                                        </div>
                                        <div class="list-style1">
                                            <ul class="list-unstyled">
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Anti-malware &
                                                    browsing protection</li>
                                                <li><span class="icon"><i class="fa-solid fa-shield-check"></i></span>Ad
                                                    and tracker blocker</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Secure,
                                                    high-speed VPN</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Password manager
                                                    & Data Breach</li>
                                                <li><span class="icon shield-cross-icon"><i
                                                            class="fa-solid fa-shield"></i><i
                                                            class="fa-solid fa-xmark icon2"></i></span>1 TB of encrypted
                                                    cloud storage</li>
                                            </ul>
                                            <div class="shep">
                                                <img src="assets/img/shep/price-shape1.png" alt="shep">
                                            </div>
                                        </div>
                                        <div class="price-btn">
                                            <a href="price.html" class="vs-btn">Get Start</a>
                                        </div>
                                    </div>
                                    <div class="shep-btn">
                                        <svg width="150" height="150" viewBox="0 0 111 111" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                                fill="none"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="yearly-tab-pane" role="tabpanel" aria-labelledby="yearly-tab"
                    tabindex="0">
                    <div id="yearly" data-tab-content class="package-list">
                        <div class="row g-5">
                            <div class="col-xl-4 col-md-6">
                                <div class="package-style1">
                                    <div class="package-top">
                                        <div class="package-icon"><img src="assets/img/icon/price-icon1.png"
                                                alt="icon">
                                        </div>
                                        <h3 class="package-name h4">Bronze Plan</h3>
                                        <p class="package-text">What you will get in this plan</p>
                                        <p class="package-price">$129.99<span class="duration">/yearly</span></p>
                                    </div>
                                    <div class="package-body">
                                        <div class="notice">
                                            <span class="package-notice"><i class="fas fa-sack-dollar"></i>30 Day
                                                Money-Back Guarantee</span>
                                        </div>
                                        <div class="list-style1">
                                            <ul class="list-unstyled">
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Anti-malware &
                                                    browsing protection</li>
                                                <li><span class="icon"><i class="fa-solid fa-shield-check"></i></span>Ad
                                                    and tracker blocker</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Secure,
                                                    high-speed VPN</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Password manager
                                                    & Data Breach</li>
                                                <li><span class="icon shield-cross-icon"><i
                                                            class="fa-solid fa-shield"></i><i
                                                            class="fa-solid fa-xmark icon2"></i></span>1 TB of encrypted
                                                    cloud storage</li>
                                            </ul>
                                            <div class="shep">
                                                <img src="assets/img/shep/price-shape1.png" alt="shep">
                                            </div>
                                        </div>
                                        <div class="price-btn">
                                            <a href="price.html" class="vs-btn">Get Start</a>
                                        </div>
                                    </div>
                                    <div class="shep-btn">
                                        <svg width="150" height="150" viewBox="0 0 111 111" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                                fill="none"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="package-style1 active">
                                    <div class="package-top">
                                        <div class="package-icon"><img src="assets/img/icon/price-icon2.png"
                                                alt="icon">
                                        </div>
                                        <h3 class="package-name h4">Silver Plan</h3>
                                        <p class="package-text">What you will get in this plan</p>
                                        <p class="package-price">$159.99<span class="duration">/yearly</span></p>
                                    </div>
                                    <div class="package-body">
                                        <div class="notice">
                                            <span class="package-notice"><i class="fas fa-sack-dollar"></i>30 Day
                                                Money-Back Guarantee</span>
                                        </div>
                                        <div class="list-style1">
                                            <ul class="list-unstyled">
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Anti-malware &
                                                    browsing protection</li>
                                                <li><span class="icon"><i class="fa-solid fa-shield-check"></i></span>Ad
                                                    and tracker blocker</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Secure,
                                                    high-speed VPN</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Password manager
                                                    & Data Breach</li>
                                                <li><span class="icon shield-cross-icon"><i
                                                            class="fa-solid fa-shield"></i><i
                                                            class="fa-solid fa-xmark icon2"></i></span>1 TB of encrypted
                                                    cloud storage</li>
                                            </ul>
                                            <div class="shep">
                                                <img src="assets/img/shep/price-shape2.png" alt="shep">
                                            </div>
                                        </div>
                                        <div class="price-btn">
                                            <a href="price.html" class="vs-btn">Get Start</a>
                                        </div>
                                    </div>
                                    <div class="shep-btn">
                                        <svg width="150" height="150" viewBox="0 0 111 111" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                                fill="none"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="package-style1">
                                    <div class="package-top">
                                        <div class="package-icon"><img src="assets/img/icon/price-icon3.png"
                                                alt="icon">
                                        </div>
                                        <h3 class="package-name h4">Gold Plan</h3>
                                        <p class="package-text">What you will get in this plan</p>
                                        <p class="package-price">$229.99<span class="duration">/yearly</span></p>
                                    </div>
                                    <div class="package-body">
                                        <div class="notice">
                                            <span class="package-notice"><i class="fas fa-sack-dollar"></i>30 Day
                                                Money-Back Guarantee</span>
                                        </div>
                                        <div class="list-style1">
                                            <ul class="list-unstyled">
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Anti-malware &
                                                    browsing protection</li>
                                                <li><span class="icon"><i class="fa-solid fa-shield-check"></i></span>Ad
                                                    and tracker blocker</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Secure,
                                                    high-speed VPN</li>
                                                <li><span class="icon"><i
                                                            class="fa-solid fa-shield-check"></i></span>Password manager
                                                    & Data Breach</li>
                                                <li><span class="icon shield-cross-icon"><i
                                                            class="fa-solid fa-shield"></i><i
                                                            class="fa-solid fa-xmark icon2"></i></span>1 TB of encrypted
                                                    cloud storage</li>
                                            </ul>
                                            <div class="shep">
                                                <img src="assets/img/shep/price-shape1.png" alt="shep">
                                            </div>
                                        </div>
                                        <div class="price-btn">
                                            <a href="price.html" class="vs-btn">Get Start</a>
                                        </div>
                                    </div>
                                    <div class="shep-btn">
                                        <svg width="150" height="150" viewBox="0 0 111 111" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                                fill="none"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="particles-js8" style="top: 0%; right: 0%; z-index: 0; width:40%; height:570px;"><canvas
                class="particles-js-canvas-el"></canvas></div>
    </section>
    <!--==============================
            Video Area
            ============================== -->
    <section class="video-layout1 video-space space-top mt-5" data-bg-src="assets/img-2/video-bg2.jpg">
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
                            Protect your online activities and enjoy fast, unrestricted browsing with NerdVPN. Download
                            now and get started on your journey to a safer internet.
                        </p>
                        <div class="btn-group">
                            <a class="icon-btn" href="#"><i class="fab fa-apple"></i></a>
                            <a class="icon-btn" href="#"><i class="fa-brands fa-android"></i></a>
                            <a class="icon-btn" href="#"><i class="fa-brands fa-windows"></i></a>

                        </div>
                        <div class="download-btn">
                            <a href="#" class="vs-btn">Download App</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cta-style1">
                <div class="cta-wrap wow fadeInUp wow-animated" data-wow-delay="0.3s">
                    <div class="row justify-content-md-end">
                        <div class="col-xl-7">
                            <div class="cta-content">
                                <div class="title-area text-left">
                                    <span class="sec-subtitle2">Stay In Your Cybersecurity</span>
                                    <h2 class="sec-title">Save 70% On {{ config('app.name') }} Plus Get Extra Month</h2>
                                </div>
                                <div class="cta-body">
                                    <div class="download-btn">
                                        <a href="#" class="vs-btn2">Get The Deal</a>
                                    </div>
                                    <span class="cta-notice"><i class="fas fa-sack-dollar"></i>30 Day Money-Back
                                        Guarantee</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-8">
                            <div class="cta-img">
                                <img src="assets/img-2/cta-img1.png" alt="cta-image">
                            </div>
                        </div>
                    </div>
                    <div id="particles-js4" style="top: 0%; right: 0%; z-index: -1; width:45%; height:100%;"><canvas
                            class="particles-js-canvas-el"></canvas></div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
            Service Area
            ============================== -->
    <section class="service-layout1 service-space space-top-custom">
        <div class="container wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle">Services</span>
                        <h2 class="sec-title">Our Awesome & Valuable Services</h2>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel wow fadeInUp wow-animated" data-wow-delay="0.3s" data-slide-show="4"
                data-ml-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-autoplay="true"
                data-arrows="true">
                <div class="col-lg-3">
                    <div class="service-wrap">
                        <div class="service-style1">
                            <div class="service-body">
                                <div class="service-icon">
                                    <img src="assets/img/icon/service-icon-1-1.svg" alt="icon">
                                </div>
                                <h2 class="service-title h6"><a href="service-details.html">Threat Protection</a></h2>
                                <p class="service-text">
                                    Threat Protection blocks malicious sites, phishing, and malware, keeping your online
                                    secure.
                                </p>
                            </div>
                            <a href="service-details.html" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            <div class="shep-btn">
                                <svg width="72" height="72" viewBox="0 0 111 111" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                        fill="none"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-wrap">
                        <div class="service-style1">
                            <div class="service-body">
                                <div class="service-icon">
                                    <img src="assets/img/icon/service-icon-1-2.svg" alt="icon">
                                </div>
                                <h2 class="service-title h6"><a href="service-details.html">Dark Web Monitor</a></h2>
                                <p class="service-text">
                                    Our Dark Web Monitor scans the dark web for your data and alerts you if it's found,
                                    helping you.
                                </p>
                            </div>
                            <a href="service-details.html" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            <div class="shep-btn">
                                <svg width="72" height="72" viewBox="0 0 111 111" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                        fill="none"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-wrap">
                        <div class="service-style1">
                            <div class="service-body">
                                <div class="service-icon">
                                    <img src="assets/img/icon/service-icon-1-3.svg" alt="icon">
                                </div>
                                <h2 class="service-title h6"><a href="service-details.html">Dedicated IP</a></h2>
                                <p class="service-text">
                                    Get a unique, static IP address for better security, easy remote access, and a
                                    reliable experience.
                                </p>
                            </div>
                            <a href="service-details.html" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            <div class="shep-btn">
                                <svg width="72" height="72" viewBox="0 0 111 111" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                        fill="none"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-wrap">
                        <div class="service-style1">
                            <div class="service-body">
                                <div class="service-icon">
                                    <img src="assets/img/icon/service-icon-1-4.svg" alt="icon">
                                </div>
                                <h2 class="service-title h6"><a href="service-details.html">Secure Browsing</a></h2>
                                <p class="service-text">
                                    Protect your online activities with encrypted connections that keep your data safe
                                    from hackers.
                                </p>
                            </div>
                            <a href="service-details.html" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            <div class="shep-btn">
                                <svg width="72" height="72" viewBox="0 0 111 111" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                        fill="none"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-wrap">
                        <div class="service-style1">
                            <div class="service-body">
                                <div class="service-icon">
                                    <img src="assets/img/icon/service-icon-1-2.svg" alt="icon">
                                </div>
                                <h2 class="service-title h6"><a href="service-details.html">Dark Web Monitor</a></h2>
                                <p class="service-text">
                                    Our Dark Web Monitor scans the dark web for your data and alerts you if it's found,
                                    helping you.
                                </p>
                            </div>
                            <a href="service-details.html" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            <div class="shep-btn">
                                <svg width="72" height="72" viewBox="0 0 111 111" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 0C19.33 0 35 15.67 35 35V41C35 50.33 50.67 76 75 76H76C95.33 76 111 91.67 111 111V0H0Z"
                                        fill="none"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
            team Area
            ============================== -->
    <section class="team-layout2 team-space">
        <div class="container position-relative">

            <div class="video-style1" data-bg-src="assets/img-2/video-bg3.jpg">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                            <span class="sec-subtitle">Play And Discover</span>
                            <h2 class="sec-title">We Are No.1 VPN & Clod Security Company</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
            Map Area
            ============================== -->

    <section class="map-layout1 map-space space-bottom mt-5">
        <div class="container wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle">Facts</span>
                        <h2 class="sec-title">2.6k+ Active Server In All Over The World.</h2>
                    </div>
                </div>
            </div>
            <div class="map-area">
                <div class="map">
                    <div class="map-img">
                        <img src="assets/img-2/world-map.png" alt="World Map">
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
                <div class="map-btn">
                    <a href="#" class="vs-btn">Peek Your Location</a>
                </div>
            </div>
        </div>
        <div class="shape-mockup moving d-none d-xl-block" style="left: 0%; top: 5%;"><img
                src="assets/img/shep/color-shape-left.png" alt="shapes"></div>
        <div class="shape-mockup moving d-none d-xl-block" style="right: 0%; bottom: 0%;"><img
                src="assets/img/shep/color-shape-right2.png" alt="shapes"></div>
    </section>

    <!--==============================
            Faq Area
            ============================== -->
    <section class="faq-layout1 bg-body2 space-bottom mt-5">
        <div class="container wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle">FAQS</span>
                        <h2 class="sec-title">Frequently Asked Any Questions Us </h2>
                    </div>
                </div>
            </div>
            <div class="row gy-5 gx-60">
                <div class="col-lg-8">
                    <div class="accordion accordion-style1" id="faqVersion1">
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What
                                    is a VPN and how does it work?</button>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqVersion1">
                                <div class="accordion-body">
                                    <p> {{ config('app.name') }} provides enhanced security, privacy, and unrestricted
                                        internet access.
                                        With
                                        our advanced encryption,
                                        no-logs policy, and global server network, you can browse securely and bypass
                                        geo-restrictions with ease.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Where can I get some?
                                </button>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqVersion1">
                                <div class="accordion-body">
                                    <p>Yes, despite the removal of Government Feed-in Tariff, installs have been
                                        forecast to
                                        continue at the current rate and even increase in 2025.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Will {{ config('app.name') }} slow down my internet connection?
                                </button>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqVersion1">
                                <div class="accordion-body">
                                    <p>Yes, despite the removal of Government Feed-in Tariff, installs have been
                                        forecast to
                                        continue at the current rate and even increase in 2025.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Where can I get some?
                                </button>
                            </div>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqVersion1">
                                <div class="accordion-body">
                                    <p>Yes, despite the removal of Government Feed-in Tariff, installs have been
                                        forecast to
                                        continue at the current rate and even increase in 2025.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    What if I have issues with my VPN connection?
                                </button>
                            </div>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqVersion1">
                                <div class="accordion-body">
                                    <p> {{ config('app.name') }} provides enhanced security, privacy, and unrestricted
                                        internet access.
                                        With
                                        our advanced encryption,
                                        no-logs policy, and global server network, you can browse securely and bypass
                                        geo-restrictions with ease..
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    How do I set up {{ config('app.name') }}?
                                </button>
                            </div>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#faqVersion1">
                                <div class="accordion-body">
                                    <p> {{ config('app.name') }} provides enhanced security, privacy, and unrestricted
                                        internet access.
                                        With
                                        our advanced encryption,
                                        no-logs policy, and global server network, you can browse securely and bypass
                                        geo-restrictions with ease.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="faq-img">
                        <img src="assets/img-2/faq-img1.png" alt="faq">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        const request = await fetch("https://ipinfo.io/json?token=22c6e0d52b99c0")
        const jsonResponse = await request.json()
        console.log(jsonResponse);
    </script>
@endsection
