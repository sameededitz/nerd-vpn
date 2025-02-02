<header class="vs-header header-layout2">
    <div class="header-top">
        <div class="container">
            <div class="header-bg">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <div class="header-links">
                            <ul>
                                <li><i class="fas fa-tv"></i>Your IP : 414.569.54.99</li>
                                <li><i class="fas fa-map-marker-alt"></i><a href="mailto:info@example.com">Your
                                        Location : Bangladesh</a></li>
                                <li><i class="fas fa-shield-check"></i>Your Status : Protected</li>
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
                                        <li><a href=""><i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                                            </a></li>
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                                <a href="index.html">
                                    <img src="assets/img/dark-logo.svg" alt="logo">
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
                                                    <a href="index.html">Home</a>
                                                </li>
                                                <li>
                                                    <a href="about.html">About Us</a>
                                                </li>
                                                <li class="#">
                                                    <a href="#">Features</a>

                                                </li>
                                                <li class=" mega-menu-wrap">
                                                    <a href="price.html">Price</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Contact</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-auto d-lg-none">
                                        <button class="vs-menu-toggle d-inline-block">
                                            <i class="fal fa-bars"></i>
                                        </button>
                                    </div>
                                    <div class="col-auto d-xl-block d-none">
                                        <div class="header-icons">
                                            <form class="header-search">
                                                <button class="searchBoxTggler" aria-label="search-button">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                                <input type="text" placeholder="Search Here...">
                                            </form>
                                            <a href="#" class="icon-btn sideMenuToggler"><i
                                                    class="fa-solid fa-bars"></i></a>
                                            <a href="#" class="icon-btn">
                                                <i class="fa-solid fa-globe"></i>
                                            </a>
                                        </div>
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
