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

    <script>
        document.addEventListener("DOMContentLoaded", async function() {
            // Check if IP info is already stored in localStorage
            let userIp = localStorage.getItem("userIp");
            let userLocation = localStorage.getItem("userLocation");

            if (userIp && userLocation) {
                // Use cached data
                document.getElementById("userIp").textContent = userIp;
                document.getElementById("userLocation").textContent = userLocation;
            } else {
                try {
                    // Fetch fresh data if not cached
                    const response = await fetch("https://ipinfo.io/json?token=22c6e0d52b99c0");
                    const data = await response.json();

                    userIp = data.ip || "Unknown IP";
                    userLocation = `${data.city}, ${data.country}` || "Unknown Location";

                    // Store data in localStorage
                    localStorage.setItem("userIp", userIp);
                    localStorage.setItem("userLocation", userLocation);

                    // Update the UI
                    document.getElementById("userIp").textContent = userIp;
                    document.getElementById("userLocation").textContent = userLocation;
                } catch (error) {
                    console.error("Error fetching IP info:", error);
                }
            }
        });
    </script>

    @yield('scripts')

</body>

</html>
