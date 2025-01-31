<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    public function addPurchase(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plan_id' => 'required|exists:plans,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $user = Auth::user();
        /** @var \App\Models\User $user **/

        $plan = Plan::find($request->plan_id);

        if (!$plan) {
            return response()->json([
                'status' => false,
                'message' => 'Plan not found',
            ], 404);
        }

        // Check if the user already has an active purchase
        $activePurchase = $user->purchases()
            ->where('is_active', true)
            ->where('expires_at', '>', now())
            ->first();

        // Calculate new expiration date based on the plan's duration and unit
        $duration = $plan->duration;
        $expiresAt = match ($plan->duration_unit) {
            'day'   => now()->addDays($duration),
            'week'  => now()->addWeeks($duration),
            'month' => now()->addMonths($duration),
            'year'  => now()->addYears($duration),
            default => now(), // Fallback to current time if unit is invalid
        };

        if ($activePurchase) {
            // Extend the current active purchase expiration date
            $activePurchase->update([
                'expires_at' => $activePurchase->expires_at->add($expiresAt->diff(now())),
            ]);

            $message = 'Purchase extended successfully!';
        } else {
            // Create a new purchase
            $activePurchase = $user->purchases()->create([
                'plan_id' => $plan->id,
                'started_at' => now(),
                'expires_at' => $expiresAt,
                'is_active' => true,
            ]);

            $message = 'Purchase created successfully!';
        }

        return response()->json([
            'status' => true,
            'message' => $message,
            'purchase' => $activePurchase
        ], 201);
    }

    public function Status()
    {
        $user = Auth::user();
        /** @var \App\Models\User $user **/
        $purchases = $user->purchases()
            ->where('is_active', true)
            ->where('expires_at', '>', now())
            ->first();
        return response()->json([
            'status' => true,
            'purchases' => $purchases
        ], 200);
    }
}
