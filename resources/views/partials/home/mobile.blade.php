<div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center">
        <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ route('home') }}" class="d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="{{ config('app.name') }}" width="48px">
                <h4 class="sec-title ms-2 mt-3">{{ config('app.name') }}</h4>
            </a>
        </div>
        <div class="vs-mobile-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('about') }}">About Us</a>
                </li>
                <li>
                    <a href="{{ route('pricing') }}">Pricing</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>
