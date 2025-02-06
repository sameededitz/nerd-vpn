@extends('layout.user-layout')
@section('title')
    Pricing | {{ Auth::user()->name ?? 'Guest' }}
@endsection
@section('content')
    <!--==============================
                                                        Breadcumb
                                                        ============================== -->
    <div class="breadcumb-wrapper Cover all esports & gamers needs" data-bg-src="assets/img-2/breadcumb-bg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our Pricing Plan</h1>
            </div>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu vs-btn2">
                    <li><a href="index.html">Home</a></li>
                    <li>Pricing Plan</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
                                                        Price Area
                                                        ============================== -->
    <section class="space">
        <div class="container wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-5">
                    <div class="title-area wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle2">Pricing Plan</span>
                        <h2 class="sec-title">Our Awesome & Best Pricing Plan</h2>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="monthly-tab-pane" role="tabpanel" aria-labelledby="monthly-tab"
                    tabindex="0">
                    <div id="monthly" data-tab-content class="package-list ">
                        <div class="row g-5">
                            @forelse ($plans as $plan)
                                <div class="col-xl-4 col-md-6">
                                    <div class="package-wraper">
                                        <div class="package-style1">
                                            <div class="package-top">
                                                <h3 class="package-name h4"> {{ $plan->name }} </h3>
                                                <p class="package-text">What you will get in this plan</p>
                                                <p class="package-price">
                                                    ${{ $plan->price }}
                                                    @if ($plan->lifetime)
                                                        <span class="duration">/ Lifetime</span>
                                                    @else
                                                        <span class="duration">/
                                                            {{ $plan->duration }}
                                                            {{ Str::title($plan->duration_unit) }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="package-body">
                                                <div class="notice">
                                                    <span class="package-notice"><i class="fas fa-sack-dollar"></i>30 Day
                                                        Money-Back Guarantee</span>
                                                </div>
                                                <div class="list-style1">
                                                    <ul class="list-unstyled">
                                                        <li><span class="icon"><i
                                                                    class="fa-solid fa-shield-check"></i></span>Anti-malware
                                                            &
                                                            browsing protection</li>
                                                        <li><span class="icon"><i
                                                                    class="fa-solid fa-shield-check"></i></span>Ad and
                                                            tracker
                                                            blocker</li>
                                                        <li><span class="icon"><i
                                                                    class="fa-solid fa-shield-check"></i></span>Secure,
                                                            high-speed VPN</li>
                                                        <li><span class="icon"><i
                                                                    class="fa-solid fa-shield-check"></i></span>Password
                                                            manager & Data Breach</li>
                                                        <li><span class="icon shield-cross-icon"><i
                                                                    class="fa-solid fa-shield"></i><i
                                                                    class="fa-solid fa-xmark icon2"></i></span>1 TB of
                                                            encrypted cloud storage</li>
                                                    </ul>
                                                    <div class="shep">
                                                        <img src="assets/img/shep/price-shape2.png" alt="shep">
                                                    </div>
                                                </div>
                                                <div class="price-btn">
                                                    @if (Auth::check())
                                                        @if ($userHasLifetimePlan)
                                                            <p class="alert alert-info text-center">You already have a
                                                                lifetime plan and cannot subscribe to another.</p>
                                                        @elseif ($userHasActiveSubscription)
                                                            <p class="alert alert-warning text-center">You have an active
                                                                subscription. Cancel it first to purchase another plan. Go
                                                                to Billing page.</p>
                                                        @else
                                                            <a href="{{ route('checkout', $plan->slug) }}"
                                                                class="vs-btn">Subscribe</a>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('login') }}" class="vs-btn">Login to Subscribe</a>
                                                    @endif
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
                            @empty
                                <div class="no-plan">
                                    <h2>No plans available</h2>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
                                                        Faq Area
                                                        ============================== -->
    <section class="faq-layout1 space mt-5">
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
                                    <p> {{config('app.name')}} provides enhanced security, privacy, and unrestricted internet access. With
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
                                    <p>Yes, despite the removal of Government Feed-in Tariff, installs have been forecast to
                                        continue at the current rate and even increase in 2025.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Will {{config('app.name')}} slow down my internet connection?
                                </button>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqVersion1">
                                <div class="accordion-body">
                                    <p>Yes, despite the removal of Government Feed-in Tariff, installs have been forecast to
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
                                    <p>Yes, despite the removal of Government Feed-in Tariff, installs have been forecast to
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
                                    <p> {{config('app.name')}} provides enhanced security, privacy, and unrestricted internet access. With
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
                                    How do I set up {{config('app.name')}}?
                                </button>
                            </div>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#faqVersion1">
                                <div class="accordion-body">
                                    <p> {{config('app.name')}} provides enhanced security, privacy, and unrestricted internet access. With
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
                        <img src="assets/img/default/faq-img1.png" alt="faq">
                    </div>
                </div>
            </div>
        </div>
        <div id="faq-particle1" style="top: 0%; left: 0%; width: 30%; height: 70%; z-index: 0;"><canvas
                class="particles-js-canvas-el"></canvas></div>
    </section>
@endsection
