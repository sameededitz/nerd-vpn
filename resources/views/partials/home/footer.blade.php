<footer class="footer-wrapper  footer-layout1" data-bg-src="{{ asset('assets/img-2/footer-bg-1-1.jpg') }}">
    <div class="container">
        <div class="footer-top">
            <div class="row g-5 justify-content-lg-between justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-4">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}" class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/logo.png') }}" width="64px" alt="logo">
                            <h4 class="sec-title ms-3 mt-3">{{ config('app.name') }}</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row g-5 justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="widget footer-widget">
                        <div class="vs-widget-about">
                            <h3 class="widget_title">About Company</h3>
                            <p class="footer-text">Discover seamless privacy and security with NerdVPN. Protect your
                                online activities with advanced encryption and enjoy unrestricted access worldwide
                            </p>
                            <div class="footer-social">
                                <a class="icon-btn" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="icon-btn" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="icon-btn" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="icon-btn" href="#"><i class="fa-brands fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="widget  footer-widget">
                        <h3 class="widget_title">Quick Link</h3>
                        <ul>
                            <li><a href="about.html"><i class="fa-regular fa-chevron-right"></i>About Us</a>
                            </li>
                            <li><a href="service.html"><i class="fa-regular fa-chevron-right"></i>Our Services</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Explore</h3>
                        <ul>
                            <li><a href="#"><i class="fa-regular fa-chevron-right"></i>Help Center</a></li>
                            <li><a href="#"><i class="fa-regular fa-chevron-right"></i>Terms & Condition</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Contact Us</h3>
                        <div class="media-style1">
                            <div class="media-icon icon-btn"><i class="fa-solid fa-mobile"></i></div>
                            <div class="media-body">
                                <h3 class="media-title">Phone No:</h3>
                                <p class="media-info"><a href="tel:+88013004451">+88 013 00 44 51</a></p>
                            </div>
                        </div>
                        <div class="media-style1">
                            <div class="media-icon icon-btn"><i class="fa-solid fa-envelope"></i></div>
                            <div class="media-body">
                                <h3 class="media-title">Email Address:</h3>
                                <p class="media-info"><a href="mailto:example@email.com">example@nerdvpn.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="media-style1">
                            <div class="media-icon icon-btn"><i class="fa-solid fa-map-location-dot"></i></div>
                            <div class="media-body">
                                <h3 class="media-title">9304 Forest Ln Suite 206 Dallas, Texas</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright-wrap">
            <div class="row g-2 justify-content-lg-between justify-content-center align-items-center">
                <div class="col-auto">
                    <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> {{ date('Y') }} <a
                            href="{{ route('home') }}">
                            {{ config('app.name') }} </a>. All Rights Reserved By <a
                            href="https://tecclubx.com">TecClub</a></p>
                </div>
                <div class="col-auto">
                    <div class="copyright-menu">
                        <ul class="list-unstyled">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
