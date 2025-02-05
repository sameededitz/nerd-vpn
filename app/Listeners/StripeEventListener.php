<?php

namespace App\Listeners;

use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
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
        Log::info("Stripe event received: ", $payload);
        return;
        $eventType = $payload['type'] ?? null;

        // We only care about subscription events.
        if (!in_array($eventType, [
            'customer.subscription.created',
            'customer.subscription.updated',
            'customer.subscription.deleted'
        ])) {
            return;
        }

        // Handle subscription created or updated
        if (in_array($eventType, ['customer.subscription.created', 'customer.subscription.updated'])) {
            $this->handleSubscriptionCreatedOrUpdated($payload);
        }

        // Handle subscription deletion
        if ($eventType === 'customer.subscription.deleted') {
            $this->handleSubscriptionDeleted($payload);
        }
    }

    protected function handleSubscriptionCreatedOrUpdated(array $payload): void
    {
        $subscription = $payload['data']['object'];
        $stripeCustomerId = $subscription['customer'] ?? null;

        if (!$stripeCustomerId) {
            Log::error("Subscription event missing customer ID.");
            return;
        }

        // Find the user by their Stripe customer ID.
        /** @var \App\Models\User $user **/
        $user = User::where('stripe_id', $stripeCustomerId)->first();
        if (!$user) {
            Log::error("User not found for Stripe customer ID: {$stripeCustomerId}");
            return;
        }

        // Extract the price ID from the subscription items. We assume the first item is used.
        if (empty($subscription['items']['data'][0]['plan']['id'])) {
            Log::error("No plan ID found in subscription event for customer: {$stripeCustomerId}");
            return;
        }
        $priceId = $subscription['items']['data'][0]['plan']['id'];

        // Look up the plan locally using the Stripe plan (price) ID.
        $plan = Plan::where('stripe_plan_id', $priceId)->first();
        if (!$plan) {
            Log::error("Plan not found for Stripe price ID: {$priceId}");
            return;
        }

        // Determine if this is a lifetime plan.
        if ($plan->lifetime) {
            // For lifetime plans, set expiration to null (or you can set it to a far-future date) 
            // and mark the purchase as lifetime.
            $user->purchases()->delete();
            $user->purchases()->create([
                'plan_id'    => $plan->id,
                'started_at' => now(),
                'expires_at' => Carbon::create(9999, 12, 31, 23, 59, 59),
                'is_active'  => true,
                'is_lifetime' => true,
            ]);
        } else {
            $purchase = $user->purchases()
                ->where('is_active', true)
                ->whereNotNull('expires_at')
                ->where('expires_at', '>', now())
                ->first();

            if ($purchase) {
                // Extend the existing purchase's expiration date by adding the plan's duration.
                $newExpiry = $this->calculateExpirationDate($plan, $purchase);
                $purchase->update([
                    'plan_id'    => $plan->id,
                    'expires_at' => $newExpiry,
                    'started_at' => $purchase->started_at,
                    'is_active'  => true,
                    'is_lifetime' => false,
                ]);
            } else {
                // Create a new purchase record.
                $newExpiry = $this->calculateExpirationDate($plan);
                $user->purchases()->create([
                    'plan_id'    => $plan->id,
                    'started_at' => Carbon::now(),
                    'expires_at' => $newExpiry,
                    'is_active'  => true,
                    'is_lifetime' => false,
                ]);
            }
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
        $user->purchases()->where('is_active', true)
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
