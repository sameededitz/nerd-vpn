@extends('layout.user-layout')
@section('title')
    Success | {{ Auth::user()->name ?? 'Guest' }}
@endsection
@section('content')
    <!--==============================
                                                Success Area
                                                ============================== -->
    <section class="contact-layout1 space-top contact-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 text-center">
                    <div class="title-area wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle2">Success </span>
                        <h2 class="sec-title">Your Payment Success !</h2>
                    </div>
                    <div class="vs-comment-form">
                        @if (session('status'))
                            <x-user-alert type="info" :message="session('status')" />
                        @endif
                        <div id="respond" class="comment-respond d-flex justify-content-center flex-column">
                            <h4 class="sec-title">You're Premium Now</h4>
                            <p class="mb-4">
                                Your subscription will automatically renew on
                                {{ $purchase->expires_at->toDateString() }} and you'll be charged
                                ${{ number_format($plan->price, 2) }} for the next billing cycle.
                            </p>
                            <p class="mb-4">Now you can access all the features of {{ config('app.name') }}</p>
                            <button class="vs-btn w-100 justify-content-center" type="submit">Back to Home</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
