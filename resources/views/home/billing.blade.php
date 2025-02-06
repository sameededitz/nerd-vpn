@extends('layout.user-layout')
@section('title')
    Profile | {{ Auth::user()->name ?? 'Guest' }}
@endsection
@section('content')
    <!--==============================
                                                            Breadcumb
                                                            ============================== -->
    <div class="breadcumb-wrapper Cover all esports & gamers needs" data-bg-src="assets/img-2/breadcumb-bg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Billing</h1>
            </div>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu vs-btn2">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Billing</li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
                                                                                                                                        Success Area
                                                                                                                                        ============================== -->
    <section class="contact-layout1 space-top contact-space">
        <div class="container">
            <div class="row justify-content-center profile-comment-box">
                {{-- <div class="col-xl-4 text-center mb-4">
                    <div class="vs-comment-form profile-sidebar">
                        <div class="vs-mobile-menu">
                            <ul>
                                <li>
                                    <a href="">Profile</a>
                                </li>
                                <li>
                                    <a href="">Billing</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-8 text-start">
                    @if (session('status'))
                        <x-user-alert type="info" :message="session('status')" />
                    @endif

                    @if (!$hasActiveSubscription)
                        <div class="vs-comment-form mb-4">
                            <h5 class="sec-title">You do not have an active subscription. Please <a
                                    href='{{ route('pricing') }}' class='alert-link'>subscribe</a> to
                                continue enjoying premium features.</h5>
                        </div>
                    @else
                        <!-- Plan and Purchase Details -->
                        <div class="vs-comment-form mb-4">
                            <h4 class="sec-title">
                                @if ($purchase->is_lifetime)
                                    Lifetime Plan: {{ $plan->name }}
                                @else
                                    Subscription: {{ $plan->name }}
                                @endif
                            </h4>
                            <p class="mb-4" style="font-size: 20px">
                                <strong>Status:</strong>
                                @if ($purchase->is_active)
                                    Active
                                @else
                                    Inactive
                                @endif
                                <br>
                                @if (!$purchase->is_lifetime)
                                    <strong>Next Billing Cycle:</strong>
                                    {{ $purchase->expires_at->toFormattedDateString() }}<br>
                                    <strong>Cost:</strong> ${{ number_format($plan->price, 2) }} per
                                    {{ $plan->duration_unit }}
                                @endif
                            </p>
                            <div id="respond" class="comment-respond d-flex justify-content-center flex-column">
                                @if (!$purchase->is_lifetime)
                                    @if ($user->subscription('default')->active() && !$user->subscription('default')->onGracePeriod())
                                        <!-- Button to cancel active subscription -->
                                        <form method="POST" action="{{ route('cancel-subscription') }}">
                                            @csrf
                                            <button class="vs-btn w-100 justify-content-center" type="submit">
                                                Cancel Subscription
                                            </button>
                                        </form>
                                    @endif
                                    @if ($user->subscription('default')->onGracePeriod())
                                        <h5 class="sec-title">Your subscription is in the grace period and will end on
                                            {{ $user->subscription('default')->ends_at->toFormattedDateString() }}.
                                        </h5>
                                        <!-- Button to renew inactive subscription -->
                                        <form method="POST" action="{{ route('renew-subscription') }}">
                                            @csrf
                                            <button class="vs-btn w-100 justify-content-center" type="submit">
                                                Renew Subscription
                                            </button>
                                        </form>

                                        <!-- Button to cancel immediately -->
                                        <h5 class="sec-title">You can also cancel your subscription immediately. and your
                                            subscription services will end on
                                            {{ $user->subscription('default')->ends_at->toFormattedDateString() }}
                                        </h5>
                                        <p class="mb-3">
                                            By canceling now, you will be able to purchase a new subscription or a lifetime plan.  
                                            Your current subscription will not be extended unless you purchase an additional plan  
                                            before your current one expires.
                                        </p>
                                        <form method="POST" action="{{ route('cancel-now-subscription') }}">
                                            @csrf
                                            <button class="vs-btn w-100 justify-content-center" type="submit">
                                                Cancel Now
                                            </button>
                                        </form>
                                    @endif
                                    @if ($user->subscription('default')->ended())
                                        <div class="subscription-canceled-notice">
                                            <h5 class="sec-title">Your "{{ $plan->name ?? 'Plan' }}" subscription has been
                                                canceled and is no longer
                                                active.</h4>
                                                <a href="{{ route('pricing') }}"
                                                    class="vs-btn w-100 justify-content-center">Reactivate Subscription</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <!-- Billing Portal Link -->
                        <div class="vs-comment-form">
                            <div id="respond" class="comment-respond d-flex justify-content-center flex-column">
                                <h4 class="sec-title">Billing Information</h4>
                                <p class="mb-4">
                                    Manage your billing information, including payment methods and subscription details.
                                </p>
                                <a href="{{ route('billing-portal') }}" class="vs-btn w-100 justify-content-center">
                                    Billing Portal
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
