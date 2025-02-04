@extends('layout.user-layout')
@section('title')
    Login
@endsection
@section('content')
    <!--==============================
                                                Breadcumb
                                                ============================== -->
    <div class="breadcumb-wrapper Cover all esports & gamers needs" data-bg-src="assets/img-2/breadcumb-bg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Login</h1>
            </div>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu vs-btn2">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
                                            Login Area
                                            ============================== -->
    <section class="contact-layout1 space-top contact-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 text-center">
                    <div class="title-area wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle2">Login </span>
                        <h2 class="sec-title">Welcome Back !</h2>
                    </div>
                    <div class="vs-comment-form">
                        @if (session('status'))
                            <x-user-alert type="info" :message="session('status')" />
                        @endif
                        @if ($errors->any())
                            <div class="py-2">
                                @foreach ($errors->all() as $error)
                                    <x-user-alert type="danger" :message="$error" />
                                @endforeach
                            </div>
                        @endif
                        <div id="respond" class="comment-respond d-flex justify-content-center">
                            <form action="{{ route('login') }}" method="post" class="form-style3 w-100">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group">
                                        <input name="email" type="text" class="form-control"
                                            placeholder="Enter Your Email" required value="{{ old('email') }}">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group">
                                        <input name="password" type="password" id="password" class="form-control"
                                            placeholder="Enter Your Password" required>
                                        <i class="fa-solid fa-eye toggle-password" data-toggle="#password"></i>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group mb-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check ps-0">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remember Me
                                                </label>
                                            </div>
                                            <a href="{{ route('password.request') }}" class="forgot-password"
                                                style="color: #ffffff;">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group mb-0">
                                        <button class="vs-btn w-100 justify-content-center" type="submit">Login</button>
                                    </div>
                                </div>
                                <p class="mt-3">Or Login With</p>
                                <div class="row justify-content-center g-3 ">
                                    <div class="col-md-5 form-group">
                                        <a href="{{ route('google-login') }}"
                                            class="icon-btn auth w-100 justify-content-center">
                                            Continue With Google
                                            <i class="fa-brands fa-google mx-2"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <a href="Login.html" class="icon-btn auth w-100 justify-content-center">
                                            Continue With Apple
                                            <i class="fa-brands fa-apple mx-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <p class="mt-2">Don't have a account?<a href="{{ route('register') }}">&nbsp;Sign Up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        // ================== Password Show Hide Js Start ==========
        function initializePasswordToggle(toggleSelector) {
            $(toggleSelector).on('click', function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("data-toggle"));

                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        }
        // Call the function
        initializePasswordToggle('.toggle-password');
        // ========================= Password Show Hide Js End ===========================
    </script>
@endsection
