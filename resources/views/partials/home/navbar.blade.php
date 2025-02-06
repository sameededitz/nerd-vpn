<header class="vs-header header-layout2">
    <div class="header-top">
        <div class="container">
            <div class="header-bg">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <div class="header-links">
                            <ul>
                                <li><i class="fas fa-tv"></i>Your IP : {{ $userIp }}</li>
                                <li><i class="fas fa-map-marker-alt"></i>Your Location : {{ $userLocation }}</li>
                                <li><i class="fas fa-shield-check"></i>Your Status : UnProtected</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-right">
                            <div class="header-links ps-0">
                                <div class="social-style1">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                                <ul>
                                    @if (Auth::check())
                                        <li><a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i>
                                                {{ Auth::user()->name }}
                                            </a></li>
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa-solid fa-lock"></i>Logout
                                            </a>
                                        </li>
                                    @else
                                        <li><a href="{{ route('register') }}"><i class="fa-solid fa-user"></i>Signup</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('login') }}"><i class="fa-solid fa-lock"></i>Login</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="sticky-active">
            <div class="container">
                <div class="menu-bg">
                    <div class="row position-relative align-items-center">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ route('home') }}" class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/logo.png') }}" width="48px" alt="logo">
                                    <h4 class="sec-title ms-3 mb-0 d-none d-sm-block">{{ config('app.name') }}</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="menu-area">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col">
                                        <nav class="main-menu menu-style1 d-none d-lg-block">
                                            <ul>
                                                <li class="#">
                                                    <a href="{{ route('home') }}">Home</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('about') }}">About Us</a>
                                                </li>
                                                <li class=" mega-menu-wrap">
                                                    <a href="{{ route('pricing') }}">Pricing</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('contact') }}">Contact</a>
                                                </li>
                                                @if (Auth::check() && Auth::user()->isPremium())
                                                    <li>
                                                        <a href="{{ route('billing') }}">Billing</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-auto d-lg-none">
                                        <button class="vs-menu-toggle d-inline-block">
                                            <i class="fal fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
