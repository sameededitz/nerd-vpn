<?php

namespace App\Listeners;

use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event)
    {
        $payload = $event->payload;
        Log::info('Stripe event received:', $payload);
        $eventType = $payload['type'] ?? null;

        // We only care about subscription events.
        if (!in_array($eventType, [
            'checkout.session.completed',
            'invoice.paid',
            'customer.subscription.updated',
            'customer.subscription.deleted',
        ])) {
            return;
        }

        if ($eventType === 'checkout.session.completed') {
            $this->handleCheckoutSessionCompleted($payload);
            return;
        }

        if ($eventType === 'invoice.paid') {
            $this->handleInvoicePaid($payload);
            return;
        }

        if (in_array($eventType, [
            'customer.subscription.deleted'
        ])) {
            if ($eventType === 'customer.subscription.deleted') {
                $this->handleSubscriptionDeleted($payload);
            }
        }
    }

    protected function handleCheckoutSessionCompleted(array $payload): void
    {
        $session = $payload['data']['object'];
        $stripeCustomerId = $session['customer'] ?? null;
        if (!$stripeCustomerId) {
            Log::error("Checkout session completed event missing customer ID.");
            return;
        }

        /** @var User $user **/
        $user = User::where('stripe_id', $stripeCustomerId)->first();
        if (!$user) {
            Log::error("User not found for Stripe customer ID: {$stripeCustomerId}");
            return;
        }

        // Check metadata to determine if this is a lifetime purchase or a subscription.
        $isLifetime = isset($session['metadata']['lifetime']) && $session['metadata']['lifetime'] === 'true';
        $planId = $session['metadata']['plan_id'] ?? null;
        if (!$planId) {
            Log::error("Checkout session completed missing plan_id in metadata.");
            return;
        }

        // Look up the plan by its ID (or using a unique identifier you stored).
        $plan = Plan::find($planId);
        if (!$plan) {
            Log::error("Plan not found for plan_id: {$planId}");
            return;
        }

        if ($isLifetime) {
            // For lifetime purchase: remove previous records and create a lifetime purchase.
            $user->purchases()->delete();
            $user->purchases()->create([
                'plan_id'     => $plan->id,
                'started_at'  => now(),
                'expires_at'  => Carbon::create(9999, 12, 31, 23, 59, 59), // Far-future date
                'is_active'   => true,
                'is_lifetime' => true,
            ]);
        } else {
            $purchase = $user->purchases()
                ->where('is_active', true)
                ->whereNotNull('expires_at')
                ->where('expires_at', '>', now())
                ->first();
            if ($purchase) {
                $newExpiry = $this->calculateExpirationDate($plan, $purchase);
                $purchase->update([
                    'plan_id' => $plan->id,
                    'expires_at' => $newExpiry,
                ]);
            } else {
                $newExpiry = $this->calculateExpirationDate($plan);
                $purchase = $user->purchases()->create([
                    'is_active' => true,
                    'is_lifetime' => false,
                    'plan_id' => $plan->id,
                    'started_at' => now(),
                    'expires_at' => $newExpiry,
                ]);
            }
        }
    }

    protected function handleInvoicePaid(array $payload): void
    {
        $invoice = $payload['data']['object'];
        $stripeCustomerId = $invoice['customer'] ?? null;
        $billingReason = $invoice['billing_reason'] ?? null;

        if (!$stripeCustomerId) {
            return; // Ignore if no customer or not a renewal event
        }

        if ($billingReason !== 'subscription_cycle') {
            return; // Ignore if not a subscription renewal event
        }

        /** @var User $user */
        $user = User::where('stripe_id', $stripeCustomerId)->first();
        if (!$user) {
            Log::error("User not found for Stripe customer ID: {$stripeCustomerId}");
            return;
        }

        // Find the subscription ID
        $subscriptionId = $invoice['subscription'] ?? null;
        if (!$subscriptionId) {
            Log::error("Invoice paid event missing subscription ID.");
            return;
        }

        // Retrieve the latest subscription data from Stripe
        $subscription = Cashier::stripe()->subscriptions->retrieve($subscriptionId);
        if (!$subscription) {
            Log::error("No subscription found for ID: {$subscriptionId}");
            return;
        }

        // Get the plan (price ID) from the subscription
        $priceId = $subscription['items']['data'][0]['plan']['id'] ?? null;
        if (!$priceId) {
            Log::error("No price ID found for subscription ID: {$subscriptionId}");
            return;
        }

        $plan = Plan::where('stripe_plan_id', $priceId)->first();
        if (!$plan) {
            Log::error("Plan not found for Stripe price ID: {$priceId}");
            return;
        }

        // Find the active purchase
        $purchase = $user->purchases()
            ->where('is_active', true)
            ->whereNotNull('expires_at')
            ->where('expires_at', '>', now())
            ->first();
        if ($purchase) {
            $newExpiry = $this->calculateExpirationDate($plan, $purchase);
            $purchase->update([
                'plan_id' => $plan->id,
                'expires_at' => $newExpiry,
            ]);
        } else {
            $newExpiry = $this->calculateExpirationDate($plan);
            $purchase = $user->purchases()->create([
                'is_active' => true,
                'is_lifetime' => false,
                'plan_id' => $plan->id,
                'started_at' => now(),
                'expires_at' => $newExpiry,
            ]);
        }
    }

    protected function handleSubscriptionUpdated(array $payload): void
    {
        // Extract subscription data from payload and update the corresponding purchase record.
        $subscription = $payload['data']['object'];
        $stripeCustomerId = $subscription['customer'] ?? null;
        if (!$stripeCustomerId) {
            Log::error("Subscription updated event missing customer ID.");
            return;
        }

        /** @var User $user **/
        $user = User::where('stripe_id', $stripeCustomerId)->first();
        if (!$user) {
            Log::error("User not found for Stripe customer ID: {$stripeCustomerId}");
            return;
        }

        // Extract the price ID (assume first item) and find the plan.
        if (empty($subscription['items']['data'][0]['plan']['id'])) {
            Log::error("No plan ID found in subscription updated event.");
            return;
        }
        $priceId = $subscription['items']['data'][0]['plan']['id'];
        $plan = Plan::where('stripe_plan_id', $priceId)->first();
        if (!$plan) {
            Log::error("Plan not found for Stripe price ID: {$priceId}");
            return;
        }

        // For an active recurring subscription, extend the purchase.
        $purchase = $user->purchases()
            ->where('is_active', true)
            ->whereNotNull('expires_at')
            ->where('expires_at', '>', now())
            ->first();
        if ($purchase) {
            $newExpiry = $this->calculateExpirationDate($plan, $purchase);
            $purchase->update([
                'expires_at' => $newExpiry,
            ]);
        }
    }

    protected function handleSubscriptionDeleted(array $payload): void
    {
        $subscription = $payload['data']['object'];
        $stripeCustomerId = $subscription['customer'] ?? null;

        if (!$stripeCustomerId) {
            Log::error("Subscription deletion event missing customer ID.");
            return;
        }

        // Find the user by their Stripe customer ID.
        $user = User::where('stripe_id', $stripeCustomerId)->first();
        if (!$user) {
            Log::error("User not found for Stripe customer ID: {$stripeCustomerId}");
            return;
        }

        // Mark all active purchases as inactive.
        $user->purchases()
            ->where('is_active', true)
            ->where('expires_at', '<=', now())
            ->update(['is_active' => false]);
    }

    protected function calculateExpirationDate(Plan $plan, $purchase = null)
    {
        $duration = $plan->duration;
        $currentExpiresAt = $purchase ? Carbon::parse($purchase->expires_at) : now();

        return match ($plan->duration_unit) {
            'day'   => $currentExpiresAt->addDays($duration),
            'week'  => $currentExpiresAt->addWeeks($duration),
            'month' => $currentExpiresAt->addMonths($duration),
            'year'  => $currentExpiresAt->addYears($duration),
            default => $currentExpiresAt->addDays(7),
        };
    }
}
