@extends('layout.user-layout')
@section('title')
    Cancelled | {{ Auth::user()->name ?? 'Guest' }}
@endsection
@section('content')
    <!--==============================
                                                    Cancelled Area
                                                    ============================== -->
    <section class="contact-layout1 space-top contact-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 text-center">
                    <div class="title-area wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle2"> Payment Failed </span>
                        <h2 class="sec-title">Your Payment was Cancelled</h2>
                    </div>
                    <div class="vs-comment-form">
                        @if (session('status'))
                            <x-user-alert type="info" :message="session('status')" />
                        @endif
                        <div id="respond" class="comment-respond d-flex justify-content-center flex-column">
                            <h4 class="sec-title">Subscription Not Activated</h4>
                            <p class="mb-4">
                                Unfortunately, your payment was cancelled. Please try again to complete your subscription.
                            </p>
                            <p class="mb-4">If you have any questions, feel free to contact our support team.</p>
                            <a href="{{ route('home') }}" class="vs-btn w-100 justify-content-center">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
