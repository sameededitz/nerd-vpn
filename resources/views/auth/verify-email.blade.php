@extends('layout.user-layout')
@section('title')
    Verify Email
@endsection
@section('content')
    <!--==============================
                                            Breadcumb
                                            ============================== -->
    <div class="breadcumb-wrapper Cover all esports & gamers needs" data-bg-src="{{ asset('assets/img-2/breadcumb-bg.jpg') }}">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Verify Email</h1>
            </div>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu vs-btn2">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Verify Email</li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
                                        Verify Email Area
                                        ============================== -->
    <section class="contact-layout1 space-top contact-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 text-center">
                    <div class="title-area wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <h2 class="sec-title">Verify Your Email Address</h2>
                    </div>
                    <div class="vs-comment-form">
                        @if (session('status') == 'verification-link-sent')
                            <x-user-alert type="success" message="A new email verification link has been emailed to you!" />
                        @endif
                        <p class="mb-3">Before proceeding, please check your email for a verification link.</p>
                        <p class="mb-3">If you did not receive the email, click the button below to request another.</p>
                        <form action="{{ route('verification.send') }}" method="post" class="form-style3 w-100 mb-3">
                            @csrf
                            <button type="submit" class="vs-btn w-100 justify-content-center">Resend</button>
                        </form>
                        <form action="{{ route('logout') }}" method="post" class="form-style3 w-100">
                            @csrf
                            <button type="submit" class="vs-btn w-100 justify-content-center">Logout</button>
                        </form>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </div>
            </div>
        </div>
    </section>
@endsection