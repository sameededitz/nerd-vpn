@extends('layout.user-layout')
@section('title')
    Contact Us | {{ Auth::user()->name ?? 'Guest' }}
@endsection
@section('content')
    <!--==============================
                Breadcumb
                ============================== -->
    <div class="breadcumb-wrapper Cover all esports & gamers needs"
        data-bg-src="{{ asset('assets/img-2/breadcumb-bg.jpg') }}">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact Us</h1>
            </div>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu vs-btn2">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
                Contact Area
                ============================== -->
    <section class="contact-layout1 space-top contact-space">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-xl-6">
                    <div class="title-area wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle2">Contact Us</span>
                        <h2 class="sec-title">Contact Information Here</h2>
                    </div>
                    <div class="vs-comment-form">
                        <div id="respond" class="comment-respond">
                            <form action="mail.php" method="post" class="form-style3 ajax-contact">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input name="fname" type="text" class="form-control" placeholder="First Name"
                                            required="">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="fname" type="text" class="form-control" placeholder="Last Name"
                                            required="">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="email" type="email" class="form-control"
                                            placeholder="Email Address" required="">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <select name="subject" id="subject">
                                            <option selected="" disabled="" hidden="">Select subject</option>
                                            <option value="Web Development">Web Development</option>
                                            <option value="UI Design">UI Design</option>
                                            <option value="CMS Development">CMS Development</option>
                                            <option value="Theme Development">Theme Development</option>
                                            <option value="Wordpress Development">Wordpress Development</option>
                                        </select>
                                    </div>
                                    <div class="col-12  form-group mb-30">
                                        <textarea name="message" class="form-control" placeholder="Message Here..." required=""></textarea>
                                    </div>
                                    <div class="col-12 form-group mb-0">
                                        <button class="vs-btn" type="submit">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messages mb-0 mt-3"></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="contact-img z-index-n1">
                        <img src="assets/imG-2/contact-img1.png" alt="contact-img">
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup d-none d-xl-block wow fadeInUp wow-animated" style="right: 15%; top: 0%;"><img
                src="assets/img-2/contact-shep.png" alt="shapes"></div>
    </section>
    <!--==============================
                Faq Area
                ============================== -->
    <section class="faq-layout1 space">
        <div class="container">
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
                                    Will {{config('app.name')}} slow down my internet connection?
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
                        <img src="assets/img-2/faq-img1.png" alt="faq">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
