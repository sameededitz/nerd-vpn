@extends('layout.user-layout')
@section('title')
    Reset Password
@endsection
@section('content')
    <!--==============================
                                                Breadcumb
                                                ============================== -->
    <div class="breadcumb-wrapper Cover all esports & gamers needs"
        data-bg-src="{{ asset('assets/img-2/breadcumb-bg.jpg') }}">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Reset Password</h1>
            </div>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu vs-btn2">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Reset Password</li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
                                            Reset Password Area
                                            ============================== -->
    <section class="contact-layout1 space-top contact-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 text-center">
                    <div class="title-area wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <h2 class="sec-title">Reset Your Password</h2>
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
                            <form action="{{ route('password.update') }}" method="post" class="form-style3 w-100 mb-3">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group">
                                        <input name="email" type="email" class="form-control"
                                            placeholder="Enter Your Email" required value="{{ $email ?? old('email') }}">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group">
                                        <input name="password" type="password" id="password" class="form-control"
                                            placeholder="Enter New Password" required>
                                        <i class="fa-solid fa-eye toggle-password" data-toggle="#password"></i>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group">
                                        <input name="password_confirmation" type="password" id="password_confirmation"
                                            class="form-control" placeholder="Confirm New Password" required>
                                        <i class="fa-solid fa-eye toggle-password" data-toggle="#password_confirmation"></i>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10 form-group mb-0">
                                        <button class="vs-btn w-100 justify-content-center" type="submit">Reset
                                            Password</button>
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
