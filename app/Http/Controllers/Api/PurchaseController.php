<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ActivationCodeMail;
use App\Models\ActivationCode;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        do {
            $activationCode = Str::random(10);
        } while (ActivationCode::where('code', $activationCode)->exists());

        ActivationCode::create([
            'plan_id' => $request->plan_id,
            'code' => $activationCode,
        ]);

        Mail::to($user->email)->send(new ActivationCodeMail($activationCode, $user));

        return response()->json([
            'status' => true,
            'message' => 'Purchase created successfully! Activation code sent to your email.',
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

    public function redeemActivationCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'activation_code' => 'required|string|size:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $activationCode = ActivationCode::where('code', $request->activation_code)
            ->where('is_used', false)
            ->first();

        if (!$activationCode) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid or already used activation code.',
            ], 400);
        }

        if (!is_null($activationCode->user_id) && $activationCode->user_id !== $user->id) {
            return response()->json([
                'status' => false,
                'message' => 'This activation code is not assigned to you.',
            ], 403);
        }

        $plan = $activationCode->plan;
        $purchase = $user->purchases()
            ->where('is_active', true)
            ->where('expires_at', '>', now())
            ->first();

        $duration = $plan->duration;

        if ($purchase) {
            $currentExpiresAt = Carbon::parse($purchase->expires_at);

            // Extend the expiration date instead of replacing it
            $newExpiresAt = match ($plan->duration_unit) {
                'day'   => $currentExpiresAt->addDays($duration),
                'week'  => $currentExpiresAt->addWeeks($duration),
                'month' => $currentExpiresAt->addMonths($duration),
                'year'  => $currentExpiresAt->addYears($duration),
                default => $currentExpiresAt->addDays(7),
            };

            // Update the purchase with the new expiration date
            $purchase->update([
                'expires_at' => $newExpiresAt,
            ]);
        } else {
            $expiresAt = match ($plan->duration_unit) {
                'day'   => now()->addDays($duration),
                'week'  => now()->addWeeks($duration),
                'month' => now()->addMonths($duration),
                'year'  => now()->addYears($duration),
                default => now()->addDays(7),
            };
            // Create a new purchase
            $purchase = $user->purchases()->create([
                'plan_id' => $plan->id,
                'started_at' => now(),
                'expires_at' => $expiresAt,
                'is_active' => true,
            ]);
        }

        $activationCode->update([
            'is_used' => true,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Purchase activated successfully!',
            'purchase' => $purchase,
        ], 200);
    }
}
