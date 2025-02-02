@extends('layout.user-layout')
@section('title')
    Forgot Password
@endsection
@section('content')
    <!--==============================
                                                Breadcumb
                                                ============================== -->
    <div class="breadcumb-wrapper Cover all esports & gamers needs"
        data-bg-src="{{ asset('assets/img-2/breadcumb-bg.jpg') }}">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Forgot Password</h1>
            </div>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu vs-btn2">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Forgot Password</li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
                                            Forgot Password Area
                                            ============================== -->
    <section class="contact-layout1 space-top contact-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 text-center">
                    <div class="title-area wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <h2 class="sec-title">Forgot Your Password?</h2>
                    </div>
                    <div class="vs-comment-form">
                        @if (session('status'))
                            <x-user-alert type="info" :message="session('status')" />
                        @endif
                        <p class="mb-3">Enter the email address associated with your account and we will send you a link
                            to reset your password.</p>
                        <div id="respond" class="comment-respond d-flex justify-content-center">
                            <form action="{{ route('password.email') }}" method="post" class="form-style3 w-100 mb-3">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group">
                                        <input name="email" type="text" class="form-control"
                                            placeholder="Enter Your Email" required value="{{ old('email') }}">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group mb-0">
                                        <button class="vs-btn w-100 justify-content-center" type="submit">Send Password
                                            Reset Link</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </div>
            </div>
        </div>
    </section>
@endsection
